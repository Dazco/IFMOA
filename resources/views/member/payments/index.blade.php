@extends('layouts.member')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Payment</h1>
        @include('includes.session_flash')
        <!--Tabbable Panel-->
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#outstanding_bills" role="tab" aria-controls="nav-home" aria-selected="true">Outstanding bills</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#paid_bills" role="tab" aria-controls="nav-profile" aria-selected="false">Paid bills</a>
            </div>
        </nav>
        <!--Tabbable content-->
        <div class="tab-content" id="nav-tabContent">
            <!--Outstanding Bills-->
            <div class="tab-pane fade show active" id="outstanding_bills" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card striped-tabled-with-hover">
                            <div class="card-header ">
                                <h4 class="card-title">Outstanding Bills</h4>
                                <p class="card-category">The following are your outstanding bills</p>
                            </div>
                            <div class="card-body table-full-width table-responsive">
                                <table class="table table-hover table-striped" id="all_outstanding">
                                    <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th><i class="fas fa-money-check"></i> Payment Type</th>
                                        <th><i class="fas fa-user-graduate"></i> Grade billed</th>
                                        <th><i class="fas fa-money-bill"></i> Amount</th>
                                        <th><i class="fas fa-money-bill"></i> Description</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $bills = $member->outstandingBills();  ?>
                                    @if($bills)
                                        @for($i=0;$i<count($bills);$i++)
                                            <tr>
                                                <td>{{$i+1}}</td>
                                                <td>{{$bills[$i]->name}}</td>
                                                <td>{{$bills[$i]->grade->name}}</td>
                                                <td>&#8358; {{$bills[$i]->amount}}</td>
                                                <td>{{$bills[$i]->description}}</td>
                                                <td><a href="{{route('member.payments.show',$bills[$i]->id)}}">Pay Now</a></td>
                                            </tr>
                                        @endfor
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End of Outstanding Bills-->

            <!--Paid Bills-->
            <div class="tab-pane fade" id="paid_bills" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card striped-tabled-with-hover">
                            <div class="card-header ">
                                <h4 class="card-title">Paid Bills</h4>
                                <p class="card-category">You have paid the following bills</p>
                            </div>
                            <div class="card-body table-full-width table-responsive">
                                <table class="table table-hover table-striped" id="all_paid">
                                    <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th><i class="fas fa-money-check"></i> Payment Type</th>
                                        <th><i class="fas fa-user-graduate"></i> Grade billed</th>
                                        <th><i class="fas fa-money-bill"></i> Amount</th>
                                        <th><i class="fas fa-money-bill"></i> Description</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $payments = $member->payments;  ?>
                                    @if($payments)
                                        @for($i=0;$i<count($payments);$i++)
                                            <tr>
                                                <td>{{$i+1}}</td>
                                                <td>{{$payments[$i]->paymentType->name}}</td>
                                                <td>{{$payments[$i]->paymentType->grade->name}}</td>
                                                <td>&#8358; {{$payments[$i]->paymentType->amount}}</td>
                                                <td>{{$payments[$i]->paymentType->description}}</td>
                                            </tr>
                                        @endfor
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End of Paid Bills-->
        </div>
        <!--End of Tabbable content-->

        <!-- Summary section -->
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#summary" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="summary">
                <h6 class="m-0 font-weight-bold text-primary">Summary</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show mt-4" id="summary">
                <div class="card-body ">
                    <div class="row">
                        <p class="col-6">TOTAL PAYABLE</p>
                        <p class="col-6">&#8358 {{$member->total}}</p>
                    </div>
                    <div class="row">
                        <p class="col-6">TOTAL PAID</p>
                        <p class="col-6">&#8358 {{$member->paid}}</p>
                    </div>
                    <div class="row">
                        <p class="col-6">TOTAL OUTSTANDING</p>
                        <p class="col-6">&#8358 {{$member->owing}}</p>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->
@endsection

@section('scripts')
    <script>
        $(document).ready( function () {
            $('#all_outstanding').DataTable();
            $('#all_paid').DataTable();
        });
    </script>
@endsection