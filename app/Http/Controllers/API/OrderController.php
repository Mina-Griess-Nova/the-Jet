<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;
use App\Traits\GeneralTrait;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;

class OrderController extends Controller
{
    use GeneralTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $validator=Validator::make($request->all(), [
            'time' => 'required',
            'date' => 'required',
            'address' => 'required',
         ]);
        if ($validator->fails()) {
        return response()->json(['error'=>$validator->errors()], 401);
        }
        $cook=User::where('id',$request->cook_id)->first();
        $coordinates=explode(",",$cook->address[0]->coordinates);
        $order=Order::where(['user_id'=>auth()->guard('api_customer')->user()->id,'status'=>null])
        ->first();
        $order->update([
            'total_price'=>(string)$request->total_price,
            'time'=>$request->time,
            'date'=>$request->date,
            'address'=>$request->address['address'],
            'orderEntry'=>$request->products,
            'status'=>'1'
        ]);
        $date=strtotime($request->date . " " . $request->time . " + " . 24 . " hours");
        $customer=User::find(auth()->guard('api_customer')->user()->id);
        $factory = (new Factory)
        ->withServiceAccount(__DIR__.'/logista-b796f05ac902.json');
        $database = $factory->createDatabase();


        $getUser = $database
        ->getReference('users')
        ->orderByChild('email')
        ->equalTo('info@otbokhly.com')
        ->getValue();
        $user=array_keys($getUser);

        $newOrder = $database
        ->getReference('/users/'.$user[0].'/tasks')
        ->push(
            [
        'deliver'=>['address'=>['lat'=>$request->address['lat'],$request->address['long'],
        'name'=>$request->address['address']],
                    'date' => (string)strtotime(date("Y-m-d H:i:s",$date)),
                    'description' => json_encode($request->products),
                    'email'=>$customer->email,
                    'name' => $customer->name,
                    'orderId' => (string)$order->id,
                    'phone' =>  $request->customer_phone],
                    'distance'=>'',
                    'driverId'=>'',
                    'estTime'=>'',
                    'pickup'=>['address'=>['lat'=>$coordinates[0],'lng'=>$coordinates[1],'name'=>$cook->address[0]->address],
                    'date' => (string)strtotime(date("Y-m-d H:i:s",$date)),
                    'description' => json_encode($request->products),
                    'email'=>$customer->email,
                    'name' => $customer->name,
                    'orderId' => (string)$order->id,
                    'phone' =>  $request->customer_phone],
                    'status'=>-1,
                    'orderItems' => $request->products,
                    'type'=>'pickupOnDelivery',
                    'taken'=>false,

        ]);
        return $this->returnData('msg','success');
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
