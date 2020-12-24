<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Addons;
use App\Models\AddonsTranslation;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AddonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        $addons=Addons::all();
        return view('backend.addons_list',compact('addons','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $rules=[ 'categories'=>'required|min:1'];
        foreach (config('translatable.locales') as $locale) {
            $rules += [$locale.'.name'=>['required',Rule::unique('addons_translations','name')]];
        }

        $request->validate( $rules);

        $data=$request->except('categories');
        $addons=Addons::create($data);

        foreach($request->categories as $category){
            $addons->categories()->attach($category);
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category=Category::find($id);
        $addons=$category->addons;
         return response()->json(['success'=>$addons]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $addon=Addons::find($id);

        $rules=[ 'categories'=>'required|min:1'];
        foreach (config('translatable.locales') as $locale) {
            $rules += [$locale.'.name'=>['required','unique:addons,id,'.$addon->id]];
        }

        $request->validate( $rules);
        $data=$request->except('categories');
        $addon->update($data);
        $addon->save();

        $addon->categories()->sync($request->categories);
        return  redirect()->route('addons.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $addon_trans=AddonsTranslation::where('addon_id',$id)->delete();
        $addon=Addons::find($id);
        $addon->categories()->detach();
        $addon->delete();
        return back();
    }
}
