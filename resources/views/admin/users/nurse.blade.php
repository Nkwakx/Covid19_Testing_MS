@extends('layouts.admin')

@section('content')

<div class="page-header p-4 mb-0">
    <div class="row align-items-center">
        <div class="col">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Admin</a></li>
                <li class="breadcrumb-item active">Nurses</li>
            </ul>
        </div>
        <div class="col-auto float-right ml-auto">
            <a href="{{ route('admin.users.create') }}" class="btn add-btn"><i
                    class="fa fa-plus"></i> Add Nurse</a>
        </div>
    </div>
</div>
    <div class="content py-3 mt-2 p-4">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table datatable">
                        <thead>
                            <tr>
                                <th style="min-width:200px;">Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nurses as $user)

                                <tr>
                                    <td>
                                        <img width="28" height="28" src="{{ asset('images/user.jpg') }}"
                                            class="rounded-circle" alt=""> {{ $user->name }}
                                    </td>
                                    <td>{{ $user->addressLine1 }} {{ $user->addressLine2 }} {{ $user->suburb->suburb_name ?? 'No Address' }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->email }}</td>
                                    @foreach ($user->roles as $role)
                                        <td>
                                            <span class="custom-badge status-green">{{ $role->name }}</span>
                                        </td>
                                    @endforeach
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.users.edit', $user->id) }}"><i
                                                        class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.users.destroy', $user->id) }}"
                                                    data-toggle="modal" data-target="#delete_employee"><i
                                                        class="fa fa-trash-o m-r-5"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <div id="delete_employee" class="modal fade delete-modal" role="dialog">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body text-center">
                                                <form id="delete-user-form-{{ $user->id }}"
                                                    action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method("DELETE")
                                                    <img src="{{ asset('images/sent.png') }}" alt="" width="50" height="46">
                                                    <h3>Are you sure want to delete this Employee?</h3>
                                                </form>
                                                <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                                                    <button type="submit" class="btn btn-danger" onclick="event.preventDefault();
                                                        document.getElementById('delete-user-form-{{ $user->id }}').submit()">Yes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
