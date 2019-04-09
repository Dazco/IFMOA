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
                            <form>
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
                                    <div class="tab-pane fade show active" id="nav-general-information" role="tabpanel"
                                         aria-labelledby="nav-home-tab">
                                        <p class="lead mt-3 text-info">Please Fill in the following with the relevant details</p>
                                        <div class="col-md-4 float-md-right pt-3 ">
                                            <div class="mb-3">
                                                <img id="author-img" class="rounded border border-gray"
                                                     src="images/frontend/default-profile.jpg" alt="...">
                                            </div>
                                            <div class="custom-file mb-2">
                                                <label for="photo" class="custom-file-label">Change Photo</label>
                                                <input type="file" id="photo" class="custom-file-input"
                                                       onchange="readURL(this,'#author-img')">
                                            </div>
                                            <a class="btn btn-danger aligncenter text-white"
                                                    onclick="revertURL('#author-img','images/frontend/default-profile.jpg')">
                                                Remove
                                            </a>
                                        </div>

                                        <div class="form-group row pt-3">
                                            <label for="surname" class="col-sm-2 col-form-label">Surname</label>
                                            <div class="col-sm-10 contact-form">
                                                <input type="text" class="form-control" id="surname" name="surname">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="firstname" class="col-sm-2 col-form-label">First Name</label>
                                            <div class="col-sm-10 contact-form">
                                                <input type="text" class="form-control" id="firstname" name="firstname">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="othernames" class="col-sm-2 col-form-label">Other Names</label>
                                            <div class="col-sm-10 contact-form">
                                                <input type="text" class="form-control" id="othernames"
                                                       name="othernames">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="address" class="col-sm-2 col-form-label">Contact address</label>
                                            <div class="col-sm-10 contact-form">
                                            <textarea rows="2" class="form-control" id="address"
                                                      name="address"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="phone" class="col-sm-2 col-form-label">Phone no</label>
                                            <div class="col-sm-10 contact-form">
                                                <input type="text" class="form-control" placeholder="" id="phone"
                                                       name="phone">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="register-email" class="col-sm-2 col-form-label">Email
                                                address</label>
                                            <div class="col-sm-10 contact-form">
                                                <input type="email" class="form-control" id="register-email"
                                                       name="email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="date-of-birth" class="col-sm-2 col-form-label">Date of
                                                birth</label>
                                            <div class="col-sm-10 contact-form">
                                                <input type="date" class="form-control" id="date-of-birth"
                                                       name="date_of_birth">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nationality" class="col-sm-2 col-form-label">Nationality</label>
                                            <div class="col-sm-10 contact-form">
                                                <input type="text" class="form-control" id="nationality"
                                                       name="nationality">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="state-of-origin" class="col-sm-2 col-form-label">State Of Origin
                                                (if
                                                Nigeria)</label>
                                            <div class="col-sm-10 contact-form">
                                                <select class="custom-select my-1 mr-sm-2 states" id="state-of-origin"
                                                        name="state_of_origin">
                                                    <option selected>choose..</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="company-name" class="col-sm-2 col-form-label">Company
                                                Name</label>
                                            <div class="col-sm-10 contact-form">
                                                <input type="text" class="form-control" id="company-name"
                                                       name="company_name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="company-address" class="col-sm-2 col-form-label">Company
                                                Address..</label>
                                            <div class="col-sm-10 contact-form">
                                            <textarea rows="2" class="form-control" id="company-address"
                                                      name="company_address"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="job-title" class="col-sm-2 col-form-label">Job Title</label>
                                            <div class="col-sm-10 contact-form">
                                                <input type="text" class="form-control" id="job-title"
                                                       name="job_title">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="naure-of-work" class="col-sm-2 col-form-label">Nature Of Work</label>
                                            <div class="col-sm-10 contact-form">
                                            <textarea rows="2" class="form-control" id="nature-of-work"
                                                      name="naure_of_work"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group pb-5">
                                            <a class="btn btn-success col-sm-3 pull-right" data-toggle="tab"
                                               href="#nav-qualifications"
                                               onclick="tabNext('#nav-qualifications')">Next</a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-qualifications" role="tabpanel"
                                         aria-labelledby="nav-profile-tab">
                                        <p class="lead mt-3 text-info">Academic Qualifications - (Degree, A/level, O-level, Bsc, Others)</p>
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="nav-qualifications-table">
                                                <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Name Of Institute</th>
                                                    <th>Certificate / degree</th>
                                                    <th>Year attained</th>
                                                    <th><a class="btn btn-primary add-qualification text-white">add</a>
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td><input type="text" class="form-control" name="institute"></td>
                                                    <td><input type="text" class="form-control" name="certificate"></td>
                                                    <td><input type="month" class="form-control" name="year"></td>
                                                    <td></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="form-group pb-5">
                                            <a class="btn btn-success col-sm-3 pull-right" data-toggle="tab"
                                               href="#nav-employment"
                                               onclick="tabNext('#nav-employment-tab')">Next</a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-employment" role="tabpanel"
                                         aria-labelledby="nav-contact-tab">
                                        <p class="lead mt-3 text-info">List the last <b>THREE (3)</b> positions you have held in your employment history, beginning with the most current</p>
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
                                                <tr>
                                                    <td>1</td>
                                                    <td><input type="text" class="form-control" name="organization">
                                                    </td>
                                                    <td><input type="text" class="form-control" name="position"></td>
                                                    <td><input type="date" class="form-control" name="date_from"></td>
                                                    <td><input type="date" class="form-control" name="date_to"></td>
                                                    <td><textarea rows="2" class="form-control"
                                                                  name="responsibilities"></textarea></td>
                                                    <td></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="form-group pb-sm-5">
                                            <a class="btn btn-success pull-right col-sm-3" data-toggle="tab"
                                               href="#nav-referee"
                                               onclick="tabNext('#nav-referee-tab')">Next</a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-referee" role="tabpanel"
                                         aria-labelledby="nav-contact-tab">

                                        <p class="lead mt-3 text-info">Please give the name of ONE. Your referee must be someone who has knowledge about your profession responsibilities.</p>
                                        <div class="form-group row">
                                            <label for="referee" class="col-sm-2 col-form-label">Referee</label>
                                            <div class="col-sm-10 contact-form">
                                                <input type="text" class="form-control" id="referee" name="referee_name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="referee_address" class="col-sm-2 col-form-label">Contact Address</label>
                                            <div class="col-sm-10 contact-form">
                                            <textarea rows="2" class="form-control" id="referee_address"
                                                      name="referee_address"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="referee_phone" class="col-sm-2 col-form-label">Phone no</label>
                                            <div class="col-sm-10 contact-form">
                                                <input type="text" class="form-control" placeholder="" id="referee_phone"
                                                       name="referee_phone">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="referee-email" class="col-sm-2 col-form-label">Email
                                                address</label>
                                            <div class="col-sm-10 contact-form">
                                                <input type="email" class="form-control" id="referee-email"
                                                       name="referee_email">
                                            </div>
                                        </div>
                                        <div class="form-group pb-sm-5">
                                            <input type="submit" value="Submit" class="btn btn-danger pull-right col-sm-3">
                                        </div>
                                    </div>
                                </div>
                            </form>
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
        function tabNext(tab){
            $(tab).click();
            $('html, body').animate({ scrollTop: 300 }, 'slow');
        }
        function removeQual(input) {
            input.parent().parent().prev().children('td:last-child').html('<a class="btn btn-danger text-white remove" onclick="removeQual($(this))">Remove</a>')
            input.parent().parent().remove();
            acadCounter--;
        }

        function removeEmp(input) {
            input.parent().parent().prev().children('td:last-child').html('<a class="btn btn-danger text-white remove" onclick="removeEmp($(this))">Remove</a>')
            input.parent().parent().remove();
            empCounter--;
        }

        window.onload = () => {
            acadCounter = 2;
            empCounter = 2;
            $('.add-qualification').on('click', function () {
                newRow = '<tr><td>' + acadCounter + '</td><td><input type="text" class="form-control" name="institute"></td><td><input type="text" class="form-control" name="certificate"></td><td><input type="month" class="form-control" name="year"></td><td><a class="btn btn-danger text-white remove" onclick="removeQual($(this))">Remove</a></td></tr>';
                $('#nav-qualifications-table .remove').remove();
                $(this).parent().parent().parent().next('tbody').append(newRow)
                acadCounter++;
            });
            $('.add-employment').on('click', function () {
                newRow = '<tr><td>' + empCounter + '</td><td><input type="text" class="form-control" name="organization"></td><td><input type="text" class="form-control" name="position"></td><td><input type="date" class="form-control" name="date_from"></td><td><input type="date" class="form-control" name="date_to"></td><td><textarea rows="2" class="form-control" name="responsibility"></textarea></td><td><a class="btn btn-danger text-white remove" onclick="removeEmp($(this))">Remove</a></td></tr>';
                $('#nav-employment-table .remove').remove();
                $(this).parent().parent().parent().next('tbody').append(newRow)
                empCounter++;
            });

            //states api
            $('#state-of-origin').append('<option id="loading">loading...</option>')
            $('#state-of-residence').append('<option id="loading2">loading...</option>')
            fetch('http://locationsng-api.herokuapp.com/api/v1/cities')
                .then(resp => resp.json())
                .then(states => {
                    $('#loading').remove();
                    $('#loading2').remove();
                    states.forEach(state => {
                        $('#state-of-origin').append(`<option value=${state.alias}>${state.state}</option>`);
                    });
                })
        }
    </script>
@endsection