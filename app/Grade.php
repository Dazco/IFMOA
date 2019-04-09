<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    //
    protected $fillable = ['name'];
    public function users(){
        return $this->hasMany('App\User');
    }
    public function PaymentTypes(){
        return $this->hasMany('App\PaymentType');
    }
}
