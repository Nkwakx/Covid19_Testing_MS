@csrf

<lu>
    @if (is_array($favouriteSub) || is_object($favouriteSub))

        @forelse ($favouriteSub as $suburb)
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <form action="" method="POST">
                    @method('DELETE')
                    @csrf
                    <strong>{{ $suburb->suburb_name }}</strong>
                    <button type="submit" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </form>
               
            </div>
        @empty
        <div class="alert alert-dark alert-dismissible fade show" role="alert">
            <strong>No Favourite Suburb!</strong>
        </div>
        @endforelse
    @endif
</lu>
