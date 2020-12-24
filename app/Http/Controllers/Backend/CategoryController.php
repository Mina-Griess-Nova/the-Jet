<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryTranslation;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule as Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        return view('backend.category_list',compact('categories'));
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
        $rules=[];
        foreach (config('translatable.locales') as $locale) {
            $rules += [$locale.'.name'=>['required',Rule::unique('category_translations','name')]];
        }
        $request->validate( $rules);

        $categories=Category::create($request->all());
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
        //
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
        $rules=[];
        foreach (config('translatable.locales') as $locale) {
            $rules += [$locale.'.name'=>['required',Rule::unique('category_translations','name')]];
        }

        $request->validate( $rules);
        $category=Category::find($id);
        $category->update($request->all());
        $category->save();
        return  redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category_trans=CategoryTranslation::where('category_id',$id)->delete();

        $category=Category::find($id);
        $category->delete();
        return back();
    }
}
