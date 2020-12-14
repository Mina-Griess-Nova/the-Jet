<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(auth()->guard('admin')->user()->roles[0]->name =='super_admin'){
            $orders=Order::all();
        }elseif(auth()->guard('admin')->user()->roles[0]->name =='cook'){
            $orders=Order::where('cook_id',auth()->guard('admin')->user()->id)->get();
        }



        return view('backend.order-list',compact('orders'));
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
        // dd($request->all());
        $validation=$request->validate([
            'date'=>'required',
            'time'=>'required',
            'address'=>'required'
        ]);

       $orderEntry=array();
       $dish=Dish::find($request->dish_id);

       $orderEntry['qty']=$request->qty;
       $orderEntry['notes']=$request->notes;
    //    $orderEntry['size']=$request->size;

       $orderEntry['name']=$dish->name;
       $orderEntry['price']=$dish->price;
       $orderEntry['section']=$dish->sections->name;
       $orderEntry['images']=$dish->images;
        $order=Order::create([
            'user_id'=>auth()->guard('customer')->user()->id,
            'cook_id'=>$dish->users->id,
            'date'=>$request->date,
            'time'=>$request->time,
            'orderEntry'=>json_encode($orderEntry),
            'address'=>$request->address,
        ]);
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
