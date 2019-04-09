@extends('layouts.admin')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-12">
                <div class="reg-form">
                    <div class="card">
                        <h3 class="card-header">Manage Member - <span class="text-danger">{{$member->name}}</span></h3>
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <hr>
                            <div class="col-md-4 float-md-right pt-3 ">
                                <div class="mb-3">
                                    <img id="author-img" class="rounded border border-gray img-fluid"
                                         src="{{$member->image}}" alt="Profile Image" height="242" width="242">
                                </div>
                            </div>
                            <div class="form-group row pt-3">
                                @include('includes.session_flash')
                                @include('includes.form_error')
                            </div>
                            @if($member->is_approved)
                                <div class="form-group row pt-3">
                                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-6 contact-form">
                                        <input type="text" class="form-control text-success font-weight-bold" id="status"
                                               value="APPROVED" disabled>
                                    </div>
                                </div>
                                <div class="form-group row pt-3">
                                    <label for="active_status" class="col-sm-2 col-form-label">Active Status</label>
                                    @if($member->is_active)
                                        <div class="col-sm-6 contact-form">
                                            <input type="text" class="form-control text-success font-weight-bold" id="active_status"
                                                   value="ACTIVE" disabled>
                                        </div>
                                        {!! Form::open(['method'=>'PATCH','action'=>['Admin\AdminMembersController@update',$member->id],'onsubmit'=>"return confirm('Do you really want to disable $member->name')"]) !!}
                                        <input type="hidden" name="is_active" value="0">
                                        <button class="btn btn-danger mt-3 mt-sm-0">Disable Member</button>
                                        {!! Form::close() !!}
                                    @else
                                        <div class="col-sm-6 contact-form">
                                            <input type="text" class="form-control text-danger font-weight-bold" id="active_status"
                                                   value="IN-ACTIVE" disabled>
                                        </div>
                                        {!! Form::open(['method'=>'PATCH','action'=>['Admin\AdminMembersController@update',$member->id],'onsubmit'=>"return confirm('Do you really want to activate $member->name')"]) !!}
                                        <input type="hidden" name="is_active" value="1">
                                        <button class="btn btn-success mt-3 mt-sm-0">Activate Member</button>
                                        {!! Form::close() !!}
                                    @endif
                                </div>
                                <div class="form-group row pt-3">
                                    <label for="role" class="col-sm-2 col-form-label">Role</label>
                                    @if($member->is_admin)
                                        <div class="col-sm-6 contact-form">
                                            <input type="text" class="form-control text-danger font-weight-bold" id="role"
                                                   value="ADMIN" disabled>
                                        </div>
                                        {!! Form::open(['method'=>'PATCH','action'=>['Admin\AdminMembersController@update',$member->id],'onsubmit'=>"return confirm('Do you really want to remove administrator rights of $member->name')"]) !!}
                                        <input type="hidden" name="is_admin" value="0">
                                        <button class="btn btn-primary mt-3 mt-sm-0">Remove Admin</button>
                                        {!! Form::close() !!}
                                    @else
                                        <div class="col-sm-6 contact-form">
                                            <input type="text" class="form-control text-success font-weight-bold" id="role"
                                                   value="MEMBER" disabled>
                                        </div>
                                        {!! Form::open(['method'=>'PATCH','action'=>['Admin\AdminMembersController@update',$member->id],'onsubmit'=>"return confirm('Do you really want to make $member->name an administrator')"]) !!}
                                        <input type="hidden" name="is_admin" value="1">
                                        <button class="btn btn-danger mt-3 mt-sm-0">Make Admin</button>
                                        {!! Form::close() !!}
                                    @endif
                                </div>
                            @else
                                <div class="form-group row pt-3">
                                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-6 contact-form">
                                        <input type="text" class="form-control text-danger font-weight-bold" id="status"
                                               value="UN-APPROVED" disabled>
                                    </div>
                                </div>
                                {!! Form::open(['method'=>'PATCH','action'=>['Admin\AdminMembersController@approve',$member->id],'onsubmit'=>"return confirm('Do you really want to approve $member->name')"]) !!}
                                    <div class="form-group row pt-3">
                                        <label for="registration_number" class="col-sm-2 col-form-label">Registration Number</label>
                                        <div class="col-sm-6 contact-form">
                                            <input type="text" class="form-control" id="registration_number" name="registration_number">
                                        </div>
                                    </div>
                                    <div id="select-grade" class="form-group row pt-3">
                                        {!! Form::label('grade_id','Grade:',['class'=>'col-sm-2 col-form-label']) !!}
                                        <div class="col-sm-6 contact-form">
                                            {!! Form::select('grade_id',$grades,null,['class'=>'custom-select','placeholder'=>'Select Grade']) !!}
                                        </div>
                                        <button class="btn btn-success mt-3 mt-sm-0">Approve Member</button>
                                    </div>
                                {!! Form::close() !!}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
        </div>
    </div>

@endsection