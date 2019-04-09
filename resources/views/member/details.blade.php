@extends('layouts.member')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-12">
                <div class="reg-form">
                    <div class="card">
                        <h3 class="card-header">Member details - <span class="text-danger">{{$member->name}}</span></h3>
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <hr>
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
                                    <p class="lead mt-3 text-info font-weight-bold">These are the registration details of <span class="text-danger">{{$member->name}}</span>.</p>
                                    <div class="col-md-4 float-md-right pt-3 ">
                                        <div class="mb-3">
                                            <img id="author-img" class="rounded border border-gray img"
                                                 src="{{$member->image}}" alt="Profile Image" height="242" width="242">
                                        </div>
                                    </div>

                                    <div class="form-group row pt-3">
                                        <label for="surname" class="col-sm-2 col-form-label">Surname</label>
                                        <div class="col-sm-10 contact-form">
                                            <input type="text" class="form-control" id="surname" name="surname" value="{{$member->surname}}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="firstname" class="col-sm-2 col-form-label">First Name</label>
                                        <div class="col-sm-10 contact-form">
                                            <input type="text" class="form-control" id="firstname" name="firstname" value="{{$member->firstname}}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="othernames" class="col-sm-2 col-form-label">Other Names</label>
                                        <div class="col-sm-10 contact-form">
                                            <input type="text" class="form-control" id="othernames"
                                                   name="othernames" value="{{$member->othernames}}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="address" class="col-sm-2 col-form-label">Contact address</label>
                                        <div class="col-sm-10 contact-form">
                                            <textarea rows="2" class="form-control" id="address"
                                                      name="address" disabled>{{$member->address}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone" class="col-sm-2 col-form-label">Phone no</label>
                                        <div class="col-sm-10 contact-form">
                                            <input type="text" class="form-control" placeholder="" id="phone"
                                                   name="phone" value="{{$member->phone}}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="register-email" class="col-sm-2 col-form-label">Email
                                            address</label>
                                        <div class="col-sm-10 contact-form">
                                            <input type="email" class="form-control" id="register-email"
                                                   name="email" value="{{$member->email}}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="date-of-birth" class="col-sm-2 col-form-label">Date of
                                            birth</label>
                                        <div class="col-sm-10 contact-form">
                                            <input type="date" class="form-control" id="date-of-birth"
                                                   name="date_of_birth" value="{{$member->date_of_birth}}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nationality" class="col-sm-2 col-form-label">Nationality</label>
                                        <div class="col-sm-10 contact-form">
                                            <input type="text" class="form-control" id="nationality"
                                                   name="nationality" value="{{$member->nationality}}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="state-of-origin" class="col-sm-2 col-form-label">State Of Origin
                                            (if
                                            Nigeria)</label>
                                        <div class="col-sm-10 contact-form">
                                            <input id="state-of-origin" type="text" class="form-control" value="{{$member->state_of_origin}}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="company-name" class="col-sm-2 col-form-label">Company
                                            Name</label>
                                        <div class="col-sm-10 contact-form">
                                            <input type="text" class="form-control" id="company-name"
                                                   name="company_name" value="{{$member->company_name}}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="company-address" class="col-sm-2 col-form-label">Company
                                            Address..</label>
                                        <div class="col-sm-10 contact-form">
                                            <textarea rows="2" class="form-control" id="company-address"
                                                      name="company_address" disabled>{{$member->company_address}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="job-title" class="col-sm-2 col-form-label">Job Title</label>
                                        <div class="col-sm-10 contact-form">
                                            <input type="text" class="form-control" id="job-title"
                                                   name="job_title" value="{{$member->job_title}}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nature-of-work" class="col-sm-2 col-form-label">Nature Of Work</label>
                                        <div class="col-sm-10 contact-form">
                                            <textarea rows="2" class="form-control" id="nature-of-work"
                                                      name="nature_of_work" disabled>{{$member->nature_of_work}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group pb-5">
                                        <a class="btn btn-success col-sm-3 float-right" data-toggle="tab"
                                           href="#nav-qualifications"
                                           onclick="tabNext('#nav-qualifications')">Next</a>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-qualifications" role="tabpanel"
                                     aria-labelledby="nav-profile-tab">
                                    <p class="lead mt-3 text-info font-weight-bold">Academic Qualifications - (Degree, A/level, O-level, Bsc, Others)</p>
                                    <?php $academic = $member->qualifications()->where('type','academic')->get()->all() ?>
                                    @if($academic)
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="nav-academic-table">
                                                <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Name Of Institute</th>
                                                    <th>Certificate / degree</th>
                                                    <th>Year attained</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @for($i=0;$i<count($academic);$i++)
                                                    <tr>
                                                        <td>{{$i+1}}</td>
                                                        <td>{{$academic[$i]->institute}}</td>
                                                        <td>{{$academic[$i]->certificate}}</td>
                                                        <td>{{$academic[$i]->year}}</td>
                                                    </tr>
                                                @endfor
                                                </tbody>
                                            </table>
                                        </div>
                                    @else
                                        No Academic qualifications for this user
                                    @endif
                                    <p class="lead mt-3 text-info font-weight-bold">Professional Qualifications</p>
                                    <?php $professional = $member->qualifications()->where('type','professional')->get()->all()?>
                                    @if($professional)
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="nav-professional-table">
                                                <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Name Of Institute/Examining Body</th>
                                                    <th>Qualification Obtained</th>
                                                    <th>Year attained</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @for($i=0;$i<count($professional);$i++)
                                                    <tr>
                                                        <td>{{$i+1}}</td>
                                                        <td>{{$professional[$i]->institute}}</td>
                                                        <td>{{$professional[$i]->certificate}}</td>
                                                        <td>{{$professional[$i]->year}}</td>
                                                    </tr>
                                                @endfor
                                                </tbody>
                                            </table>
                                        </div>
                                    @else
                                        No Professional qualifications for this member
                                    @endif
                                    <div class="form-group pb-5">
                                        <a class="btn btn-success col-sm-3 float-right" data-toggle="tab"
                                           href="#nav-employment"
                                           onclick="tabNext('#nav-employment-tab')">Next</a>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-employment" role="tabpanel"
                                     aria-labelledby="nav-contact-tab">
                                    <p class="lead mt-3 text-info font-weight-bold">Employment History</p>
                                    <?php $employment = $member->employments ?>
                                    @if($employment)
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
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @for($i=0;$i<count($employment);$i++)
                                                    <tr>
                                                        <td>{{$i+1}}</td>
                                                        <td>{{$employment[$i]->organization}}</td>
                                                        <td>{{$employment[$i]->position}}</td>
                                                        <td>{{$employment[$i]->date_from}}</td>
                                                        <td>{{$employment[$i]->date_to}}</td>
                                                        <td>{{$employment[$i]->responsibilities}}</td>
                                                    </tr>
                                                @endfor
                                                </tbody>
                                            </table>
                                        </div>
                                    @else
                                        No Employment history for this user
                                    @endif
                                    <div class="form-group pb-sm-5">
                                        <a class="btn btn-success float-right col-sm-3" data-toggle="tab"
                                           href="#nav-referee"
                                           onclick="tabNext('#nav-referee-tab')">Next</a>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-referee" role="tabpanel"
                                     aria-labelledby="nav-contact-tab">

                                    <p class="lead mt-3 text-info font-weight-bold">Referee</p>
                                    <?php $referee = $member->referee ?>
                                    @if($referee)
                                        <div class="form-group row">
                                            <label for="referee" class="col-sm-2 col-form-label">Referee</label>
                                            <div class="col-sm-10 contact-form">
                                                <input type="text" class="form-control" id="referee" name="referee_name" value="{{$referee->name}}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="referee_address" class="col-sm-2 col-form-label">Contact Address</label>
                                            <div class="col-sm-10 contact-form">
                                                <textarea rows="2" class="form-control" id="referee_address"
                                                          name="referee_address" disabled>{{$referee->address}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="referee_phone" class="col-sm-2 col-form-label">Phone no</label>
                                            <div class="col-sm-10 contact-form">
                                                <input type="text" class="form-control" placeholder="" id="referee_phone"
                                                       name="referee_phone" value="{{$referee->phone}}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="referee-email" class="col-sm-2 col-form-label">Email
                                                address</label>
                                            <div class="col-sm-10 contact-form">
                                                <input type="email" class="form-control" id="referee-email"
                                                       name="referee_email" value="{{$referee->email}}" disabled>
                                            </div>
                                        </div>
                                    @else
                                        This member has no referee.
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
        </div>
    </div>

@endsection