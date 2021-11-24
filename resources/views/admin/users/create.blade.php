@extends('layouts.admin')

@section('content')
<div class="col-lg-12">
    <h4 class="text-center">Add User</h4>
   <div class="card">
    <form method="POST" action="{{ route('admin.users.store') }}" >
        @include('admin.users.partials.from', ['create' => true])
    </form>
</div>
@endsection
