<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Carbon\Carbon;

class Event extends Model
{
    use HasSlug;
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
    //
    protected $fillable = ['user_id','category_id','calendar_id','title','start_date','start_time','end_date','end_time','location','description','content'];

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

    public function getStartDateTimeAttribute(){
        $date = Carbon::create($this->start_date .' ' . $this->start_time);
        return $date;
    }
    public function getEndDateTimeAttribute(){
        $date = Carbon::create($this->end_date .' ' . $this->end_time);
        return $date;
    }
}
