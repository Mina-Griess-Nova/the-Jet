<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Cusine extends Model implements TranslatableContract
{

    use Translatable;


    protected $guarded = [];


    public $translatedAttributes = ['name'];



    public function dishes(){
        return $this->belongsToMany('App\Models\Dish','cusine_dish');
    }



}
