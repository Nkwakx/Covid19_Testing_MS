@extends('layouts.main')

@section('content')

    <div class="auth">
        <div class="container-auth">
            <div class="wrap-auth">
                <div class="auth-form-title mb-5" style="background-image: url('{{ asset('images/auth.jpg') }}');">
                    <span class="auth-form-title-1 mb-3">
                        Sign In
                    </span>
                </div>

                <form method="POST" action="{{ route('login') }}" class="auth-form">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    @csrf

                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="text" class="form-control form-control-lg @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" placeholder="Enter email">
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password"
                            class="form-control form-control-lg @error('password') is-invalid @enderror" name="password"
                            placeholder="Enter Password">
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                    </div>

                    <div class="signin-check ">
                        <div class="mb-4 form-check">
                            <input type="checkbox" class="form-check-input me-2" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Remember me </label>
                            <a href="{{ route('password.request') }}" class="password">
                                Forgot Password?
                            </a>
                        </div>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-3">Log in</button>
                    </div>
                    <div class="text-center mt-4 fs-6">
                        <p class="text-gray-600">Don't have an account? 
                            <a href="{{ route('account') }}" class="font-bold">
                                Sign up
                            </a>
                        </p>
                    </div>
                </form>
               
            </div>
        </div>
    </div>
@endsection
