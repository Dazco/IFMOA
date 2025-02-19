<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ELibrary extends Model
{
    //
    protected $fillable = ['user_id','title','description','path'];
    public function user(){
        return $this->belongsTo('App\User');
    }
}
