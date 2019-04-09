<?php

namespace App\Http\Controllers\Auth;

use App\Notifications\Member\MemberRegistered;
use App\User;
use App\Http\Controllers\Controller;
use function GuzzleHttp\Psr7\str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/register';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'surname'=>['required', 'string', 'max:255'],
            'firstname'=>['required', 'string', 'max:255'],
            'othernames'=>['required'],
            'address'=>['required'],
            'phone'=>['required','numeric'],
            'email'=>['required','email','unique:users,email'],
            'date_of_birth'=>['required','date'],
            'nationality'=>['required'],
            'state_of_origin'=>['required_if:nationality,Nigeria'],
            'company_name'=>['required'],
            'company_address'=>['required'],
            'job_title'=>['required'],
            'nature_of_work'=>['required'],
            'photo'=>['required','image'],
            /*Referee*/
            'referee_name'=>['required'],
            'referee_address'=>['required'],
            'referee_phone'=>['required'],
            'referee_email'=>['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(Request $request)
    {
        $data = $request->all();
                /*General Information*/
        $user = User::create([
                    'surname'=>$data['surname'],
                    'firstname'=>$data['firstname'],
                    'othernames'=>$data['othernames'],
                    'address'=>$data['address'],
                    'phone'=>$data['phone'],
                    'email'=>$data['email'],
                    'date_of_birth'=>$data['date_of_birth'],
                    'nationality'=>$data['nationality'],
                    'state_of_origin'=>$data['state_of_origin'],
                    'company_name'=>$data['company_name'],
                    'company_address'=>$data['company_address'],
                    'job_title'=>$data['job_title'],
                    'nature_of_work'=>$data['nature_of_work'],
                  'password' => Hash::make(strtoupper($data['surname'])),
                ]);
        /*Photo*/
        if($request->hasFile('photo') && $request->file('photo')->isValid()){
            $file = $request->file('photo');
            $path = $file->storePublicly('public/uploads/images/members');
            $user->photo()->create(['path'=>$path]);
        }
                    /*Qualifications*/
        /*Academic*/
        foreach ($data['academic'] as $academic){
            $academic['type'] = 'academic';
            $user->qualifications()->create($academic);
        }
        /*Professional*/
        foreach ($data['professional'] as $professional){
            $professional['type'] = 'professional';
            $user->qualifications()->create($professional);
        }
                    /*Employment*/
        foreach ($data['employment'] as $employment){
            $user->employments()->create($employment);
        }
                    /*Referee*/
        $user->referee()->create([
            'name'=> $data['referee_name'],
            'address'=> $data['referee_address'],
            'phone'=> $data['referee_phone'],
            'email'=> $data['referee_email'],
        ]);
        $user->notify(new MemberRegistered($user));
        $admins = User::where('is_admin',1)->where('is_active',1)->get()-all();
        Notification::send($admins,new \App\Notifications\Admin\MemberRegistered($user));
        Session::flash('alert-success','Your registration details have been submitted. Await confirmation via your email address.');
        return $user;
    }
}
