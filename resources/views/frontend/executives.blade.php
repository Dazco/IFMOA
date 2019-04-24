@extends('layouts.frontend')

@section('title')
    EXECUTIVE MEMBERS - INSTITUTE OF FACILITY MANAGEMENT AND OFFICE ADMINISTRATION
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
                                <h1 class="">About Us</h1>
                                <span>HOME &nbsp; <i class="fa fa-caret-right"></i> &nbsp; EXECUTIVE MEMBERS</span>
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
                    <h2 class="font-weight-light">IFMOA EXECUTIVE MEMBERS</h2>
                </div>
                <div class="card striped-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">All EXECUTIVES</h4>
                        <p class="card-category">These are the executive members in IFMOA</p>
                    </div>
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped" id="all_executives">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>NAME</th>
                                    <th>POSITION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>DR. OLUSEGUN KUYE</td>
                                    <td>PRESIDENT</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>BLDR, DR. OLUFEMI E. AKINSOLA</td>
                                    <td>VICE-PRESIDENT</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>MR. RALPH O. UZUKA</td>
                                    <td>2ND VICE-PRESIDENT</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>MR BOYE ABIAMOWEI</td>
                                    <td>REGISTRAR</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>MR PHILIP O. OYEDE</td>
                                    <td>HONORARY GENERAL SECRETARY</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>MR. JACOB S. AJAYI</td>
                                    <td>ASSITANT HONORARY GENERAL SECRETARY</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>BARR. GEORGE EKWATA</td>
                                    <td>1ST LEGAL ADVISER</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>BARR. STANLEY IGBUDU</td>
                                    <td>2ND LEGAL ADVISER</td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>MISS OLAYEMI S. AGBOOLA</td>
                                    <td>RESEARCH & DEVELOPMENT SECRETARY</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td> BLDR DAMILOLA OJEWOLE</td>
                                    <td>PUBLICITY SECRETARY</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
@endsection

@section('scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.4/b-print-1.5.4/kt-2.5.0/r-2.2.2/sc-1.5.0/datatables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#all_executives').DataTable();
        });
    </script>
@endsection