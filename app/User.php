<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'registration_number', 'surname',
        'firstname', 'othernames', 'address','phone', 'email_verified_at',
        'date_of_birth', 'nationality', 'state_of_origin', 'company_name',
        'company_address', 'job_title', 'nature_of_work','is_approved','is_admin','is_active','grade_id','last_seen'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getNameAttribute(){
        return ucwords($this->surname.' '.$this->firstname);
    }

    public function qualifications(){
        return $this->hasMany('App\Qualification');
    }

    public function employments(){
        return $this->hasMany('App\Employment');
    }
    public function referee(){
        return $this->hasOne('App\Referee');
    }
    public function posts(){
        return $this->hasMany('App\Post');
    }
    public function eLibrary(){
        return $this->hasMany('App\ELibrary');
    }
    public function downloads(){
        return $this->hasMany('App\Download');
    }
    public function news(){
        return $this->hasMany('App\News');
    }
    public function events(){
        return $this->hasMany('App\Event');
    }
    public function photo(){
        return $this->morphOne('App\Photo','photoable');
    }
    public function getImageAttribute(){
        return $this->photo? asset(str_replace('public', 'storage', $this->photo->path)):'/images/frontend/default-profile.jpg';
    }
    public function grade(){
        return $this->belongsTo('App\Grade');
    }
    /*For Creator of Payment type*/
    public function paymentTypes(){
        return $this->hasMany('App\PaymentType');
    }

    public function payments(){
        return $this->hasMany('App\Payment');
    }
    public function outstandingBills(){
        return $this->grade->paymentTypes()->whereDoesntHave('payments', function (Builder $query) {
            $query->where('user_id', 'like', "$this->id");
        })->get();
    }
    public function getTotalAttribute(){
        $total = 0;
        if($this->grade->paymentTypes()){
            foreach ($this->grade->paymentTypes as $payment){
                $total += $payment->amount;
            }
        }
        return $total;
    }
    public function getPaidAttribute(){
        $paid = 0;
        if($this->has('payments')){
            foreach ($this->payments as $payment){
                $paid += $payment->paymentType->amount;
            }
        }
        return $paid;
    }
    public function getOwingAttribute(){
        $total = 0;
        if ($this->outstandingBills()){
            foreach ($this->outstandingBills() as $payment) {
                $total += $payment->amount;
            }
        }
        return $total;
    }

}
