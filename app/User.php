<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Model\Address;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];


    public function reviews(){
        return $this->hasMany('App\Model\Review');

    }

    public function addresses(){
        return $this->hasMany('App\Model\Address');

    }

    public function posts(){
        return $this->hasMany('App\Model\Post');

    }

    public function vendor(){
        return $this->hasOne('App\Model\Vendor');

    }
    public function brands(){
        return $this->hasMany('App\Model\Brand');

    }

    public function products(){
        return $this->hasManyThrough('App\Model\Product','App\Model\Brand');

    }

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
    ];
}
