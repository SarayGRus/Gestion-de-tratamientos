<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    //
    protected $fillable = [
        'name','telephone', 'opening', 'closing', 'address',
    ];

    public function doctorUsers()
    {
        return $this->hasMany('App\User');
    }

}
