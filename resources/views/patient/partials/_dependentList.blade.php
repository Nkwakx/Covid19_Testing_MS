@csrf

<lu>
    @if (is_array($dependents) || is_object($dependents))
        
        @foreach ($dependents as $dependent)
            <li>
                <a href="{{ route('patient_profile') }}"><span class="chat-avatar-sm user-img"><img src="{{ asset('assets/img/user.jpg') }}" alt=""
                            class="rounded-circle"><span class="status offline"></span></span>
                    {{ $dependent->name }}<span class="badge badge-pill float-right"></span></a>
            </li>
        @endforeach
        
    @endif
</lu>
