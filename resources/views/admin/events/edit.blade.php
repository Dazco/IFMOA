@extends('layouts.admin')

@section('content')
    @include('includes.tinymce')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Edit Event</h1>

        <!--Create Post-->
        {!! Form::model($event,['method'=>'PATCH','action'=>['Admin\AdminEventsController@update',$event->id],'files'=>true]) !!}
        @include('includes.form_error')
        <div class="form-group">
            {!! Form::label('title','Title:') !!}
            {!! Form::text('title',null,['class'=>'form-control']) !!}
        </div>
        <figure class="mt-5">
            <img height="250" width="500" src="{{$event->image}}" alt="Image" class="img-responsive" id="renderImage">
        </figure>
        <a class="btn btn-danger aligncenter text-white mb-3 col-sm-3 text-center btn-link" onclick="revertURL('#renderImage','https://via.placeholder.com/500x250')">Remove</a>
        <div class="custom-file mb-3">
            {!! Form::label('photo','Display Image:',['class'=>'custom-file-label']) !!}
            {!! Form::file('photo',['class'=>'custom-file-input','onchange'=>"readURL(this,'#renderImage')"]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('date','Event Date and Time:') !!}
            <input type="text" name="datetime" class="form-control" id="datetime" value="{{$event->datetime}}">
        </div>
        <div class="form-group">
            {!! Form::label('location','Event Location:') !!}
            {!! Form::text('location',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('description','Description:') !!}
            {!! Form::textarea('description',null,['class'=>'form-control','rows'=>'2']) !!}
        </div>
        <div id="select-category" class="form-group">
            {!! Form::label('category_id','Category:') !!}
            <div class="row container">
                {!! Form::select('category_id',$categories,null,['class'=>'custom-select col-sm-9','placeholder'=>'Select Category']) !!}
                <a class="btn btn-primary text-white col-sm-2 ml-sm-3 mt-3 mt-sm-0" onclick="create()">Create New</a>
            </div>
        </div>
        <div id="create-category">
            {!! Form::label('new_category','Category:') !!}
            <div class="row container">
                {!! Form::text('new_category',null,['class'=>'form-control col-sm-9','placeholder'=>'New Category','disabled'=>'disabled']) !!}
                <a class="cancel btn btn-danger text-white col-sm-2 ml-sm-3 mt-3 mt-sm-0" onclick="cancel()">Cancel</a>
            </div>
        </div>
        <div class="form-group">
            <label for="content">Content:</label>
            {!! Form::textarea('content',null,['class'=>'content']) !!}
        </div>
    {!! Form::submit('Edit Event',['class'=>'btn btn-primary float-right']) !!}
    {!! Form::close() !!}
    <!--End of Edit Event-->

    </div>
    <!-- /.container-fluid -->
@endsection

@section('scripts')
    <script>
        $('#create-category').hide();
        function create() {
            $('#create-category input').removeAttr('disabled');
            $('#create-category').show('slow');
            $('#select-category').hide('slow');
            $('#select-category select').attr('disabled','disabled');

        }
        function cancel() {
            $('#select-category select').removeAttr('disabled');
            $('#select-category').show('slow');
            $('#create-category').hide('slow');
            $('#create-category input').attr('disabled','disabled');

        }
    </script>
@endsection