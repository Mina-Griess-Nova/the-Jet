<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\User;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class CookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




    public function index()
    {
        $cooks=User::whereRoleIs('cook')->get();
        return view('backend.cooks-list',compact('cooks'));
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
            'password'=>'required'
        ]);


       $cook= User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'password'=>Hash::make($request->password)
        ]);

        $cook->roles()->attach(3);

        return redirect('dashboard/cook');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {




    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cook=User::where('id',auth()->guard('admin')->user()->id)->first();


        return view('backend.cook.profile',compact('cook'));
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
        $validate=$request->validate([
            'phone'=>'required',
            'birth_date'=>'required ',
            'state'=>'required',
            'city'=>'required',
            'area'=>'required',
            'title'=>'required',
            'floor'=>'required',
            'info'=>'required',
            'work_from'=>'required',
            'work_to'=>'required',
        ]);

        $cook=User::find($id);
        if ($request->file('profile_image')) {

            $ext=$request->file('profile_image')->getClientOriginalExtension();
            $image_name=time().'.'.$ext;
            $path='backend/img/cook';
            $request->file('profile_image')->move($path,$image_name);
            if ($cook->images) {

                Storage::disk('cook')->delete($cook->images);

            }
        }
        else{
            $image_name=$cook->images;
        }
        $cook->update([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'info'=>$request->info,
            'images'=>$image_name,
            'date_of_birth'=>$request->birth_date,
            'work_from'=>$request->work_from,
            'work_to'=>$request->work_to,
        ]);

        $address=Address::create([
            'user_id'=>$cook->id,
            'state'=>$request->state,
            'city'=>$request->city,
            'area'=>$request->area,
            'title'=>$request->title,
            'floor'=>$request->floor,
        ]);

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
        $cook=User::find($id);
        if($cook->address){
            $cook->address()->delete();
        }
        if($cook->dishes){
            $cook->dishes()->delete();
        }
        $cook->delete();
        return back();
    }
}
