@extends('layouts.frontend')

@section('title')
    News - INSTITUTE OF FACILITIES MANAGEMENT AND OFFICE ADMINISTRATION
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
                                <h1 class="">News</h1>
                                <span>HOME &nbsp; <i class="fa fa-caret-right"></i> &nbsp; News</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="section-header">
            <h2 class="font-weight-light">IFMOA News</h2>
        </div>
    </div>
    <!-- END Header -->
    <div class="blog-page area-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="row">
                        @yield('news-content')
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="page-head-blog">
                        <div class="single-blog-page">
                            <!-- search option start -->
                            <form action="#">
                                <div class="search-option">
                                    <input type="text" placeholder="Search...">
                                    <button class="button" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </form>
                            <!-- search option end -->
                        </div>
                        <div class="single-blog-page">
                            <!-- recent start -->
                            <div class="left-blog">
                                <h4>recent news</h4>
                                <div class="recent-post">
                                @if(count($news)>0)
                                    @foreach($news as $single_news)
                                        <!-- start single post -->
                                            <div class="recent-single-post">
                                                <div class="post-img">
                                                    <a href="{{route('news.show',$single_news->slug)}}">
                                                        <img src="{{$single_news->image}}" alt="">
                                                    </a>
                                                </div>
                                                <div class="pst-content">
                                                    <p><a href="{{route('news.show',$single_news->slug)}}">{{\Illuminate\Support\Str::limit($single_news->description,100)}}</a></p>
                                                </div>
                                            </div>
                                            <!-- End single post -->
                                        @endforeach
                                    @else
                                        <p>No Recent News</p>
                                    @endif
                                </div>
                            </div>
                            <!-- recent end -->
                        </div>
                        <div class="single-blog-page">
                            <div class="left-blog">
                                <h4>News Categories</h4>
                                <ul>
                                    @if(count($categories)>0)
                                        @foreach($categories as $category)
                                            <li>
                                                <a href="{{route('news.category',$category->name)}}">{{strtoupper($category->name)}}</a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                        {{--<div class="single-blog-page">
                            <div class="left-tags blog-tags">
                                <div class="popular-tag left-side-tags left-blog">
                                    <h4>popular tags</h4>
                                    <ul>
                                        <li>
                                            <a href="#">Portfolio</a>
                                        </li>
                                        <li>
                                            <a href="#">Project</a>
                                        </li>
                                        <li>
                                            <a href="#">Design</a>
                                        </li>
                                        <li>
                                            <a href="#">wordpress</a>
                                        </li>
                                        <li>
                                            <a href="#">Joomla</a>
                                        </li>
                                        <li>
                                            <a href="#">Html</a>
                                        </li>
                                        <li>
                                            <a href="#">Masonry</a>
                                        </li>
                                        <li>
                                            <a href="#">Website</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>--}}
                    </div>
                </div>
                <!-- End left sidebar -->
            </div>
        </div>
    </div>
    <!-- End News Area -->

@endsection