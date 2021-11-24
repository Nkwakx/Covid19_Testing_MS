@component('mail::message')
# Welcom to ZikClinic <strong><b>{{ request()->fullName }}</b></strong>. We're happy to have you.

<h3>Your registration was approved!</h3> <b>
    <h3>You may login and update your profile</h3>

@component('mail::button', ['url' => 'http://127.0.0.1:8000/login'])
Login Here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
