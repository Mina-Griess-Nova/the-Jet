<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{


    protected $fillable=['name'];

    public function dishes(){
        return $this->hasMany('App\Models\Dish','section_id');
    }

}
