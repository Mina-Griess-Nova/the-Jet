<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Middleware\customer;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers=User::whereHas('roles',function($q){
            $q->where('name','customer');
         })->get();
         return view('backend.customer-list',compact('customers'));
    }

    public function vip_customer( $id)
    {
        // $customer=User::find($id);

        User::where('id',$id)->update([
            'VIP'=>'1'
        ]);
        return response()->json(['success' => true]);
    }

    public function vip_reset( $id)
    {

        User::where('id',$id)->update([
            'VIP'=>'0'
        ]);
       return response()->json(['success' => true]);
    }

    public function vip()
    {
        $customers=User::where('VIP','1')->whereHas('roles',function($q){
            $q->where('name','customer');
         })->get();
         return view('backend.vip-customer-list',compact('customers'));
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
