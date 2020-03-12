<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Court extends Model
{
    protected $fillable = ['name'];

    public function judge()
    {
        return $this->hasOne('App\Judge');
    }

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function cases()
    {
        return $this->hasMany('App\Cause');
    }
}
