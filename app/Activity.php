<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model{
    protected $table = 'activities';

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function task(){
        return $this->hasMany('App\Task');
    }
}