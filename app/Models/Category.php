<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['name'];


    public function dishes(){
        return $this->hasMany('App\Models\Dish','category_id');
    }

    public function addons(){
        return $this->belongsToMany('App\Models\Addons','addon_category','category_id','addon_id');
    }
}
