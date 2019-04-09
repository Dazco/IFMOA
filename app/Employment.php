<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employment extends Model
{
    //
    protected $fillable = ['organization','position','date_from','date_to','responsibilities'];
}
