<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','surname', 'dni','telephone', 'email', 'password', 'collegiateNumber', 'nuhsa', 'userType', 'specialty_id','clinic_id',
    ];

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

    public function treatments()
    {
        return $this->hasMany('App\treatment');
    }

    public function specialty()
    {
        return $this->belongsTo('App\specialty');
    }

    public function clinic()
    {
        return $this->belongsTo('App\Clinic');
    }

    public function getFullNameAttribute()
    {
        return $this->name .' '.$this->surname;
    }

}
