<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posology extends Model
{
    protected $fillable = ['description','units','times','period','treatment_id','medicine_id'];


    public function treatment()
    {
        return $this->belongsTo('App\treatment');
    }

    public function medicine()
    {
        return $this->belongsTo('App\Medicine');
    }

    public function doses()
    {
        return $this->hasMany('App\Dose');
    }
}
