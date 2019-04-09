@extends('layouts.frontend')

@section('title')
    Gallery - INSTITUTE OF FACILITIES MANAGEMENT AND OFFICE ADMINISTRATION
@endsection

@section('styles')
    <link href="{{url('lib/venobox/venobox.css')}}" rel="stylesheet">
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
                                <h1 class="">Gallery</h1>
                                <span>HOME &nbsp; <i class="fa fa-caret-right"></i> &nbsp; Gallery</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start portfolio Area -->
    <div id="portfolio" class="portfolio-area area-padding fix">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>Our Media Gallery</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <!-- Start Portfolio -page -->
                <div class="awesome-project-1 fix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="awesome-menu">
                            <ul class="project-menu">
                                <li>
                                    <a href="#" class="active" data-filter="*">All</a>
                                </li>
                                @if($categories)
                                    @foreach($categories as $category)
                                        <li>
                                            <a href="#" class="" data-filter=".{{strtolower($category->name)}}">{{ucwords($category->name)}}</a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="awesome-project-content w-100">
                    @if($gallery)
                        @foreach($gallery as $media)
                            <!-- single-awesome-project start -->
                            <div class="col-md-4 col-sm-4 col-xs-12 {{strtolower($media->category->name)}}">
                                <div class="single-awesome-project">
                                    <div class="awesome-img">
                                        <a href="#"><img src="{{$media->image}}" alt="{{$media->title}}" /></a>
                                        <div class="add-actions text-center">
                                            <div class="project-dec">
                                                <a class="venobox" data-gall="myGallery" href="{{$media->image}}">
                                                    <h4>{{ucwords($media->title)}}</h4>
                                                    <span>{{ucwords($media->category->name)}}</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single-awesome-project end -->
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- awesome-portfolio end -->
@endsection

@section('scripts')
    <script src="{{url('lib/venobox/venobox.min.js')}}"></script>
    <script src="{{url('lib/isotope/isotope.pkgd.min.js')}}"></script>
    <script src="{{url('lib/magnific-popup/magnific-popup.min.js')}}"></script>
@endsection