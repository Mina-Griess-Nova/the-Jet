<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Dish extends Model implements TranslatableContract
{
    use Translatable;

    protected $fillable=['name','images','discount_id','user_id','lowest','section_id','category_id','available','portions_price','portions_available','available_count','cook_on'];
    public $appends = ['lowest'];
    public $attribute=['lowest'];
    public function getPortionsAvailableAttribute($data)
    {
        $portions_available = json_decode($data);
        return $portions_available;
    }

    public function getPortionsPriceAttribute($data)
    {
        $portions_price = json_decode($data);
        return $portions_price;
    }

    public function getLowestAttribute ()
    {
        $portions_price = collect($this->portions_price)->filter(function ($item) {
            return !is_null($item);
        });
         return $portions_price->min();
    }

    public $translatedAttributes = ['name','info','main_ingredients'];


    public function cusines(){
            return $this->belongsToMany('App\Models\Cusine','cusine_dish');
    }


    public function users(){
        return $this->belongsTo('App\Models\User','user_id','id');

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

    public function discount(){
        return $this->belongsTo('App\Models\Discount','discount_id');

    }
}
