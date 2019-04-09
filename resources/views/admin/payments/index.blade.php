@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Payments</h1>

        <!--Posts-->
        <div class="row">
            <div class="col-md-12">
                <div class="card striped-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">All Payments</h4>
                        <p class="card-category">These are all the Payments generated</p>
                    </div>
                    @include('includes.session_flash')
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped" id="all_payments">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th><i class="fas fa-book"></i> Name</th>
                                <th><i class="fas fa-user"></i> Creator</th>
                                <th><i class="fas fa-money-check"></i> Amount</th>
                                <th><i class="fas fa-user-graduate"></i> Grade</th>
                                <th><i class="fas fa-money-check"></i> Paid</th>
                                <th><i class="fas fa-money-check"></i> Owing</th>
                                <th><i class="fas fa-book-open"></i> Description</th>
                                <th><i class="fas fa-calendar-alt"></i> Created</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($payments)
                                @for($i= 1;$i<=count($payments);$i++)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$payments[$i-1]->name}}</td>
                                        <td>{{$payments[$i-1]->creator->name}}</td>
                                        <td>&#8358; {{$payments[$i-1]->amount}}</td>
                                        <td>{{$payments[$i-1]->grade->name}}</td>
                                        <td><a href="#">{{$payments[$i-1]->payments()->count()}} members paid </a></td>
                                        <td><a href="#">{{$payments[$i-1]->grade->users->count() - $payments[$i-1]->payments()->count()}} members owing </a></td>
                                        <td>{{$payments[$i-1]->description}}</td>
                                        <td>{{$payments[$i-1]->created_at->diffForHumans()}}</td>
                                        <td>
                                            {!! Form::open(['method'=>'DELETE','action'=>['Admin\AdminPaymentsController@destroy',$payments[$i-1]->id],'onsubmit'=>"return confirm('Do you really want to delete this payment for all members?')"]) !!}
                                            {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        </td>
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
    <script>
        $(document).ready( function () {
            $('#all_payments').DataTable();
        });
    </script>
@endsection