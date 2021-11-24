@extends('layouts.main')

@section('content')
    <div class="row align-items-center justify-content-center ms-md-auto py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card success-card">
                    <div class="card-body">
                        <div class="success-cont">
                            <i class="bi bi-check2"></i>
                            <h3>Your Registration Successfully!</h3>
                            <p>Hi, <strong><b>{{ request()->fullName }}</b></strong> thank you for joining us, soon we will approve your registration
                                <br> When your account approved, you will receive your credentials on <strong>{{ request()->email }}</strong></p>
                            <a href="{{ route('login') }}" class="btn btn-primary view-inv-btn">Login </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

