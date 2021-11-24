@csrf

<lu>
    @if (is_array($staffs) || is_object($staffs))

        @foreach ($staffs as $staff)
            <li>
                <a href=""><span class="chat-avatar-sm user-img"><img src="{{ asset('assets/img/user.jpg') }}" alt=""
                            class="rounded-circle"><span class="status away"></span></span>
                    {{ $staff->name }}<span class="badge badge-pill float-right"></span></a>
            </li>
        @endforeach

    @endif
</lu>
