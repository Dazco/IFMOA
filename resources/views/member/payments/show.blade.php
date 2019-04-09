@extends('layouts.member')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-12">
                @include('includes.session_flash')
                <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                    <input type="hidden" name="reference" value="{{$ref =  Paystack::genTranxRef() }}"> {{-- required --}}
                    <div class="row text-success" style="margin-bottom:40px;font-size: x-large;">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="form-group row">
                                <div class="col-sm-6 ">Member:</div>
                                <div class="col-sm-6 text-primary">{{$member->name}}</div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <div class="col-sm-6 ">Payment For:</div>
                                <div class="col-sm-6 text-primary">{{$payment->name}}</div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <div class="col-sm-6 ">Amount:</div>
                                <div class="col-sm-6 text-primary">&#8358; {{$payment->amount}}</div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <div class="col-sm-6 ">Transaction Reference:</div>
                                <div class="col-sm-6 text-primary">{{$ref}}</div>
                            </div>
                            <input type="hidden" name="email" value="{{$member->email}}"> {{-- required --}}
                            <input type="hidden" name="orderID" value="{{$payment->id}}">
                            <input type="hidden" name="amount" value="{{$payment->amount * 100}}"> {{-- required in kobo --}}
                            <input type="hidden" name="quantity" value="1">
                            <input type="hidden" name="metadata" value="{{ json_encode($array = ['paymentId' => $payment->id]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
                            <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> {{-- required --}}
                            {{ csrf_field() }}  {{--works only when using laravel 5.1, 5.2--}}
                                <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Now!">
                                    <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                                </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection