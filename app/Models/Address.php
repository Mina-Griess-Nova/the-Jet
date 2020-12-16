<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public $table='address';
    protected $fillable=['title','city','area','user_id','state','floor'];



    public function users(){
        return $this->belongsTo('App\Models\User','user_id');

    }
}
