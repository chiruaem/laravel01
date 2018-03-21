<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'name'
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];
    public function students(){
        return $this->hasMany('App\Student');
    }
}
