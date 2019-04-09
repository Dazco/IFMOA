<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $fillable = ['payment_type_id','user_id','reference','trans_id'];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function paymentType(){
        return $this->belongsTo('App\PaymentType');
    }
}
