@component('mail::message')
# Welcom to ZikClinic. We're happy to have you.

Your test request was accepted, your are scheduled to this date and time
<strong><b> {{ request()->log_date }} between {{ request()->log_time }}.</b></strong><br>
 Nurse {{ Auth::user()->name }} {{ Auth::user()->surname }} would be in touch. Thank You!

@component('mail::button', ['url' => 'http://127.0.0.1:8000/login'])
Check Your Status
@endcomponent

Kind Regards,<br>
{{ config('app.name') }}
@endcomponent
