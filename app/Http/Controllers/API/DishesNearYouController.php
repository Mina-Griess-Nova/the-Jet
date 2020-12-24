<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CityTranslation;
use App\Models\Cusine;
use App\Models\Dish;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;

class DishesNearYouController extends Controller
{
    use GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang,$governorate)
    {
        $city=CityTranslation::where('name',$governorate)->first();

        if(isset($city)){
            $cooks=User::with('dishes')
            ->whereRoleIs('cook')
            ->where('city_id',$city->city_id)
            ->pluck('id');
            $dishes=Dish::with('users')
            ->with('cusines')
            ->with('sections')
            ->whereIn('user_id',$cooks)
            ->get();
            return $this->returnData('dishes',$dishes);
        }else{
            return $this->returnData('dishes',[]);
        }

    }

    function getaddress($lang,$location)
    {
       $url = 'https://maps.google.com/maps/api/geocode/json?latlng='.$location.'&key=AIzaSyAvKCQ5Ync-aLf0_fZcxvMhlST6o2MMh2U';
       $json = @file_get_contents($url);
       $data=json_decode($json);
       $status = $data->status;


       if($status=="OK")
       {
            $address= $data->results;
            $address_components= $address[0]->address_components;
            for ($i = 0; $i < count($address_components); $i++) {
                $address= $data->results;
                $address_components= $address[0]->address_components;
                $addressType = $address_components[$i]->types[0];
                if ($addressType == 'administrative_area_level_1') {
                    $governorate= $address[0]->address_components[$i]->short_name;
                }
            }
        }
       return $this->index($lang,$governorate);
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
