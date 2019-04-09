@extends('layouts.admin')

@section('content')
    @include('includes.tinymce')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Create News</h1>

        <!--Create News-->
    {!! Form::open(['method'=>'POST','action'=>'Admin\AdminNewsController@store','files'=>true]) !!}
        @include('includes.form_error')
        <div class="form-group">
            {!! Form::label('title','Title:') !!}
            {!! Form::text('title',null,['class'=>'form-control']) !!}
        </div>
        <figure class="mt-5">
            <img height="250" width="500" src="https://via.placeholder.com/500x250" alt="Image" class="img-responsive" id="renderImage">
        </figure>
        <a class="btn btn-danger aligncenter text-white mb-3 col-sm-3 text-center btn-link" onclick="revertURL('#renderImage','https://via.placeholder.com/500x250')">Remove</a>
        <div class="custom-file mb-3">
            {!! Form::label('photo','Display Image:',['class'=>'custom-file-label']) !!}
            {!! Form::file('photo',['class'=>'custom-file-input','onchange'=>"readURL(this,'#renderImage')"]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('description','Description:') !!}
            {!! Form::textarea('description',null,['class'=>'form-control']) !!}
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
    {!! Form::submit('Create News',['class'=>'btn btn-primary float-right']) !!}
    {!! Form::close() !!}
        <!--End of Create News-->

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