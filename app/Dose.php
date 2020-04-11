<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dose extends Model
{
    protected $fillable = ['doseDate','posology_id'];


    public function posology()
    {
        return $this->belongsTo('App\Posology');
    }

}
