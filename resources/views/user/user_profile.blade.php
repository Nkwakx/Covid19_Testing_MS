@extends('layouts.patient')

@section('content')
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Profile</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">Dashboard</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ul>
                </div>
            </div>
        </div>
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
                                            <span class="text"><a href="#">{{ $phone }}</a></span>
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
                                            <span class="text">{{ Auth::user()->addressLine1 }}
                                                {{ Auth::user()->addressLine2 }} {{ Auth::user()->suburb->suburb_name ?? 'No Suburb'}}
                                                {{ Auth::user()->city }} {{ Auth::user()->zipCode }}</span>
                                        </li>
                                        <li>
                                            <span class="title">Gender:</span>
                                            <span class="text">{{ Auth::user()->gender }}</span>
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
                                            <div class="text">{{ Auth::user()->med_aid_YN }}</div>
                                        </li>
                                        <li>
                                            <div class="title">Medical Aid No</div>
                                            <div class="text">{{ Auth::user()->med_aid_number }}</div>
                                        </li>
                                        <li>
                                            <div class="title">Medical Scheme</div>
                                            <div class="text">{{ Auth::user()->medicalAidPlan->medicalAidScheme->name ?? ''}}</div>
                                        </li>
                                        <li>
                                            <div class="title">Medical Plan</div>
                                            <div class="text">{{ Auth::user()->medicalAidPlan->name ?? ''}}</div>
                                        </li>
                                        <li>
                                            <div class="title">Person Responsible</div>
                                            <div class="text">{{ Auth::user()->name }} {{ Auth::user()->surname }}</div>
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
                                            <th>Id Number</th>
                                            <th>Gender</th>
                                            <th>Phone</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dependents as $dependent)
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
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @include('patient.partials._modalId')
        @include('patient.profile_edit')
        @include('patient.partials._payment')
@endsection
