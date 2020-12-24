<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable=['name','code','dishes','cusines','cooks','sections','total','uses','customers','discount','discount_type','activate_from','activate_to'];


    public function dishes(){
        return $this->hasMany('App\Models\Dish','discount_id');
    }
}




