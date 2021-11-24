@extends('layouts.admin')

@section('content')
<div class="card mb-3">
    <div class="card-body">
        <ul class="nav nav-tabs nav-tabs-solid nav-justified">
            <li class="nav-item"><a class="nav-link fw-bold" href="{{ route('admin.users.index') }}">Dashboard</a>
            </li>
            <li class="nav-item"><a class="nav-link fw-bold" href="{{ route('admin.nurse_schedule') }}"><span>Nurses
                        Schedule</span></a></li>
            <li class="nav-item"><a class="nav-link fw-bold" href="{{ route('admin.patient_request') }}"><span>Patient Request</span></a>
            </li>
            <li class="nav-item"><a class="nav-link active fw-bold" href="{{ route('admin.suburb_favourite') }}"><span>Nurse Favourite
                        Suburbs</span></a></li>
        </ul>
    </div>
</div>
<div class="content py-3 mt-2 p-4">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="datatable" class="table table-striped custom-table datatable">
                    <thead>
                        <tr>
                            <th style="min-width:200px;">Name</th>
                            <th>Suburb</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fav_suburbs as $fav)
                            <tr>
                                <td>
                                    <img width="28" height="28" src="{{ asset('assets/img/user.jpg') }}"
                                        class="rounded-circle" alt=""> {{ $fav->name }} {{ $fav->surname }}
                                </td>
                                <td>
                                    {{ $fav->suburb_name }}</td>
                                <td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item"
                                                href=""><i
                                                    class="fas fa-info-circle m-r-5"></i> Details</a>
                                            <a class="dropdown-item"
                                                href=""
                                                data-toggle="modal" data-target="#delete_employee"><i
                                                    class="fa fa-trash-o m-r-5"></i> Remove</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
