<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users=User::all();
        if(auth()->guard('admin')->user()->roles[0]->name != 'cook'){



            $cooks=User::whereHas('roles',function($q){
                $q->where('name','cook');
            })->take(10)->get();
            $customers=User::whereHas('roles',function($q){
                $q->where('name','customer');
            })->take(10)->get();
            $orders=Order::whereNotNull('status')->take(10)->get();
            $currentActivities=Order::whereNull('status')->take(10)->get();

            if(auth()->guard('admin')->user()->roles[0]->name == 'super_admin'){ //profit
                $admin=User::find(auth()->guard('admin')->user()->id);
                 $total_profit=0;
                 $orders_count=0;
                 $total_revenue=0;
                 foreach($orders as $order){
                    $total_profit+=$order->total_price;
                    $orders_count+=1;
                    $cook=User::find($order->cook_id);
                    if($cook->commission_type == '%'){
                        $total_profit= ($total_profit * $cook->commission) / 100;
                    }
                    else{
                            $total_profit=($cook->commission *$orders_count) ;
                    }

                    $total_revenue+=$order->total_price;
                }



            }



            return view('backend.index',compact('orders','currentActivities','users','cooks','customers','total_profit','total_revenue'));
        }
        else{

            $user=User::where('id',auth()->guard('admin')->user()->id)->first();

            $orders=Order::where('cook_id',auth()->guard('admin')->user()->id)
            ->whereNotNull('status')
            ->take(10)->get();

            $currentActivities=Order::where('cook_id',auth()->guard('admin')->user()->id)
            ->whereNull('status')
            ->take(10)->get();

            $total_profit=0;
            $orders_count=0;
            $total_revenue=0;

            foreach($orders as $order){
                $total_profit+=$order->total_price;
                $orders_count+=1;
                $total_revenue+=$order->total_price;
            }
            if($user->commission_type == '%'){
                $total_profit=$total_profit - ($total_profit * $user->commission) / 100;
            }
            else{
                $total_profit=$total_profit -($user->commission *$orders_count) ;
            }
            $customers_id=Order::pluck('user_id');
            // $customers = DB::table('users')
            // ->select('users.*')
            // ->join('orders', 'users.id', '=', 'orders.user_id')
            // ->where('orders.cook_id',auth()->guard('admin')->user()->id)
            // ->groupBy('users.id')
            // ->get();
            $customers=User::whereIn('id',$customers_id)->take(10)->get();
            return view('backend.index',compact('orders','currentActivities','users','customers','total_profit','total_revenue'));
        }

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
        //
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
