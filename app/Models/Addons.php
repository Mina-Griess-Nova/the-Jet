<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Addons extends Model implements TranslatableContract
{
    use Translatable;

    protected $guarded = [];

    public $translationForeignKey='addon_id';



    public $translatedAttributes = ['name'];
    public function dishes(){
        return $this->belongsToMany('App\Models\Dish','Addon_dish','addon_id','dish_id');
    }


    public function categories(){
        return $this->belongsToMany('App\Models\Category','addon_category','addon_id','category_id');
    }
}
