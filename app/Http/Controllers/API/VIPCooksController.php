<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;

class VIPCooksController extends Controller
{
    use GeneralTrait;

    public function index(){
        $VipCooks=User::whereHas('roles',function($q){
            $q->where('VIP',1);
        })->get();

            return $this->returnData('VipCooks',$VipCooks);


    }
}
