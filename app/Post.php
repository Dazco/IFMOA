<?php

namespace App;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasSlug;
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
    //
    protected $fillable = ['user_id','category_id','title','description','content'];

    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function photo(){
        return $this->morphOne('App\Photo','photoable');
    }
    public function getImageAttribute(){
        return $this->photo? asset(str_replace('public', 'storage', $this->photo->path)):'https://via.placeholder.com/500x250';
    }
}
