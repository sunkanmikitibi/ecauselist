<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Judge extends Model
{
    protected $fillable = ['judge_name', 'court_id'];

    public function court()
    {
        return $this->belongsTo('App\Court');
    }

    public function cases()
    {
        return $this->hasMany('App\Cause');
    }

}
