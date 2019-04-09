<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //

    protected $fillable = [
        'message',
        'is_seen',
        'deleted_from_sender',
        'deleted_from_receiver',
        'user_id',
        'conversation_id',
    ];

    public function conversation(){
        return $this->belongsTo('App\Conversation','conversation_id');
    }
    public function sender(){
        return $this->belongsTo('App\User','user_id');
    }
    public function getUpdatedAtAttribute($time){
        $time = new Carbon($time);
        return $time->format('g: i A');
    }
}
