<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use App\Models\Order;
use Validator;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;

class CartController extends Controller
{
    use GeneralTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders=Order::where('user_id',auth('api_customer')->user()->id)
        ->whereNotNull('status')
        ->get();
        return $this->returnData('cart',$orders);
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

        $data=array();
        foreach ($request->data as  $item) {
            $validator=Validator::make($item, [
                'qty'=>'required',
                'size'=>'required'
              ]);
            if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
            }

            $orderEntry=array();
            $dish=Dish::find($item['id']);
            $orderEntry['qty']=$item['qty'];
            $orderEntry['size']=$item['size'];
            if(isset($item['notes'])){
                $orderEntry['notes']=$item['notes'];
            }

            $orderEntry['name']=$dish->name;
            $orderEntry['price']=$dish->price*$item['qty'];
            $orderEntry['section']=$dish->sections->name;
            $orderEntry['images']=$dish->images;
            array_push($data,$orderEntry);
        }

        $cart=Order::where(['user_id'=>auth()->guard('api_customer')->user()->id,'status'=>null])->first();
        if(isset($cart)){
            $cart->update([
                'orderEntry'=>$data,
                'cook_id'=>$request->data[0]['user_id']
            ]);
        }else{
            $order=Order::create([
                'user_id'=>auth()->guard('api_customer')->user()->id,
                'cook_id'=>$request->data[0]['user_id'],
                // 'date'=>$request->date,
                // 'time'=>$request->time,
                'orderEntry'=>$data,
                // 'address'=>$request->address,
            ]);
        }



        return $this->returnSuccessMessage('successfully added to cart');
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
    public function update(Request $request, $lang,$id)
    {
    //     $data=array();

    //     foreach ($request->all() as  $item) {
    //     $validator=Validator::make($item, [
    //         'qty'=>'required',
    //         'size'=>'required'
    //       ]);
    //     dd('gjg');

    //     if ($validator->fails()) {
    //     return response()->json(['error'=>$validator->errors()], 401);
    //     }
    //     $orderEntry=array();
    //     $dish=Dish::find($id);
    //     $orderEntry['qty']=$item->qty;
    //     $orderEntry['size']=$item->size;
    //     if($item->notes){
    //         $orderEntry['notes']=$item->notes;
    //     }
    //     $orderEntry['name']=$dish->name;
    //     $orderEntry['price']=$dish->price*$item->qty;
    //     $orderEntry['section']=$dish->sections->name;
    //     $orderEntry['images']=$dish->images;
    //     array_push($data,$orderEntry);
    // }
    // dd($id);

    // $order=Order::find($id);
    // $order->update([
    //     // 'user_id'=>auth()->guard('api_customer')->user()->id,
    //     // 'date'=>$request->date,
    //     // 'time'=>$request->time,
    //     'orderEntry'=>json_encode($data),
    //     // 'address'=>$request->address,
    // ]);
    //     return $this->returnSuccessMessage('successfully edit  cart');
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
