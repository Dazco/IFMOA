@extends('layouts.frontend')

@section('title')
    How to Register - INSTITUTE OF FACILITIES MANAGEMENT AND OFFICE ADMINISTRATION
@endsection

@section('content')
    <!-- Start Bottom Header -->
    <div class="header-bg page-area">
        <div class="home-overly"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="banner-content text-center">
                        <div class="header-bottom">
                            <div class="layer2 wow zoomIn" data-wow-duration="1s" data-wow-delay=".4s">
                                <h1 class="">Become a Member - How?</h1>
                                <span>HOME &nbsp; <i class="fa fa-caret-right"></i> &nbsp; Become A Member - How?</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container pt-5 mb-3">
        <div class="section-header">
            <h2 class="font-weight-light">Steps to Register</h2>
        </div>
        <div class="col-md-12">
            <div class="tab-content">
                <h4 class="mt-3">Register online <a class="text-danger" href="{{route('register')}}"> here</a> or follow the following steps.</h4>
                <div class="event-content head-team">
                    <h4>step 1</h4>
                    <p>
                        Pick up a membership form at the institute corporate office or any of our co-ordinating unit office or officers during opening hours.
                    </p>
                </div>
                <div class="event-content head-team">
                    <h4>step 2</h4>
                    <p>
                        Pay the sum of &#8358 5000 directly to the "INSTITUTE OF FACILITIES MANAGEMENT AND OFFICE ADMINISTRATION" account (UBA Account No: 1017146192) or just bring the required amount with you while carrying out step 3.
                    </p>
                </div>
                <div class="event-content head-team">
                    <h4>step 3</h4>
                    <p>
                        All copies of completed application forms should be submitted along with photocopies of credentials, a passport size photograph, CV and the sum of &#8358 5000 or proof of payment (bank draft or online payment receipt). Submission should be done at the head office.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection