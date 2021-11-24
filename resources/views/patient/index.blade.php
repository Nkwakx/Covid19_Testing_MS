@extends('layouts.patient')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                <div class="dash-widget">
                    <span class="dash-widget-icon"><i class="fa fa-calendar-check-o" aria-hidden="true"></i></span>
                    <div class="dash-widget-info text-right">
                        <h3 class="fw-bold">{{ $count_request }}</h3>
                        <span class="widget-title2">Your Appointments <i class="fa fa-check" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                <div class="dash-widget">
                    <span class="dash-widget-icon"><i class="fa fa-stethoscope"></i></span>
                    <div class="dash-widget-info text-right">
                        <h3 class="fw-bold">{{ $count_request }}</h3>
                        <span class="widget-title2">Your Test Requests<i class="fa fa-check" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                <div class="dash-widget">
                    <span class="dash-widget-icon"><i class="fa fa-user-o" aria-hidden="true"></i></span>
                    <div class="dash-widget-info text-right">
                        <h3 class="fw-bold">{{ $count_dependents }}</h3>
                        <span class="widget-title2">Your Dependents <i class="fa fa-check" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="dash-widget">
                    <span class="dash-widget-icon"><i class="fa fa-usd" aria-hidden="true"></i></span>
                    <div class="dash-widget-info text-right">
                        <h3 class="fw-bold">3</h3>
                        <span class="widget-title2">Your Pending Payment <i class="fa fa-check" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div> --}}
        </div>
        <div class="content container-fluid">
            @if ($phone == '')
            <H5 class="text-danger fw-bolder">Please complete your profile</H5>
            @endif
           <div class="card mb-0">
                        <div class="card-body">
                    <div class="col-md-12 py-5">
                        <div class="profile-view">
                            <div class="profile-img-wrap">
                                <div class="profile-img">
                                    <a class="avatar" href="">Main</a>
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="profile-info-left">
                                            <h3 class="user-name m-t-0 mb-0">{{ $name }}
                                                {{ $surname }}</h3>
                                            <small class="text-muted"></small>
                                            <div class="staff-id"></div>
                                            <div class="staff-msg"><a data-toggle="modal" data-target="#user_profile"
                                                    class="btn btn-primary">Edit Profile</a></div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <ul class="personal-info">
                                            <li>
                                                <span class="title">Phone:</span>
                                                <span class="text">{{ $phone ?? '( --- ) --- ----'}}</span>
                                            </li>
                                            <li>
                                                <span class="title">Email:</span>
                                                <span class="text"><a href="#">{{ $email }}</a></span>
                                            </li>
                                            <li>
                                                <span class="title">ID Number:</span>
                                                <span class="text">{{ $idNo }}</span>
                                            </li>
                                            <li>
                                                <span class="title">Address:</span>
                                                <span class="text">{{ $addressLine1 }}
                                                    {{ $addressLine2 }} {{ $suburb_name ?? 'No Address Found'}}
                                                    {{-- {{ $suburb->city->name }} {{ $suburb->zipCode }}</span> --}}
                                            </li>
                                            <li>
                                                <span class="title">Gender:</span>
                                                <span class="text">{{ $gender }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="emp_profile" class="pro-overview tab-pane fade show active">

                <div class="row">
                    <div class="col-md-6">
                        <div class="card profile-box flex-fill">
                            <div class="card-body">
                                <h4 class="card-title fw-bolder">Medical Payment information<a data-toggle="modal" id="mediumButton"
                                    data-target="#about_pay" data-attr="{{ url('about_pay') }}"
                                    class="edit-icon" data-toggle="modal" data-target="#family_info_modal"><i
                                        class="fa fa-pencil"></i></a></h4>
                                    <ul class="personal-info">
                                        <li>
                                            <div class="title">Medical Aid</div>
                                            <div class="text">{{ $med_aid_YN ?? '----' }}</div>
                                        </li>
                                        <li>
                                            <div class="title">Medical Aid No</div>
                                            <div class="text">{{ $med_aid_number ?? '----' }}</div>
                                        </li>
                                        {{-- <li>
                                            <div class="title">Medical Scheme</div>
                                            <div class="text">{{ $medical_scheme ?? 'No Scheme'}}</div>
                                        </li> --}}
                                        <li>
                                            <div class="title">Medical Plan</div>
                                            <div class="text">{{ $medical_plan ?? 'No plan'}}</div>
                                        </li>
                                        <li>
                                            <div class="title">Person Responsible</div>
                                            <div class="text">{{ $name }} {{ $surname }}</div>
                                        </li>
                                    </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card profile-box flex-fill">
                            <div class="card-body">
                                <h4 class="card-title fw-bolder">Family Informations <a data-toggle="modal" id="mediumButton"
                                        data-target="#add_family_member" data-attr="{{ url('addFamilyMember') }}"
                                        class="edit-icon" data-toggle="modal" data-target="#family_info_modal"><i
                                            class="fa fa-pencil"></i></a>
                                </h4>
                                <div class="table-responsive">
                                    <table class="table table-nowrap">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>ID Number</th>
                                                <th>Gender</th>
                                                <th>Phone</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($dependents as $dependent)
                                                <tr>
                                                    <td>{{ $dependent->name }} {{ $dependent->surname }}</td>
                                                    <td>{{ $dependent->addressLine1 }} {{ $dependent->addressLine2 }}</td>
                                                    <td>{{ $dependent->idNo }}</td>
                                                    <td>{{ $dependent->gender }}</td>
                                                    <td>{{ $dependent->phone }}</td>
                                                    <td class="text-right">
                                                        <div class="dropdown dropdown-action">
                                                            <a aria-expanded="false" data-toggle="dropdown"
                                                                class="action-icon dropdown-toggle" href="#"><i
                                                                    class="material-icons">more_vert</i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a href="#" class="dropdown-item"><i
                                                                        class="fa fa-pencil m-r-5"></i> Edit</a>
                                                                <a href="#" class="dropdown-item"><i
                                                                        class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @empty
                                                <div class="req-item py-3 fw-bolder">You have no dependent(s) yet</div>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
        @include('patient.partials._modalId')
        @include('patient.partials._makeTestRequest')
        @include('patient.profile_edit')
        @include('patient.partials._payment')
@endsection
