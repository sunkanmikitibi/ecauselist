<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cause extends Model
{
    protected $table = 'cases';
    protected $dates = ['case_date', 'dateof_nextadj'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function judge()
    {
        return $this->belongsTo('App\Judge');
    }


    public function court()
    {
        return $this->belongsTo('App\Court');
    }
}
