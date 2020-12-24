<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AddonsTranslation extends Model
{
    public $table="addons_translations";

    public $timestamps = false;
    protected $fillable = ['name'];

}
