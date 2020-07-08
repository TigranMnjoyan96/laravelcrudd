<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'name', 'age'
    ];


    public function student() {
        return $this->hasOne('App/Student');
    }
}
