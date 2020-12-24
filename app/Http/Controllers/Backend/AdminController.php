<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Middleware\admin;
use App\Models\City;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App\Models\UserTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities=City::all();
        $admins=User::whereRoleIs('admin')->get();
        return view('backend.admins.admin-list',compact('admins','cities'));
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
            'phone'=>'required|regex:/(01)[0-9]{9}/',
            'email'=>'required|unique:users',
            'password'=>'required',
            'city'=>'required',
            'permission'=>'required|min:1',
        ]);


       $admin= User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'city_id'=>$request->city,
            'password'=>Hash::make($request->password)
        ]);

        $admin->attachRole('admin');
        $permissions= DB::table('permissions')
        ->whereIn('name', $request->permission)
        ->get()
        ->pluck('id');

        $admin->attachPermissions($permissions);
        return redirect()->route('admin.index');
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
       $admin=User::find($id);
        $validate=$request->validate([
            'name'=>'required',
            'phone'=>'required|regex:/(01)[0-9]{9}/|unique:users,id,'.$admin->id,
            'email'=>'required|unique:users,id,'.$admin->id,
            'password'=>'required',
            'city'=>'required',
            'permission'=>'required|min:1',
        ]);
       $admin->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'city_id'=>$request->city,
            'password'=>Hash::make($request->password)
        ]);

        $permissions= DB::table('permissions')
        ->whereIn('name', $request->permission)
        ->get()
        ->pluck('id');

        $admin->syncPermissions($permissions);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_trans=UserTranslation::where('user_id',$id)->delete();

        $user=User::find($id);
        $user->delete();
        return back();

    }
}
