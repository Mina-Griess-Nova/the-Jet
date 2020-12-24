<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class City extends Model implements TranslatableContract
{
    use Translatable;
    protected $guarded = [];


    public $translatedAttributes = ['name'];


    public function users(){
        return $this->hasMany('App\Models\User','city_id');
    }

}
