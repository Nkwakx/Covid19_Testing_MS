@extends('layouts.emp')

@section('content')


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
                                                <span class="text">{{ $addressLine1 }}
                                                    {{ $addressLine2 }} {{ $suburb->suburb_name ?? 'No Suburb'}}
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
        
    @include('user.profile_edit')
    @include('patient.partials._modalId')
@endsection
