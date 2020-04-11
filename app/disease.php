<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class disease extends Model
{
    //
    protected $fillable = [
        'name', 'description', 'specialty_id',
    ];

    public function treatments()
    {
        return $this->hasMany('App\treatment');
    }

    public function specialty()
    {
        return $this->belongsTo('App\specialty');
    }
}
