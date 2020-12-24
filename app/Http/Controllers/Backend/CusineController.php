<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Cusine;
use App\Models\CusineTranslation;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule as Rule;

class CusineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cusines=Cusine::all();

        return view('backend.cusine_list',compact('cusines'));
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
            $rules += [$locale.'.name'=>['required',Rule::unique('cusine_translations','name')]];
        }
        $request->validate( $rules);
        $cusine=Cusine::create( $request->all() );
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
            $rules += [$locale.'.name'=>['required',Rule::unique('cusine_translations','name')]];
        }
        $request->validate( $rules);

        $cusine=Cusine::find($id);
        $cusine->update(
            $request->all()
        );
        $cusine->save();
        return redirect()->route('cusine.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cusine_trans=CusineTranslation::where('cusine_id',$id)->delete();
        $cusine=Cusine::find($id);
        $cusine->delete();
        return back();
    }
}
