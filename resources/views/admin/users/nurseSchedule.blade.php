@extends('layouts.admin')

@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-solid nav-justified">
                <li class="nav-item"><a class="nav-link fw-bold" href="{{ route('admin.users.index') }}">Dashboard</a>
                </li>
                <li class="nav-item"><a class="nav-link active fw-bold"
                        href="{{ route('admin.nurse_schedule') }}"><span>Nurses
                            Schedule</span></a></li>
                <li class="nav-item"><a class="nav-link fw-bold"
                        href="{{ route('admin.patient_request') }}"><span>Patient Request</span></a>
                </li>
                <li class="nav-item"><a class="nav-link fw-bold"
                        href="{{ route('admin.suburb_favourite') }}"><span>Nurse Favourite
                            Suburbs</span></a></li>
            </ul>
        </div>
    </div>
    <form action="{{ route('admin.schedule_log/records') }}" method="POST">
        @csrf
        <div class="row filter-row p-4">
            <div class="col-sm-6 col-md-3">
                <div class="form-group form-focus">
                    <label class="focus-label">Nurse Name</label>
                    <div class="cal-icon">
                        <input class="form-control floating @error('other') is-invalid @enderror" name="other" type="text"
                            value="{{ old('other') }}">
                        @error('other')
                            <span class="invalid-feedback" role="alert">
                                Enter the nurse name
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="form-group form-focus">
                    <label class="focus-label">(Date) - From</label>
                    <div class="cal-icon">
                        <input class="form-control floating @error('fromDate') is-invalid @enderror"
                            name="fromDate" type="text" value="{{ old('fromDate') }}">
                        <span class="invalid-feedback" role="alert">
                            Please pick the start date
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="form-group form-focus">
                    <label class="focus-label">(Date) - To</label>
                    <div class="cal-icon">
                        <input class="form-control floating @error('toDate') is-invalid @enderror"
                            name="toDate" type="text" value="{{ old('toDate') }}">
                        <span class="invalid-feedback" role="alert">
                            Please pick the end date
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <button type="submit" class="btn btn-success btn-block"> Search </button>
            </div>
        </div>
    </form>


    <div class="content py-3 mt-2 p-4">
        <div class="row">
            <div class="col-md-12 table-rep-plugin">
                <div class="table-responsive" data-pattern="priority-columns">
                    <table id="datatable-buttons" class="table table-striped" id="records">
                        <thead>
                            <tr>
                                <th>Nurse Responsible</th>
                                <th>Apppointment Address</th>
                                <th>Appointment Date</th>
                                <th>Appointment Time</th>
                                <th>Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($requesLogs as $requesLog)
                                <tr>
                                    <td><img width="28" height="28" src="{{ asset('assets/img/user.jpg') }}"
                                            class="rounded-circle m-r-5" alt=""> {{ $requesLog->name }}
                                        {{ $requesLog->surname }}</td>
                                        <td>{{ $requesLog->addressLine1 }} {{ $requesLog->addressLine2 }}<br></td>
                                            {{-- {{ $requesLog->suburb->suburb_name }},  {{ $requesLog->suburb->Postal_Code }} --}}
                                            <td>{{ $requesLog->log_date }}</td>
                                    <td>{{ $requesLog->log_time }}</td>
                                    <td><span class="custom-badge status-red">{{ $requesLog->status }}</span></td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="edit-appointment.html"><i
                                                        class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                    data-target="#delete_appointment"><i class="fa fa-trash-o m-r-5"></i>
                                                    Delete</a>
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
