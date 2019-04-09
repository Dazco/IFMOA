<?php

namespace App\Http\Controllers\Member;

use App\Notifications\Member\PaymentMade;
use App\PaymentType;
use App\User;
use http\Url;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;
use Unicodeveloper\Paystack\Facades\Paystack;

class PaymentController extends Controller
{
    //
    public function index(){
        $member = Auth::user();
        return view('member.payments.index',compact('member'));
    }
    public function show($id){
        $member = Auth::user();
        $payment = PaymentType::findOrFail($id);
        return view('member.payments.show',compact('member','payment'));
    }

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        try {
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch (\Exception $error){
            Session::flash('alert-danger',$error->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Obtain Paystack payment information
     * @return Url
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
        $member = Auth::user();
        $payment = $member->payments()->create([
            'payment_type_id' => $paymentDetails['data']['metadata']['paymentId'],
            'reference' => $paymentDetails['data']['reference'],
            'trans_id' => $paymentDetails['data']['id']
        ]);
        $name = $payment->paymentType->name;
        $member->notify(new PaymentMade($name));
        $admins = User::where('is_admin',1)->where('is_active',1)->get()->all();
        Notification::send($admins, new \App\Notifications\Admin\PaymentMade($name,$member));
        Session::flash('alert-success',"You have successfully paid your '$name' fee.'");
        return redirect('/member/payments');
    }
}
