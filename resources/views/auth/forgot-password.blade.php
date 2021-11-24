@extends('layouts.main')

@section('content')
    
<div class="auth">
    <div class="container-auth">
        <div class="wrap-auth">
            <div class="auth-form-title mb-5" style="background-image: url('{{ asset('images/auth.jpg') }}');">
                <span class="auth-form-title-1 mb-3">
                  Reset Password
                </span>
            </div>
            <form method="POST" action="{{ route('password.email') }}" class="auth-form">
                @csrf
            
                <div class="mb-3">
                    <label for="email" class="form-label">Username or email</label>
                    <input  name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="email" value="{{ old('email') }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Reset password</button>
              </form>
        </div>
    </div>
</div>
@endsection