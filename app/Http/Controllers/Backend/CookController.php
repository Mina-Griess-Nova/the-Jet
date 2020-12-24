<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\City;
use App\Models\User;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule as Rule;

class CookController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




    public function index()
    {
        $cities=City::all();
        $user=User::where('id',auth()->guard('admin')->user()->id)->first();
        if($user->hasRole('admin')){
            $cooks=User::whereRoleIs('cook')
            ->where('city_id',auth()->guard('admin')->user()->city_id)
            ->get();
        }else{
            $cooks=User::whereRoleIs('cook')->get();
        }

        return view('backend.cooks-list',compact('cooks','cities'));
    }




    public function vip_cook( $id)
    {

       $cook=User::where('id',$id)->update([
            'VIP'=>1
        ]);
        return response()->json(['success' => $id,]);
    }

    public function vip_reset( $id)
    {

        User::where('id',$id)->update([
            'VIP'=>0
        ]);

       return response()->json(['success' => $id]);
    }

    public function vip()
    {
        $cooks=User::where('VIP','1')->whereHas('roles',function($q){
            $q->where('name','cook');
         })->get();
         return view('backend.vip-cook-list',compact('cooks'));
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


        $rules=[
            'phone'=>'required|regex:/(01)[0-9]{9}/',
            'email'=>'required|unique:users',
            'password'=>'required',
            'city'=>'required',
            'contract'=>'required',
            'commission'=>'required',
            'commission_type'=>'required',
        ];
        foreach (config('translatable.locales') as $locale) {
            $rules += [$locale.'.name'=>['required',Rule::unique('user_translations','name')]];
        }
        $cook_trans=$request->only(['en','ar']);
       $cook= User::create([
            'images'=>'1606647695.jpg',
            'email'=>$request->email,
            'phone'=>$request->phone,
            'contract'=>$request->contract,
            'commission'=>$request->commission,
            'commission_type'=>$request->commission_type,
            'city_id'=>$request->city,
            'password'=>Hash::make($request->password)
        ]);
        $cook->update($cook_trans);
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
            // 'state'=>'required',
            // 'city'=>'required',
            // 'area'=>'required',
            // 'title'=>'required',
            'address'=>'required',
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

        if($request->availability == null){
            $request->availability = 0;
        }else{
            $request->availability = 1;
        }


        $cook->update([
            'availability'=>$request->availability,
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'info'=>$request->info,
            'images'=>$image_name,
            'date_of_birth'=>$request->birth_date,
            'work_from'=>$request->work_from,
            'work_to'=>$request->work_to,
        ]);
        $address=$cook->address;
        // dd($address);
        if($address ==null){
            $address->update([
            'address'=>$request->address,
            'coordinates'=>$request->coordinates,
            ]);
        } else{
            $address=Address::create([
                'user_id'=>$cook->id,
                'address'=>$request->address,
                'coordinates'=>$request->coordinates,
            ]);
        }


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
