@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Downloads </h1>

        <!--Posts-->
        <div class="row">
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
                                <th><i class="fas fa-user"></i> Author</th>
                                <th><i class="fas fa-book-open"></i> description</th>
                                <th><i class="fas fa-calendar-alt"></i> Created</th>
                                <th><i class="fas fa-calendar-alt"></i> Updated</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($downloads)
                                @for($i= 1;$i<=count($downloads);$i++)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td><a href="{{action('FrontendController@download',$downloads[$i-1]->id)}}">{{$downloads[$i-1]->title}}</a></td>
                                        <td>{{$downloads[$i-1]->user->name}}</td>
                                        <td>{{$downloads[$i-1]->description}}</td>
                                        <td>{{$downloads[$i-1]->created_at->diffForHumans()}}</td>
                                        <td>{{$downloads[$i-1]->updated_at->diffForhumans()}}</td>
                                        <td><a href="{{route('admin.downloads.edit',$downloads[$i-1]->id)}}" class="btn btn-primary">Edit</a></td>
                                        <td>
                                            {!! Form::open(['method'=>'DELETE','action'=>['Admin\AdminDownloadsController@destroy',$downloads[$i-1]->id],'onsubmit'=>"return confirm('Do you really want to delete this document?')"]) !!}
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
            $('#all_downloads').DataTable();
        });
    </script>
@endsection