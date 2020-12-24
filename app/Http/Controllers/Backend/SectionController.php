<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\SectionTranslation;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule as Rule;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections=Section::all();
        return view('backend.section_list',compact('sections'));
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
            $rules += [$locale.'.name'=>['required',Rule::unique('section_translations','name')]];
        }
        $request->validate( $rules);

        $cusine=Section::create($request->all());
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
            $rules += [$locale.'.name'=>['required',Rule::unique('section_translations','name')]];
        }
        $section=Section::find($id);

        $section->update($request->all());
        $section->save();
        return redirect()->route('section.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $section_trans=SectionTranslation::where('section_id',$id)->delete();
        $section=Section::find($id);
        $section->delete();
        return back();
    }
}
