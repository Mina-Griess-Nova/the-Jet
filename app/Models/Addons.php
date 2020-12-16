<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Addons extends Model
{
    protected $fillable=['name'];

    public function dishes(){
        return $this->belongsToMany('App\Models\Dish','Addon_dish','addon_id','dish_id');
    }


    public function categories(){
        return $this->belongsToMany('App\Models\Category','addon_category','addon_id','category_id');
    }
}
