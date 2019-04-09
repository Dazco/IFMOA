@extends('layouts.member')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">E-Library</h1>

        <!--Posts-->
        <div class="row">
            <div class="col-md-12">
                <div class="card striped-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">All E-Library resources</h4>
                        <p class="card-category">These are all the resources on the sites's E-Library</p>
                    </div>
                    @include('includes.session_flash')
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped" id="all_eLibrary">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th><i class="fas fa-book"></i> Title</th>
                                <th><i class="fas fa-user"></i> Author</th>
                                <th><i class="fas fa-book-open"></i> description</th>
                                <th><i class="fas fa-calendar-alt"></i> Created</th>
                                <th><i class="fas fa-calendar-alt"></i> Updated</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($eLibrary)
                                @for($i= 1;$i<=count($eLibrary);$i++)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td><a href="{{action('Member\MemberController@eLibraryDownload',$eLibrary[$i-1]->id)}}">{{$eLibrary[$i-1]->title}}</a></td>
                                        <td>{{$eLibrary[$i-1]->user->name}}</td>
                                        <td>{{$eLibrary[$i-1]->description}}</td>
                                        <td>{{$eLibrary[$i-1]->created_at->diffForHumans()}}</td>
                                        <td>{{$eLibrary[$i-1]->updated_at->diffForhumans()}}</td>
                                        <td><a href="{{action('Member\MemberController@eLibraryDownload',$eLibrary[$i-1]->id)}}">DOWNLOAD</a></td>
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
            $('#all_eLibrary').DataTable();
        });
    </script>
@endsection