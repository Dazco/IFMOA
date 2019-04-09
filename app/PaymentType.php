<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentType extends Model
{
    //
    protected $fillable = ['name','amount','grade_id','description','user_id'];
    public function grade(){
        return $this->belongsTo('App\Grade','grade_id');
    }
    public function payments(){
        return $this->hasMany('App\Payment');
    }
    public function creator(){
        return $this->belongsTo('App\User','user_id');
    }
}
