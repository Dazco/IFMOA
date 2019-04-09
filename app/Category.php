<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['name','type'];

    public function posts(){
        return $this->hasMany('App\Post');
    }
    public function news(){
        return $this->hasMany('App\News');
    }
    public function media(){
        return $this->hasMany('App\Media');
    }
    public function events(){
        return $this->hasMany('App\Event');
    }
}
