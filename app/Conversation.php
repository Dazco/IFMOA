<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Conversation extends Model
{
    //
    protected $fillable = ['user_one','user_two','status'];

    public function messages(){
        return $this->hasMany('App\Message','conversation_id');
    }
    public function receiver(){
        $userId = $this->user_one === Auth::user()->id ? $this->user_two: $this->user_one;

        return User::findOrFail($userId);
    }

}
