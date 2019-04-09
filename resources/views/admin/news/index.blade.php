@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">News</h1>

        <!--News-->
        <div class="row">
            <div class="col-md-12">
                <div class="card striped-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">All News</h4>
                        <p class="card-category">These are all the news on the site</p>
                    </div>
                    @include('includes.session_flash')
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped" id="all_news">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th><i class="fas fa-book"></i> Title</th>
                                <th><i class="fas fa-tags"></i> Category</th>
                                <th><i class="fas fa-user"></i> Author</th>
                                <th><i class="fas fa-calendar-alt"></i> Created</th>
                                <th><i class="fas fa-calendar-alt"></i> Updated</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($news)
                                @for($i= 1;$i<=count($news);$i++)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td><a href="{{route('news.show',$news[$i-1]->slug)}}">{{$news[$i-1]->title}}</a></td>
                                        <td>{{$news[$i-1]->category->name}}</td>
                                        <td>{{$news[$i-1]->user->name}}</td>
                                        <td>{{$news[$i-1]->created_at->diffForHumans()}}</td>
                                        <td>{{$news[$i-1]->updated_at->diffForhumans()}}</td>
                                        <td><a href="{{route('admin.news.edit',$news[$i-1]->id)}}" class="btn btn-primary">Edit</a></td>
                                        <td>
                                            {!! Form::open(['method'=>'DELETE','action'=>['Admin\AdminNewsController@destroy',$news[$i-1]->id],'onsubmit'=>"return confirm('Do you really want to delete this news?')"]) !!}
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
        <!--End of News-->

    </div>
    <!-- /.container-fluid -->
@endsection

@section('scripts')
    <script>
        $(document).ready( function () {
            $('#all_news').DataTable();
        });
    </script>
@endsection