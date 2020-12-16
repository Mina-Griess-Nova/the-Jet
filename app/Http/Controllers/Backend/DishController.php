<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Addons;
use App\Models\Allergen;
use App\Models\Category;
use App\Models\Cusine;
use App\Models\Dish;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

            $allergens=Allergen::all();
            $addons=Addons::all();
            $sections=Section::all();
            $cusines=Cusine::all();
            $categories=Category::all();
            if (auth()->guard('admin')->user()->roles[0]->name != 'cook'){
                $dishes=Dish::all();
            }
            else{
                $dishes=Dish::where('user_id',auth()->guard('admin')->user()->id)->get();
            }
            return view('backend.dish-list',compact('dishes','cusines','sections','addons','categories','allergens'));


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


        $validate=$request->validate([
            'name'=>'required',
            'files'=>'required',
            'cusine'=>'required',

            'category'=>'required',
            'addons'=>'required',
            'section'=>'required',

            'price'=>'required',
            'portions_available'=>'required',

            'dish_available'=>'required',
            'allergens'=>'required',
            'ingredients'=>'required',
            'info'=>'required',
            'available_count'=>'required',

        ]);

        if ($request->file('files')) {

            $dishes_images=array();
            foreach($request->file('files') as $index=>$img){
                $ext=$img->getClientOriginalExtension();
                $image_name=time().$index.'.'.$ext;
                $path='backend/img/dishes';
                $img->move($path,$image_name);
                array_push($dishes_images,$image_name);
                }
                $dishes_images=implode('__',$dishes_images);

        }
        if($request->dish_type == 'main'){
            $request->dish_type =1;
        }else{
            $request->dish_type=0;
        }

        $dish=Dish::create([
            'name'=>$request->name,
            'images'=>$dishes_images,
            'price'=>$request->price,
            'user_id'=>auth()->guard('admin')->user()->id,
            'portions_available'=>json_encode($request->portions_available, true),
            'available'=>$request->dish_available,
            'category_id'=>$request->category,
            'section_id'=>$request->section,
            'main_ingredients'=>$request->ingredients,
            'info'=>$request->info,
            'available_count'=>$request->available_count,

        ]);

        foreach($request->cusine as $cusine){
            $dish->cusines()->attach($cusine);
        }

        foreach($request->addons as $addon){
            $dish->addons()->attach($addon);
        }

        foreach($request->allergens as $allergen){
            $dish->allergens()->attach($allergen);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
