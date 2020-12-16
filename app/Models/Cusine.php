<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Cusine extends Model
{
    protected $fillable=['name'];

    public function dishes(){
        return $this->belongsToMany('App\Models\Dish','cusine_dish');
    }



}
