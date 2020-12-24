<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Cusine;
use App\Models\Discount;
use App\Models\Dish;
use App\Models\Section;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discounts=Discount::all();
        $cooks = User::whereRoleIs('cook')->get();
        $dishes=Dish::all();
        $sections=Section::all();
        $cusines=Cusine::all();
        return view('backend.discount',compact('discounts','sections','cusines','dishes','cooks'));
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
            'name'=>'required|unique:discounts,name',
            'code'=>'required|unique:discounts,code',
            'total'=>'required',
            'discount'=>'required',
            'discount_type'=>'required',
        ]);

        if($request->activate_from == null)
        {
            $activate_from=Carbon::now()->format('yy-m-d');
        }else{
            $date = strtotime($request->activate_from);
            $activate_from=date('yy-m-d', $date);
        }

        if($request->activate_to ==null){
            $activate_to =null;
        }else{
            $date = strtotime($request->activate_to);
            $activate_to=date('yy-m-d', $date);
        }



        $discount=Discount::create([
            'name'=>$request->name,
            'code'=>$request->code,
            'total'=>$request->total,
            'discount'=>$request->discount,
            'discount_type'=>$request->discount_type,
            'activate_from'=>$activate_from,
            'activate_to'=>$activate_to,
            // 'dishes'=>serialize($request->dishes),
            // 'cusines'=>serialize($request->cusines),
            // 'cooks'=>serialize($request->cooks),
            // 'sections'=>serialize($request->sections),
            'uses'=>$request->uses,
            'orders'=>$request->orders,
            'customers'=>$request->customers,

        ]);
        $discount=Discount::where('name',$request->name)->first();
        if($request->dishes[0] == 'all'){
            $dishes=Dish::all();
            foreach($dishes as $dish){
                $dish->update(['discount_id'=>$discount->id]);
            }
            $discount->update([
                'dishes'=>'all'
            ]);
        }else{
            $arr=[];
            $dishes=Dish::whereIn('id',$request->dishes)->get();
            foreach($dishes as $dish){
                $dish->update(['discount_id'=>$discount->id]);
                array_push($arr,$dish->name);
            }
            $discount->update([
                'dishes'=>$arr
            ]);
        }
        if($discount){
            return response()->json(['success' => true]);
        }else{
            return response()->json([ 'errors' => $validate]);
        }

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
