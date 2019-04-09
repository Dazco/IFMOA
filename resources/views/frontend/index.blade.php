@extends('layouts/frontend')

@section('title')
    IFMOA - INSTITUTE OF FACILITIES MANAGEMENT AND OFFICE ADMINISTRATION
@endsection

@section('content')
    <!-- Start Slider Area -->
    <div id="home" class="slider-area">
        <div class="bend niceties preview-2">
            <div id="ensign-nivoslider" class="slides">
                <img src="images/frontend/slider/slider1.jpg" alt="" title="#slider-direction-1"/>
                {{--<img src="images/frontend/slider/ifmoa-services.jpeg" alt="" title="#slider-direction-2">--}}
            </div>

            <!-- direction 1 -->
            <div id="slider-direction-1" class="slider-direction slider-one">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="slider-content">
                                <!-- layer 1 -->
                                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                                    <h1 class="title2">IFMOA</h1>
                                </div>
                                <!-- layer 2 -->
                                <div class="layer-1-1 hidden-xs wow slideInDown" data-wow-duration="2s"
                                     data-wow-delay=".2s">
                                    <h2 class="title1 text-danger">INSTITUTE OF FACILITIES MANAGEMENT AND OFFICE
                                        ADMINISTRATION</h2>
                                </div>
                                <!-- layer 3 -->
                                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                                    <a class="ready-btn right-btn page-scroll" href="{{route('register')}}">Become a Member</a>
                                    <a class="ready-btn page-scroll" href="{{route('register-why')}}">Why?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--<!-- direction 2 -->
            <div id="slider-direction-2" class="slider-direction slider-two">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="slider-content">
                                <!-- layer 1 -->
                                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                                </div>
                                <!-- layer 2 -->
                                <div class="layer-1-1 hidden-xs wow slideInDown" data-wow-duration="2s"
                                     data-wow-delay=".2s">
                                </div>
                                <!-- layer 3 -->
                                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>--}}
        </div>
    </div>
    <!-- End Slider Area -->


    <!-- Start About area -->
    <div id="about" class="about-area area-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>Who are We?</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- single-well start-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="well-left">
                        <div class="single-well">
                            <a href="#">
                                <img src="images/frontend/about/question-mark.jpg" alt="question marks">
                            </a>
                        </div>
                    </div>
                </div>
                <!-- single-well end-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="well-middle">
                        <div class="single-well">
                            <a href="#">
                                <h4 class="sec-head text-danger">Institute Of Facilities Management And Office
                                    Administration</h4>
                            </a>
                            <div>
                                <b class="text-success">Good question</b>, We are Nigeria's largest membership body serving
                                the Facility and Office administration management profession.
                                From public to private, rural to urban and local to international, our members represent the
                                entire range facilities and office administration experience including: <br>
                                <ul>
                                    <li>
                                        <i class="fa fa-check"></i> Regional, State, Country and City facility management
                                        and office administration development organizations.
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i> Chambers of commerce and other business support
                                        agencies.
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>Community and neighbourhood development organizations.
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i> Technology development agencies.
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i> Utility companies, Educational Institutions,
                                        Consultants, Redevelopment authorities.
                                    </li>
                                </ul>
                                Intrigued aren't we? Why don't you <a href="about.html"><b>find out more <i
                                                class="fa fa-angle-double-right"></i></b></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col-->
            </div>
        </div>
    </div>
    <!-- End About area -->
    <div class="row justify-content-center">
        <!-- Start Left services -->
        <div class="col-md-4 text-center">
            <div class="about-move">
                <div class="services-details">
                    <div class="single-services">

                        <h3><i class="fa fa-trophy text-dark"></i><br/> Our Mission</h3>
                        <p>
                            To provide members both corporate and individuals with a single connection to develop
                            organizational and professional competence.
                        </p>
                    </div>
                </div>
                <!-- end about-details -->
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="about-move">
                <div class="services-details">
                    <div class="single-services">
                        <h3><i class="fa fa-eye text-dark"></i><br/> Our Vision</h3>
                        <p>
                            To Play a critical role in moving the economies of Nigerian and other African markets to world
                            class status.
                        </p>
                    </div>
                </div>
                <!-- end about-details -->
            </div>
        </div>
    </div>
    <div id="blog" class="blog-area mission">
        <div class="blog-inner area-padding">
            <div class="blog-overly"></div>
            <div class="container ">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="section-headline text-center">
                            <h2>Recent News</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    @if(count($news)>0)
                        @foreach($news as $new)
                            <!-- Start Left Blog -->
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="single-blog">
                                    <div class="single-blog-img">
                                        <a href="{{route('news.show',$new->slug)}}">
                                            <img src="{{$new->image}}" alt="{{$new->title}}">
                                        </a>
                                    </div>
                                    <div class="blog-meta">

                                <span class="date-type">
                                    <i class="fa fa-calendar"></i> {{$new->created_at->diffForHumans()}}
                                  </span>
                                    </div>
                                    <div class="blog-text">
                                        <h4>
                                            <a href="{{route('news.show',$new->slug)}}">{{$new->title}}</a>
                                        </h4>
                                        <p>
                                            {{$new->description}}
                                        </p>
                                    </div>
                                    <span>
                                  <a href="{{route('news.show',$new->slug)}}" class="ready-btn">Read more</a>
                                </span>
                                </div>
                                <!-- Start single blog -->
                            </div>
                            <!-- End Left Blog-->
                        @endforeach
                    @else
                            <div class="justify-content-center">
                                <div class="single-blog">
                                    <h2 class="text-danger">No Recent News</h2>
                                </div>
                            </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog -->
@endsection