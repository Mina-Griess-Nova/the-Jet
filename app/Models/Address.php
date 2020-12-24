<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public $table='address';
    protected $fillable=['coordinates','address','user_id'];



    public function users(){
        return $this->belongsTo('App\Models\User','user_id');

    }
}
