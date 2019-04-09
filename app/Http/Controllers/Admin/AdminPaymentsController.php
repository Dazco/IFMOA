<?php

namespace App\Http\Controllers\Admin;

use App\Grade;
use App\PaymentType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminPaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $payments = PaymentType::all();
        return view('admin.payments.index',compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $grades = Grade::pluck('name','id')->all();
        return view('admin.payments.create',compact('grades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'amount' => 'required|numeric',
            'grade_id' => 'required',
            'description' => 'required'
        ]);
        $data = $request->all(0);
        $user = Auth::user();
        if ($data['grade_id'] == 0){
            $grades = Grade::all();
            foreach ($grades as $grade){
                $data['grade_id'] = $grade->id;
                $paymentType = $user->paymentTypes()->create($data);
            }
        }else{
            $paymentType =  $user->paymentTypes()->create($data);
        }
        Session::flash('alert-success',"The Payment '$paymentType->name' has been generated");
        return redirect('admin/payments');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $paymentType = PaymentType::findOrFail($id);
        if($paymentType->delete()){
            Session::flash('alert-danger',"The payment '$paymentType->name' has been deleted and no further payments would be received");
        }else{
            Session::flash('alert-danger',"The payment '$paymentType->name' could not be deleted and payments may still be received. Please contact support as quickly as possible.");
        }
        return redirect('admin/payments');
    }
}
