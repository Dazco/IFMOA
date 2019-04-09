@extends('layouts.member')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Change Password</h1>

        <div class="row">
            <div class="col-md-7">
                @include('includes.form_error')
                @include('includes.session_flash')
                {!! Form::open(['method'=>'PATCH','action'=>['Member\MemberController@update',$member->id]]) !!}
                    <div class="form-group">
                        <label for="current_password">Current Password:</label>
                        <input type="password" class="form-control" name="current_password" id="current_password">
                    </div>
                    <div class="form-group">
                        <label for="password">New Password:</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password:</label>
                        <input type="password" class="form-control" name="password_confirmation" id="confirm_password">
                    </div>
                    <input type="submit" value="Update" class="btn btn-danger pull-right">
                {!! Form::close() !!}
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->
@endsection