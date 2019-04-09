@extends('layouts.frontend')

@section('title')
    Registration - INSTITUTE OF FACILITIES MANAGEMENT AND OFFICE ADMINISTRATION
@endsection

@section('content')
    <!-- Start Bottom Header -->
    <div class="header-bg page-area">
        <div class="home-overly"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="banner-content text-center">
                        <div class="header-bottom">
                            <div class="layer2 wow zoomIn" data-wow-duration="1s" data-wow-delay=".4s">
                                <h1 class="">Membership Registeration</h1>
                                <span>HOME &nbsp; <i
                                            class="fa fa-caret-right"></i> &nbsp; Membership Registeration</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-12">
                <div class="reg-form">
                    <div class="card">
                        <h3 class="card-header">Membership Registeration Form</h3>
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <hr>
                            {!! Form::open(['method'=>'POST','action'=>'Auth\RegisterController@register','files'=>true])!!}
                            @include('includes.session_flash')
                                <nav>
                                    <div class="nav nav-tabs font-weight-bolder" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-general-information-tab"
                                           data-toggle="tab" href="#nav-general-information" role="tab"
                                           aria-controls="nav-home" aria-selected="true">General Information</a>
                                        <a class="nav-item nav-link" id="nav-qualifications-tab" data-toggle="tab"
                                           href="#nav-qualifications" role="tab" aria-controls="nav-profile"
                                           aria-selected="false">Qualifications</a>
                                        <a class="nav-item nav-link" id="nav-employment-tab" data-toggle="tab"
                                           href="#nav-employment" role="tab" aria-controls="nav-contact"
                                           aria-selected="false">Employment History</a>
                                        <a class="nav-item nav-link" id="nav-referee-tab" data-toggle="tab"
                                           href="#nav-referee" role="tab" aria-controls="nav-contact"
                                           aria-selected="false">Referee</a>
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    @include('includes.form_error')
                                    <div class="tab-pane fade show active" id="nav-general-information" role="tabpanel"
                                         aria-labelledby="nav-home-tab">
                                        <p class="lead mt-3 text-info font-weight-bold">Please Fill in the following with the relevant details</p>
                                        <div class="col-md-4 float-md-right pt-3 ">
                                            <div class="mb-3">
                                                <img id="author-img" class="rounded border border-gray img"
                                                     src="{{url('images/frontend/default-profile.jpg')}}" alt="Profile Image" height="242" width="242">
                                            </div>
                                            <div class="custom-file mb-2">
                                                <label for="photo" class="custom-file-label">Change Photo</label>
                                                <input type="file" id="photo" class="custom-file-input"
                                                       onchange="readURL(this,'#author-img')" name="photo" value="{{old('photo')}}">
                                            </div>
                                            <a class="btn btn-danger aligncenter text-white"
                                               onclick="revertURL('#author-img','images/frontend/default-profile.jpg')">
                                                Remove
                                            </a>
                                        </div>

                                        <div class="form-group row pt-3">
                                            <label for="surname" class="col-sm-2 col-form-label">Surname</label>
                                            <div class="col-sm-10 contact-form">
                                                <input type="text" class="form-control" id="surname" name="surname" value="{{old('surname')}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="firstname" class="col-sm-2 col-form-label">First Name</label>
                                            <div class="col-sm-10 contact-form">
                                                <input type="text" class="form-control" id="firstname" name="firstname" value="{{old('firstname')}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="othernames" class="col-sm-2 col-form-label">Other Names</label>
                                            <div class="col-sm-10 contact-form">
                                                <input type="text" class="form-control" id="othernames"
                                                       name="othernames" value="{{old('othernames')}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="address" class="col-sm-2 col-form-label">Contact address</label>
                                            <div class="col-sm-10 contact-form">
                                            <textarea rows="2" class="form-control" id="address"
                                                      name="address">{{old('address')}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="phone" class="col-sm-2 col-form-label">Phone no</label>
                                            <div class="col-sm-10 contact-form">
                                                <input type="text" class="form-control" placeholder="" id="phone"
                                                       name="phone" value="{{old('phone')}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="register-email" class="col-sm-2 col-form-label">Email
                                                address</label>
                                            <div class="col-sm-10 contact-form">
                                                <input type="email" class="form-control" id="register-email"
                                                       name="email" value="{{old('email')}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="date-of-birth" class="col-sm-2 col-form-label">Date of
                                                birth</label>
                                            <div class="col-sm-10 contact-form">
                                                <input type="date" class="form-control" id="date-of-birth"
                                                       name="date_of_birth" value="{{old('date_of_birth')}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nationality" class="col-sm-2 col-form-label">Nationality</label>
                                            <div class="col-sm-10 contact-form">
                                                <input type="text" class="form-control" id="nationality"
                                                       name="nationality" value="{{old('nationality')}}" list="countries">
                                                <datalist id="countries"></datalist>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="state-of-origin" class="col-sm-2 col-form-label">State Of Origin
                                                (if
                                                Nigeria)</label>
                                            <div class="col-sm-10 contact-form">
                                                <select class="custom-select my-1 mr-sm-2 states" id="state-of-origin"
                                                        name="state_of_origin" value="{{old('state_of_origin')}}">
                                                    <option selected>choose..</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="company-name" class="col-sm-2 col-form-label">Company
                                                Name</label>
                                            <div class="col-sm-10 contact-form">
                                                <input type="text" class="form-control" id="company-name"
                                                       name="company_name" value="{{old('company_name')}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="company-address" class="col-sm-2 col-form-label">Company
                                                Address..</label>
                                            <div class="col-sm-10 contact-form">
                                            <textarea rows="2" class="form-control" id="company-address"
                                                      name="company_address">{{old('company_address')}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="job-title" class="col-sm-2 col-form-label">Job Title</label>
                                            <div class="col-sm-10 contact-form">
                                                <input type="text" class="form-control" id="job-title"
                                                       name="job_title" value="{{old('job_title')}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nature-of-work" class="col-sm-2 col-form-label">Nature Of Work</label>
                                            <div class="col-sm-10 contact-form">
                                            <textarea rows="2" class="form-control" id="nature-of-work"
                                                      name="nature_of_work">{{old('nature_of_work')}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group pb-5">
                                            <a class="btn btn-success col-sm-3 float-right" data-toggle="tab"
                                               href="#nav-qualifications"
                                               onclick="tabNext('#nav-qualifications-tab')">Next</a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-qualifications" role="tabpanel"
                                         aria-labelledby="nav-profile-tab">
                                        <p class="lead mt-3 text-info font-weight-bold">Academic Qualifications - (Degree, A/level, O-level, Bsc, Others)</p>
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="nav-academic-table">
                                                <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Name Of Institute</th>
                                                    <th>Certificate / degree</th>
                                                    <th>Year attained</th>
                                                    <th><a class="btn btn-primary add-academic text-white">add</a>
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if(old('academic'))
                                                    @for($i=0;$i<count(old('academic'));$i++)
                                                    <tr>
                                                        <td>{{$i+1}}</td>
                                                        <td><input type="text" class="form-control" name="academic[{{$i}}][institute]" value="{{old('academic')[$i]['institute']}}"></td>
                                                        <td><input type="text" class="form-control" name="academic[{{$i}}][certificate]" value="{{old('academic')[$i]['certificate']}}"></td>
                                                        <td><input type="date" class="form-control" name="academic[{{$i}}][year]" value="{{old('academic')[$i]['year']}}"></td>
                                                        <td></td>
                                                    </tr>
                                                    @endfor
                                                @else
                                                    <tr>
                                                        <td>1</td>
                                                        <td><input type="text" class="form-control" name="academic[0][institute]"></td>
                                                        <td><input type="text" class="form-control" name="academic[0][certificate]"></td>
                                                        <td><input type="date" class="form-control" name="academic[0][year]"></td>
                                                        <td></td>
                                                    </tr>
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                        <p class="lead mt-3 text-info font-weight-bold">Professional Qualifications</p>
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="nav-professional-table">
                                                <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Name Of Institute/Examining Body</th>
                                                    <th>Qualification Obtained</th>
                                                    <th>Year attained</th>
                                                    <th><a class="btn btn-primary add-professional text-white">add</a>
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if(old('professional'))
                                                    @for($i=0;$i<count(old('professional'));$i++)
                                                        <tr>
                                                            <td>{{$i+1}}</td>
                                                            <td><input type="text" class="form-control" name="professional[{{$i}}][institute]" value="{{old('professional')[$i]['institute']}}"></td>
                                                            <td><input type="text" class="form-control" name="professional[{{$i}}][certificate]" value="{{old('professional')[$i]['certificate']}}"></td>
                                                            <td><input type="date" class="form-control" name="professional[{{$i}}][year]" value="{{old('professional')[$i]['year']}}"></td>
                                                            <td></td>
                                                        </tr>
                                                    @endfor
                                                @else
                                                    <tr>
                                                        <td>1</td>
                                                        <td><input type="text" class="form-control" name="professional[0][institute]"></td>
                                                        <td><input type="text" class="form-control" name="professional[0][certificate]"></td>
                                                        <td><input type="date" class="form-control" name="professional[0][year]"></td>
                                                        <td></td>
                                                    </tr>
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="form-group pb-5">
                                            <a class="btn btn-success col-sm-3 float-right" data-toggle="tab"
                                               href="#nav-employment"
                                               onclick="tabNext('#nav-employment-tab')">Next</a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-employment" role="tabpanel"
                                         aria-labelledby="nav-contact-tab">
                                        <p class="lead mt-3 text-info font-weight-bold">List the last <b>THREE (3)</b> positions you have held in your employment history, beginning with the most current</p>
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="nav-employment-table">
                                                <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Organization</th>
                                                    <th>Position</th>
                                                    <th>From</th>
                                                    <th>To</th>
                                                    <th>Main Responsibilities</th>
                                                    <th><a class="btn btn-primary add-employment text-white">add</a>
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if(old('employment'))
                                                    @for($i=0;$i<count(old('employment'));$i++)
                                                        <tr>
                                                            <td>{{$i+1}}</td>
                                                            <td><input type="text" class="form-control" name="employment[{{$i}}][organization]" value="{{old('employment')[$i]['organization']}}">
                                                            </td>
                                                            <td><input type="text" class="form-control" name="employment[{{$i}}][position]" value="{{old('employment')[$i]['position']}}"></td>
                                                            <td><input type="date" class="form-control" name="employment[{{$i}}][date_from]" value="{{old('employment')[$i]['date_from']}}"></td>
                                                            <td><input type="date" class="form-control" name="employment[{{$i}}][date_to]" value="{{old('employment')[$i]['date_to']}}"></td>
                                                            <td><textarea rows="2" class="form-control"
                                                                          name="employment[{{$i}}][responsibilities]">{{old('employment')[$i]['responsibilities']}}</textarea></td>
                                                            <td></td>
                                                        </tr>
                                                    @endfor
                                                @else
                                                    <tr>
                                                        <td>1</td>
                                                        <td><input type="text" class="form-control" name="employment[0][organization]">
                                                        </td>
                                                        <td><input type="text" class="form-control" name="employment[0][position]"></td>
                                                        <td><input type="date" class="form-control" name="employment[0][date_from]"></td>
                                                        <td><input type="date" class="form-control" name="employment[0][date_to]"></td>
                                                        <td><textarea rows="2" class="form-control"
                                                                      name="employment[0][responsibilities]"></textarea></td>
                                                        <td></td>
                                                    </tr>
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="form-group pb-sm-5">
                                            <a class="btn btn-success float-right col-sm-3" data-toggle="tab"
                                               href="#nav-referee"
                                               onclick="tabNext('#nav-referee-tab')">Next</a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-referee" role="tabpanel"
                                         aria-labelledby="nav-contact-tab">

                                        <p class="lead mt-3 text-info font-weight-bold">Please give the name of ONE. Your referee must be someone who has knowledge about your profession responsibilities.</p>
                                        <div class="form-group row">
                                            <label for="referee" class="col-sm-2 col-form-label">Referee</label>
                                            <div class="col-sm-10 contact-form">
                                                <input type="text" class="form-control" id="referee" name="referee_name" value="{{old('referee_name')}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="referee_address" class="col-sm-2 col-form-label">Contact Address</label>
                                            <div class="col-sm-10 contact-form">
                                            <textarea rows="2" class="form-control" id="referee_address"
                                                      name="referee_address">{{old('referee_address')}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="referee_phone" class="col-sm-2 col-form-label">Phone no</label>
                                            <div class="col-sm-10 contact-form">
                                                <input type="text" class="form-control" placeholder="" id="referee_phone"
                                                       name="referee_phone" value="{{old('referee_phone')}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="referee-email" class="col-sm-2 col-form-label">Email
                                                address</label>
                                            <div class="col-sm-10 contact-form">
                                                <input type="email" class="form-control" id="referee-email"
                                                       name="referee_email" value="{{old('referee_email')}}">
                                            </div>
                                        </div>
                                        <div class="form-group pb-sm-5">
                                            <input type="submit" value="Submit" class="btn btn-danger float-right col-sm-3">
                                        </div>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        document.getElementById('nationality').addEventListener('input',(event)=>{
            if (event.target.value == 'Nigeria') document.getElementById('state-of-origin').removeAttribute('disabled');
            else {
                document.getElementById('state-of-origin').value = '';
                document.getElementById('state-of-origin').setAttribute('disabled','disabled');
            }
        });

        function tabNext(tab){
            $(tab).click();
            $('html, body').animate({ scrollTop: 300 }, 'slow');
        }
        function removeAcad(input) {
            input.parent().parent().prev().children('td:last-child').html('<a class="btn btn-danger text-white remove" onclick="removeAcad($(this))">Remove</a>')
            input.parent().parent().remove();
            acadCounter--;
        }
        function removePro(input) {
            input.parent().parent().prev().children('td:last-child').html('<a class="btn btn-danger text-white remove" onclick="removePro($(this))">Remove</a>')
            input.parent().parent().remove();
            ProCounter--;
        }
        function removeEmp(input) {
            input.parent().parent().prev().children('td:last-child').html('<a class="btn btn-danger text-white remove" onclick="removeEmp($(this))">Remove</a>')
            input.parent().parent().remove();
            empCounter--;
        }

        window.onload = () => {
            acadCounter = 0;
            empCounter = 0;
            ProCounter = 0;
            $('.add-academic').on('click', function () {
                acadCounter++;
                newRow = '<tr><td>' + (acadCounter+1) + `</td><td><input type="text" class="form-control" name="academic[${acadCounter}][institute]"></td><td><input type="text" class="form-control" name="academic[${acadCounter}][certificate]"></td><td><input type="date" class="form-control" name="academic[${acadCounter}][year]"></td><td><a class="btn btn-danger text-white remove" onclick="removeAcad($(this))">Remove</a></td></tr>`;
                $('#nav-academic-table .remove').remove();
                $(this).parent().parent().parent().next('tbody').append(newRow)
            });
            $('.add-professional').on('click', function () {
                ProCounter++;
                newRow = '<tr><td>' + (ProCounter+1) + `</td><td><input type="text" class="form-control" name="professional[${ProCounter}][institute]"></td><td><input type="text" class="form-control" name="professional[${ProCounter}][certificate]"></td><td><input type="date" class="form-control" name="professional[${ProCounter}][year]"></td><td><a class="btn btn-danger text-white remove" onclick="removePro($(this))">Remove</a></td></tr>`;
                $('#nav-professional-table .remove').remove();
                $(this).parent().parent().parent().next('tbody').append(newRow)
            });
            $('.add-employment').on('click', function () {
                empCounter++;
                newRow = '<tr><td>' + (empCounter+1) + `</td><td><input type="text" class="form-control" name="employment[${empCounter}][organization]"></td><td><input type="text" class="form-control" name="employment[${empCounter}][position]"></td><td><input type="date" class="form-control" name="employment[${empCounter}][date_from]"></td><td><input type="date" class="form-control" name="employment[${empCounter}][date_to]"></td><td><textarea rows="2" class="form-control" name="employment[${empCounter}][responsibilities]"></textarea></td><td><a class="btn btn-danger text-white remove" onclick="removeEmp($(this))">Remove</a></td></tr>`;
                $('#nav-employment-table .remove').remove();
                $(this).parent().parent().parent().next('tbody').append(newRow)
            });

            //states api
            $('#state-of-origin').append('<option id="loading">loading...</option>')
            fetch('http://locationsng-api.herokuapp.com/api/v1/cities')
                .then(resp => resp.json())
                .then(states => {
                    $('#loading').remove();
                    states.forEach(state => {
                        $('#state-of-origin').append(`<option value=${state.alias}>${state.state}</option>`);
                    });
                });
                fetch("{{url('/js/countries.json')}}")
                    .then(resp => resp.json())
                    .then((countries)=>{
                        $.each(countries,(i, country)=>{
                        $('#countries').append(`<option value=${country.name}>`);
                })
            })
        }
    </script>
@endsection