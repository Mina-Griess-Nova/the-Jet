<?php

namespace App\Models;


use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class User extends Authenticatable implements TranslatableContract , JWTSubject
{
    use Translatable;
    use LaratrustUserTrait;
    use Notifiable;



    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }


    public static function boot() {
        parent::boot();

        static::roleAttached(function($user, $role, $team) {
        });
        static::roleSynced(function($user, $changes, $team) {
        });
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'email', 'password','phone','images','info','date_of_birth','work_to','work_from','city_id','commission','contract','availability','commission_type'
    ];

    public $translatedAttributes = ['name'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        // 'work_to' => 'date:hh:mm',
        // 'work_from' => 'date:hh:mm',
    ];


    public function dishes(){
        return $this->hasMany('App\Models\Dish','user_id');

    }

    public function address(){
        return $this->hasMany('App\Models\Address','user_id');
    }


    public function roles(){
        return $this->belongsToMany('App\Models\Role','role_user');
    }

    public function orders(){
        return $this->hasMany('App\Models\Order','user_id');

    }

    public function cities(){
        return $this->belongsTo('App\Models\City','city_id');

    }

    public function getWorkToAttribute($date)
    {
        if(is_null($date)){
            return 0;
        }else{
            return strtotime(date('h:i A', strtotime($date)));

        }
    }
    public function getWorkFromAttribute($date)
    {
        if(is_null($date)){
            return 0;
        }else{
        return strtotime(date('h:i A', strtotime($date)));
        }
    }




}
