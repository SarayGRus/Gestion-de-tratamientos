<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class treatment extends Model
{
    //
    protected $fillable = [
        'startDate','endDate', 'description', 'doctor_id', 'disease_id', 'patient_id',
    ];

    public function patientUser()
    {
        return $this->belongsTo('App\User','patient_id');
    }

    public function doctorUser()
    {
        return $this->belongsTo('App\User','doctor_id');
    }

    public function disease(){
        return $this->belongsTo('App\disease');
    }

    public function posologies()
    {
        return $this->hasMany('App\Posology');
    }


}
