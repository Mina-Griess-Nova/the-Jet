<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['user_id','cook_id','date','time','orderEntry','address'];


    public function users(){
        return $this->belongsTo('App\Models\User','user_id');

    }
}
