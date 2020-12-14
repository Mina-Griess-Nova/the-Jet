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
            })->get();
            $customers=User::whereHas('roles',function($q){
                $q->where('name','customer');
            })->get();
            $orders=Order::all();
            return view('backend.index',compact('orders','users','cooks','customers'));
        }else{

            $user=User::where('id',auth()->guard('admin')->user()->id)->get();
            $orders=Order::where('cook_id',auth()->guard('admin')->user()->id)->get();
            $customers = DB::table('users')
            ->select('users.*')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->where('orders.cook_id',auth()->guard('admin')->user()->id)
            ->groupBy('users.id')
            ->get();

            return view('backend.index',compact('orders','users','customers'));
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
