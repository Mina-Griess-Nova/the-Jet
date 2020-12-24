<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(){
        $cities=City::all();
        return response()->json([ 'success' => true,'data' => $cities, 200]);
    }
}
