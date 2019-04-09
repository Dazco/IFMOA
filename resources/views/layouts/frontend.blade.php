<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="{{url('/images/frontend/favicon.png')}}" rel="icon">
    <link href="{{url('/images/frontend/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900"
          rel="stylesheet">

    {{--Library styles--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="{{url('/lib/nivo-slider/css/nivo-slider.css')}}" rel="stylesheet">
    <link href="{{url('/lib/fontawesome-free/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{url('/lib/animate/animate.css')}}" rel="stylesheet">
    <!-- Core CSS File -->
    <link rel="stylesheet" href="{{url('/css/frontend/app.css')}}">

    {{--Custom Page Styles--}}
    @yield('styles')

</head>

<body>

<div id="preloader"></div>
<!--==========================
Top Bar
============================-->
<section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
        <div class="contact-info float-left">
            <i class="fa fa-envelope-o"></i> <a href="mailto:admin@ifmoa.org.ng">admin@ifmoa.org.ng</a>
            <i class="fa fa-phone"></i> +234 810 082 8886
            <i class="fa fa-phone"></i> +234 808 853 1598
            <i class="fa fa-phone"></i> +234 708 950 6246
        </div>
        <div style="float: right;"><b>
                <span><a href="{{route('register')}}">MEMBER REGISTER</a></span> &nbsp; |
                <span><a href="{{route('login')}}">MEMBER LOGIN</a></span></b>
        </div>
    </div>
</section>
<!--==========================
  Header
============================-->
<header id="header">
    <div class="container" id="header-container">
        <div id="logo" class="float-left">
            <a href="{{route('home')}}"><img src="{{url('/images/frontend/head.jpg')}}" alt="IFMOA LOGO" title="IFMOA LOGO"/></a>
        </div>

        <nav id="nav-menu-container" class="sticker">
            <ul class="nav-menu">
                <li class="{{Request::is('home')?'menu-active':'menu'}}"><a href="{{route('home')}}">Home</a></li>
                <li class="menu-has-children {{Request::is('about')?'menu-active':''}}"><a href="#">About</a>
                    <ul class="dropbody">
                        <li><a href="{{'about'}}">About IFMOA</a></li>
                        <li><a target="_blank" href="https://app.termly.io/document/disclaimer/5e73a2b1-8193-46eb-9ec3-d30a0827752c">Disclaimer</a></li>
                    </ul>
                </li>
                <li class="menu-has-children {{Request::is('register*')?'menu-active':''}}"><a href="#">Membership</a>
                    <ul class="dropbody">
                        <li><a href="{{route('register-why')}}">Become a member - Why?</a></li>
                        <li><a href="{{route('register-how')}}">Become a member - How?</a></li>
                        <li><a href="{{route('register')}}">Membership Registration</a></li>
                        <li><a href="{{route('register-benefits')}}">Membership Benefits</a></li>
                        <li><a href="{{route('register-grade')}}">Membership Grades and Requirements</a></li>
                    </ul>
                </li>
                <li class="menu-has-children {{Request::is('events')||Request::is('news')||Request::is('gallery')?'menu-active':''}}"><a href="#">Media Center</a>
                    <ul class="dropbody">
                        <li><a href="{{route('events')}}">Events</a></li>
                        <li><a href="{{route('news')}}">News</a></li>
                        <li><a href="{{route('gallery')}}">Photo Gallery</a></li>
                    </ul>
                </li>
                <li class="{{Request::is('blog')?'menu-active':'menu'}}"><a href="{{route('blog')}}">Blog</a></li>
                <li class="{{Request::is('contact')?'menu-active':'menu'}}"><a href="{{route('contact')}}">Contact Us</a></li>
            </ul>
        </nav><!-- #nav-menu-container -->
    </div>
</header><!-- #header -->
<!-- header end -->
<div class="login-reg container">
    <span><a href="{{route('register')}}">REGISTER</a></span> &nbsp; |
    <span><a href="{{route('login')}}">LOGIN</a></span>
</div>

{{--Page Content--}}
    @yield('content')
{{--End Page Content--}}

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<!-- Start Footer bottom Area -->
<footer>
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="footer-content">
                        <div class="footer-head">
                            <div class="footer-logo">
                                <h2><i>About Us</i></h2>
                            </div>

                            <p><i>IFMOA is Nigeria's largest membership body serving the Facility and Office
                                    administration management profession.
                                    From public to private, rural to urban and local to international,
                                    our members represent the entire range facilities and office administration
                                    experience <a href="{{route('about')}}">read more...</a></i></p>
                            <div class="footer-icons">
                                <ul>
                                    <li>
                                        <a href="https://web.facebook.com/ifmoanig/" target="_blank"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end single footer -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="footer-content">
                        <div class="footer-head">
                            <h3><i>Our Contacts</i></h3>
                            <p>
                                <i>22 Ayodele Street, BRT Terminal, Fadeyi , Lagos</i>
                            </p>
                            <p>
                                <i>Department of Building Technology Yaba, Lagos State.</i>
                            </p>
                            <div class="footer-contacts">
                                <p><span>Tel:</span> +234 810 082 8886</p>
                                <p><span>Tel:</span> +234 808 853 1598</p>
                                <p><span>Tel:</span> +234 708 950 6246</p>
                                <p><span>Email:</span> admin@ifmoa.org.ng</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end single footer -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="footer-content">
                        <div class="footer-head">
                            <h3><i>Newsletter</i></h3>
                            <p><i>Subscribe to our newsletter and stay up to date
                                    with the latest development and best practices
                                    in the building industry!</i></p>

                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="example@mail.com"
                                       aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button">Subscribe</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-area-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="copyright text-center">
                        <p>
                            &copy; Copyright <strong>IFMOA</strong>. All Rights Reserved
                        </p>
                    </div>
                    <div class="credits">
                        Power by <a href="https://TechnoSoft.com.ng/">TechnoSoft Assoiates</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>


{{--Library Scripts--}}
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="{{url('/lib/wow/wow.min.js')}}"></script>
<script src="{{url('/lib/nivo-slider/js/jquery.nivo.slider.js')}}" type="text/javascript"></script>
<script src="{{url('/lib/easing/easing.js')}}"></script>
<script src="{{url('/lib/sticky/sticky.js')}}"></script>

{{--Custom Page Scripts--}}
@yield('scripts')

{{--Core Js File--}}
<script src="{{url('/js/frontend/app.js')}}"></script>
</body>

</html>
