<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name', 'teacher_id'
    ];

    public function teacher() {
        dd('belongs');
        return $this->belongsTo('App\Teacher');
    }
}
