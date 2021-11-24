@extends('layouts.main')

@section('content')
    
<div class="auth">
    <div class="container-auth">
        <div class="wrap-auth">
        <h1>Verify e-mail address</h1>
        <h6 class="text-danger">You must verify your email address to access this page.</h6>
        <h6>Please check your emails, or</h6>
        <form method="POST" action="{{ 'verification.send' }}" class="auth-form">
            @csrf
            <button type="submit" class="btn btn-primary">Resend verification email</button>
        </form>
    </div>
   
</div>
@endsection