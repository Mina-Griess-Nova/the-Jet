<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DishTranslation extends Model
{

    protected $fillable=['name','info','main_ingredients'];
    public $timestamps = false;

}
