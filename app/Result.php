<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'toan', 'ly', 'hoa', 'anh', 'student_id'
    ];
    public function student(){
        return $this->belongsTo('App\Student', 'student_id');
    }
}
