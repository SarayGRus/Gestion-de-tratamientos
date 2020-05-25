<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $fillable = ['name','code','activeIngredient','link','appearance','pharmaForm'];

    public function posologies()
    {
        return $this->hasMany('App\Posology');
    }
}
