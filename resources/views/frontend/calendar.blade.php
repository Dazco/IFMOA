@extends('layouts.frontend')

@section('title')
    Calendar - INSTITUTE OF FACILITY MANAGEMENT AND OFFICE ADMINISTRATION
@endsection

@section('styles')
    <style>
        .googleCalendar{
            position: relative;
            height: 350px;
            width: 100%;
            padding-bottom: 50%;
        }

        .googleCalendar iframe{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
@endsection

@section('content')
    <div class="header-bg page-area">
        <div class="home-overly"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="banner-content text-center">
                        <div class="header-bottom">
                            <div class="layer2 wow zoomIn" data-wow-duration="1s" data-wow-delay=".4s">
                                <h1 class="">Calendar</h1>
                                <span>HOME &nbsp; <i class="fa fa-caret-right"></i> &nbsp; CALENDAR</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="row main-about" >
            <div class="col-md-10">
                <div class="section-header">
                    <h2 class="font-weight-light">IFMOA CALENDAR</h2>
                </div>
            </div>
        </div>
        <div class="googleCalendar col-12">
            <iframe src="https://calendar.google.com/calendar/embed?src=7p24udiqjo69q0oo5pic4fts98%40group.calendar.google.com&ctz=Africa%2FLagos" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
        </div>
    </div>
    <br><br>
@endsection