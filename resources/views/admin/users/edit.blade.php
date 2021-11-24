@extends('layouts.admin')

@section('content')
<div class="col-lg-12">
    <h3>Edit User</h3>
   <div class="card">
    <form method="POST" action="{{ route('admin.users.update', $user->id) }}" >
        @method('PATCH')
        @include('admin.users.partials.from')
    </form>
</div>
@endsection
