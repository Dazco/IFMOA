<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    //
    protected $fillable = ['title','description','category_id',];
    public function photo(){
        return $this->morphOne('App\Photo','photoable');
    }
    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function getImageAttribute(){
        return $this->photo? asset(str_replace('public', 'storage', $this->photo->path)):'https://via.placeholder.com/500x250';
    }
}
