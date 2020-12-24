<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Category extends Model implements TranslatableContract
{

    use Translatable;
    protected $guarded = [];


    public $translatedAttributes = ['name'];

    public function dishes(){
        return $this->hasMany('App\Models\Dish','category_id');
    }

    public function addons(){
        return $this->belongsToMany('App\Models\Addons','addon_category','category_id','addon_id');
    }
}
