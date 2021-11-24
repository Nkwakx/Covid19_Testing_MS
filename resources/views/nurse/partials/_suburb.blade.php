@csrf

<lu>
    @if (is_array($suburbs) || is_object($suburbs))

        @foreach ($suburbs as $suburb)
            <form method="POST" action="{{ route('nurse.favourite.store') }}">
                @csrf
                <li>
                    <input hidden type="text" class="form-control" id="nurse_id" name="nurse_id"
                                        value="{{ Auth::user()->id }}">
                    <input hidden type="text" class="form-control" id="suburb_id" name="suburb_id" value="{{ $suburb->id }}" >

                <li><button type="submit" class="tag">{{ $suburb->suburb_name }}</button></li>
                </li>
            </form>
        @endforeach

    @endif
</lu>
