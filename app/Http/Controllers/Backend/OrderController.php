<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use App\Models\Order;
use App\Models\User;
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
            $orders=Order::whereNotNull('status')->get();
            $currentActivities=Order::whereNull('status')->get();
        }elseif(auth()->guard('admin')->user()->roles[0]->name =='cook'){

            $orders=Order::where('cook_id',auth()->guard('admin')->user()->id)
            ->whereNotNull('status')->get();

            $currentActivities=Order::where('cook_id',auth()->guard('admin')->user()->id)
            ->whereNull('status')->get();

        }
        // $cooks=User::whereHas('roles',function($q){
        //     return $q->where('name','cook');
        // })->get();

        // $cook=User::find($orders->cook_id);
        return view('backend.order-list',compact('orders','currentActivities'));
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
        $orders=[];
        $validation=$request->validate([
            'qty'=>'required',
            'size'=>'required'
        ]);

       $orderEntry=array();
       $dish=Dish::find($request->dish_id);
        if($request->notes){
            $orderEntry['notes']=$request->notes;
        }
       $orderEntry['qty']=$request->qty;
       $orderEntry['notes']=$request->notes;
       $orderEntry['size']=$request->size;
       $orderEntry['name']=$dish->name;
       $orderEntry['price']=$request->price*$request->qty;
       $orderEntry['section']=$dish->sections->name;
       $orderEntry['images']=$dish->images;

       array_push($orders,$orderEntry);
       $order=Order::create([
            'user_id'=>auth()->guard('customer')->user()->id,
            'cook_id'=>$dish->user_id,
            // 'date'=>$request->date,
            // 'time'=>$request->time,
            // 'status'=>'0',
            'orderEntry'=>$orders,
            // 'address'=>$request->address,
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
        // dd($order=Order::where('id',$id)->first());
       $order= Order::where('id',$id)->first();
       if($order->status ==null){
        $order->update([
            'status'=>'Accepted'
        ]);
       }else if($order->status == 'Accepted'){
        $order->update([
            'status'=>'In progress'
        ]);
       }
        return response()->json(['success' => true,'status'=>$order->status]);
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
