@extends('layouts.admin')

@section('content')
    @include('includes.tinymce')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Generate Payment</h1>

        <!--Create Post-->
        {!! Form::open(['method'=>'POST','action'=>'Admin\AdminPaymentsController@store']) !!}
        @include('includes.form_error')
        <div class="form-group">
            {!! Form::label('name','Name:') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('amount','Amount:') !!}
            {!! Form::text('amount',null,['class'=>'form-control']) !!}
        </div>
        <div id="select-grade" class="form-group">
            {!! Form::label('grade_id','Grade:') !!}
            <div class="row container">
                {!! Form::select('grade_id',[0=>'ALL GRADES'] + $grades,null,['class'=>'custom-select col-sm-9','placeholder'=>'Select Grade']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('description','Description:') !!}
            {!! Form::textarea('description',null,['class'=>'form-control','rows'=>'2']) !!}
        </div>
    {!! Form::submit('Generate Payment',['class'=>'btn btn-primary float-right']) !!}
    {!! Form::close() !!}
    <!--End of Create Posts-->

    </div>
    <!-- /.container-fluid -->
@endsection