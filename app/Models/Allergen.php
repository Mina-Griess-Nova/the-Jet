<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Allergen extends Model
{

    protected $fillable=['name'];

    public function dishes(){
        return $this->belongsToMany('App\Models\Dish','allergen_dish');
    }
}
