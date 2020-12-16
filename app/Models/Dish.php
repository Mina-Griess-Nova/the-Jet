<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{

    protected $fillable=['name','images','price','user_id','section_id','category_id','available','portions_available','info','main_ingredients','available_count','cook_on'];


    public function cusines(){
            return $this->belongsToMany('App\Models\Cusine','cusine_dish');
    }


    public function users(){
        return $this->belongsTo('App\Models\User','user_id');

    }


    public function addons(){
        return $this->belongsToMany('App\Models\Addons','addon_dish','dish_id','addon_id');
    }


    public function sections(){
        return $this->belongsTo('App\Models\Section','section_id');
    }

    public function categories(){
        return $this->belongsTo('App\Models\Category','category_id');
    }

    public function allergens(){
        return $this->belongsToMany('App\Models\Allergen','allergen_dish');
    }

}
