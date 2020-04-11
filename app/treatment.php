<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class treatment extends Model
{
    //
    protected $fillable = [
        'startDate','endDate', 'description', 'user_id', 'disease_id',
    ];

    public function patientUser()
    {
        return $this->belongsTo('App\User');
    }

    public function doctorUser()
    {
        return $this->belongsTo('App\User');
    }

    public function disease(){
        return $this->belongsTo('App\disease');
    }

    public function posologies()
    {
        return $this->hasMany('App\Posology');
    }


}
