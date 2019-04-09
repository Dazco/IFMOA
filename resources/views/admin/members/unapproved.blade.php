@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Members</h1>
        <div class="row">
            <div class="col-md-12">
                <div class="card striped-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">UN-APPROVED MEMBERS</h4>
                        <p class="card-category">The following people are awaiting membership approval</p>
                    </div>
                    @include('includes.session_flash')
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped" id="all_members">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th><i class="fas fa-user"></i> Name</th>
                                <th><i class="fas fa-money-check"></i> Paid</th>
                                <th><i class="fas fa-calendar-alt"></i> Created at</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($members)
                                @for($i= 1;$i<=count($members);$i++)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td><a href="{{route('admin.members.show',$members[$i-1]->id)}}">{{$members[$i-1]->name}}</a></td>
                                        <td>&#8358; {{$members[$i-1]->paid}}</td>
                                        <td>{{$members[$i-1]->created_at->diffForHumans()}}</td>
                                        <td><a href="{{route('admin.members.manage',$members[$i-1]->id)}}" class="btn btn-primary">Manage</a></td>
                                    </tr>
                                @endfor
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--End of Members-->

    </div>
    <!-- /.container-fluid -->
@endsection

@section('scripts')
    <script>
        $(document).ready( function () {
            $('#all_members').DataTable();
        });
    </script>
@endsection