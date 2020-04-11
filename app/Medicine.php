<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $fillable = ['code','composition','link','appearance'];

    public function posologies()
    {
        return $this->hasMany('App\Posology');
    }
}
