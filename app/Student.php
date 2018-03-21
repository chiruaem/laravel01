<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name', 'age', 'gender', 'group_id'
    ];
    public function groups(){
        return $this->belongsTo('App\Group', 'group_id');
    }
    public function results(){
        return $this->hasMany('App\Result');
    }
}
