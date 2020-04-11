<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class specialty extends Model
{
    //
    protected $fillable = [
        'name',
    ];


    public function users()
    {
        return $this->$this->hasMany('App\User');
    }

    public function diseases()
    {
        return $this->hasMany('App\disease');
    }
}
