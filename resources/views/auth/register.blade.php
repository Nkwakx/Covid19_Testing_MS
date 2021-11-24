@extends('layouts.main')

@section('content')
<div class="auth">
    <div class="container-auth">
        <div class="wrap-auth">
            <div class="auth-form-title mb-5" style="background-image: url('{{ asset('images/auth.jpg') }}');">
                <span class="auth-form-title-1 mb-3">
                    Sign Up
                </span>
            </div>
            <form method="POST" action="{{ route('register') }}" class="auth-form">
                @csrf
            
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input name="name" type="name" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="name" value="{{ old('name') }}">
                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          {{ $message }}
                      </span>
                  @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input  name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="email" value="{{ old('email') }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                  </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input  name="password" type="password" class="form-control @error('password') is-invalid @enderror">
                  @error('password')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Password confirm</label>
                    <input  name="password_confirmation" type="password" class="form-control" >
                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                  </div>
                  
                <button type="submit" class="btn btn-primary">Register</button>
              </form>
        </div>
    </div>
</div>
@endsection
