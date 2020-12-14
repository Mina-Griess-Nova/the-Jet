<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
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


                return redirect('/dishdivvy');
            }else{
                return redirect('otbokhly/login');
            }

        // }

    }

    public function logout($id){

            // $user=User::find($id);

        auth()->guard('customer')->logout();

        return redirect()->to('/dishdivvy');
    }


    public function register()
    {
        return view('front/register');
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

        // $customer = User::find($customer->id);

        return redirect('/dishdivvy');

    }


}
