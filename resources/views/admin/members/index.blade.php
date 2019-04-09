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
                                <h4 class="card-title">ACTIVE MEMBERS</h4>
                                <p class="card-category">The following are all the active members registered on the site</p>
                            </div>
                            @include('includes.session_flash')
                            <div class="card-body table-full-width table-responsive">
                                <table class="table table-hover table-striped" id="all_members">
                                    <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th><i class="fas fa-user"></i> Name</th>
                                        <th><i class="fas fa-registered"></i> Registration No.</th>
                                        <th><i class="fas fa-user-graduate"></i> Grade</th>
                                        <th><i class="fas fa-money-check"></i> Paid</th>
                                        <th><i class="fas fa-money-check"></i> Owing</th>
                                        <th><i class="fas fa-calendar-alt"></i> Created at</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($members)
                                        @for($i= 1;$i<=count($members);$i++)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td><a href="{{route('admin.members.show',$members[$i-1]->id)}}">{{$members[$i-1]->name}} (<span class="text-danger">{{$members[$i-1]->is_admin? 'admin':''}}</span>)</a></td>
                                                <td>{{$members[$i-1]->registration_number}}</td>
                                                <td>{{$members[$i-1]->grade->name}}</td>
                                                <td>&#8358; {{$members[$i-1]->paid}}</td>
                                                <td>&#8358; {{$members[$i-1]->owing}}</td>
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
        <!-- Summary section -->
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#summary" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="summary">
                <h6 class="m-0 font-weight-bold text-primary">Summary</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show mt-4" id="summary">
                <div class="card-body ">
                    @if($grades)
                        @foreach($grades as $grade)
                            <div class="row">
                                <p class="col-6">TOTAL ACTIVE {{$grade->name}}</p>
                                <p class="col-6">{{$grade->users()->where('is_active','1')->count()}}</p>
                            </div>
                        @endforeach
                    @endif
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