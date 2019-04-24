@extends('layouts.frontend')

@section('title')
    DOWNLOADS - INSTITUTE OF FACILITY MANAGEMENT AND OFFICE ADMINISTRATION
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.4/b-print-1.5.4/kt-2.5.0/r-2.2.2/sc-1.5.0/datatables.min.css"/>
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
                                <h1 class="">Downloads</h1>
                                <span>HOME &nbsp; <i class="fa fa-caret-right"></i> &nbsp; Downloads</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Downloads </h1>

        <!--Posts-->
        <div class="row main-about">
            <div class="col-md-12">
                <div class="card striped-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">All Downloads</h4>
                        <p class="card-category">These are all the documents available for public downloads</p>
                    </div>
                    @include('includes.session_flash')
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped" id="all_downloads">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th><i class="fas fa-book"></i> Title</th>
                                <th><i class="fas fa-book-open"></i> description</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($downloads)
                                @for($i= 1;$i<=count($downloads);$i++)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td><a href="{{action('FrontendController@download',$downloads[$i-1]->id)}}">{{$downloads[$i-1]->title}}</a></td>
                                        <td>{{$downloads[$i-1]->description}}</td>
                                        <td><a href="{{action('FrontendController@download',$downloads[$i-1]->id)}}">download</a></td>
                                    </tr>
                                @endfor
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--End of Posts-->

    </div>
    <!-- /.container-fluid -->
@endsection

@section('scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.4/b-print-1.5.4/kt-2.5.0/r-2.2.2/sc-1.5.0/datatables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#all_downloads').DataTable();
        });
    </script>
@endsection