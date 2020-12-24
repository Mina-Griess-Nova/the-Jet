<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class LoginController extends Controller
{



    public function login( ){
        return view('backend.login');
    }

    public function checklogin(Request $request){
        $validate=$request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        $user=User::where('email',$request->email)->with('roles')->first();

        $credentials=$request->only(['email','password']);

        if(Auth::guard('admin')->attempt(['email' => $credentials['email'], 'password' => $credentials['password']]) && $user->roles[0]->name == 'super_admin' ){

            return response()->json(['success' => true, 'redirectto' => '/dashboard']);

        }elseif(Auth::guard('admin')->attempt(['email' => $credentials['email'], 'password' => $credentials['password']])  && $user->roles[0]->name == 'cook' ){

            return response()->json(['success' => true, 'redirectto' => '/dashboard']);

        }elseif(Auth::guard('admin')->attempt(['email' => $credentials['email'], 'password' => $credentials['password']])  && $user->roles[0]->name == 'admin' ){

            return response()->json(['success' => true, 'redirectto' => '/dashboard']);

        }
        else{
            return response()->json(['success' => false, 'error' => 'Login Failed! Email or Password is incorrect.']);
        }

    }


    public function logout( Request $request){
        Auth::guard('admin')->logout();
        return Redirect::to("dashboard/login");
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
