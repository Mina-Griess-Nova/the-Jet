<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Role;
use App\Models\User;
use App\Models\UserTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{


        public function login()
        {
            return view('front/login');
        }


    public function checklogin(Request $request)
    {

        $validatedData = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
       if(Auth::guard('customer')->attempt(['email' =>  $request->email, 'password' => $request->password])){
             if(auth()->guard('customer')->user()->roles[0]->name == 'customer'){
                return redirect()->route('front.index');
            }else{
                auth()->guard('customer')->logout();
                return redirect()->route('otbokhly.login');
            }
        }

    }

    public function logout($id){

            // $user=User::find($id);

        auth()->guard('customer')->logout();

        return redirect()->to('/');
    }


    public function register()
    {
        $cities=City::all();
        return view('front.register',compact('cities'));
    }



    public function checkregister(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'phone' => 'required|unique:users|regex:/(01)[0-9]{9}/',
            'password' => 'required|confirmed',

        ]);

        $customer=User::create([
			'name' => $request->name,
			'email' => $request->email,
			'password' => Hash::make($request->password),
            'phone' => $request->phone,
        ]);

        $customerRole=Role::where('name','customer')->first();
        $customer->attachRole($customerRole->id);
        Auth::guard('customer')->login($customer);
        $customer=User::where('email',$request->email)->first();
        $customer=UserTranslation::create([
            'user_id'=>$customer->id,
            'locale'=>'ar',
            'name'=> $customer->name,
        ]);
        // $customer = User::find($customer->id);

        return redirect()->to('/');

    }


}
