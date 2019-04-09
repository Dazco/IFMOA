@extends('layouts.admin')

@section('content')
    @include('includes.tinymce')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Create E-Library Resource</h1>

        <!--Create Post-->
    {!! Form::open(['method'=>'POST','action'=>'Admin\AdminELibraryController@store','files'=>true]) !!}
        @include('includes.form_error')
        <div class="form-group">
            {!! Form::label('title','Title:') !!}
            {!! Form::text('title',null,['class'=>'form-control']) !!}
        </div>
        <div class="custom-file mb-3">
            {!! Form::label('resource','Resource:',['class'=>'custom-file-label']) !!}
            {!! Form::file('resource',['class'=>'custom-file-input']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('description','Description:') !!}
            {!! Form::textarea('description',null,['class'=>'form-control']) !!}
        </div>
    {!! Form::submit('Create Resource',['class'=>'btn btn-primary float-right']) !!}
    {!! Form::close() !!}
        <!--End of Create Posts-->

    </div>
    <!-- /.container-fluid -->
@endsection