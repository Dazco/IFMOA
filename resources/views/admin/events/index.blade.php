@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Events</h1>

        <!--Events-->
        <div class="row">
            <div class="col-md-12">
                <div class="card striped-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">All Events</h4>
                        <p class="card-category">These are all the created events</p>
                    </div>
                    @include('includes.session_flash')
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped" id="all_events">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th><i class="fas fa-book"></i> Event Title</th>
                                <th><i class="fas fa-calendar-alt"></i> Event Start date and time</th>
                                <th><i class="fas fa-calendar-alt"></i> Event End date and time</th>
                                <th><i class="fas fa-user"></i> Event Creator</th>
                                <th><i class="fas fa-calendar-alt"></i> Event Location</th>
                                <th><i class="fas fa-tags"></i>Event Category</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($events)
                                @for($i= 1;$i<=count($events);$i++)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td><a href="{{route('event.show',$events[$i-1]->slug)}}">{{$events[$i-1]->title}}</a></td>
                                        <td>{{$events[$i-1]->start_date}} ({{$events[$i-1]->start_time}})</td>
                                        <td>{{$events[$i-1]->end_date}} ({{$events[$i-1]->end_time}})</td>
                                        <td>{{$events[$i-1]->user->name}}</td>
                                        <td>{{$events[$i-1]->location}}</td>
                                        <td>{{$events[$i-1]->category->name}}</td>
                                        <td><a href="{{route('admin.events.edit',$events[$i-1]->id)}}" class="btn btn-primary">Edit</a></td>
                                        <td>
                                            {!! Form::open(['method'=>'DELETE','action'=>['Admin\AdminEventsController@destroy',$events[$i-1]->id],'onsubmit'=>"return confirm('Do you really want to delete this event?')"]) !!}
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
        <!--End of Events-->

    </div>
    <!-- /.container-fluid -->
@endsection

@section('scripts')
    <script>
        $(document).ready( function () {
            $('#all_events').DataTable();
        });
    </script>
@endsection