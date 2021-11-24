@extends('layouts.admin')

@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-solid nav-justified">
                <li class="nav-item"><a class="nav-link fw-bold" href="{{ route('admin.users.index') }}">Dashboard</a>
                </li>
                <li class="nav-item"><a class="nav-link fw-bold"
                        href="{{ route('admin.nurse_schedule') }}"><span>Nurses
                            Schedule</span></a></li>
                <li class="nav-item"><a class="nav-link active fw-bold"
                        href="{{ route('admin.patient_request') }}"><span>Patient Request</span></a>
                </li>
                <li class="nav-item"><a class="nav-link fw-bold"
                        href="{{ route('admin.suburb_favourite') }}"><span>Nurse Favourite
                            Suburbs</span></a></li>
            </ul>
        </div>
    </div>


<form action="{{ route('nurse.testlog.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="row align-items-center justify-content-center py-2">
            <div class="col-md-8 col-lg-6 col-xl-8">
                <div class="form-group row mb-1">
                    <div class="row">
                        <div class="position-relative has-icon-left col-md-12">
                            <div class="form-group">
                                <label class="col-form-label">Nurse <span class="text-danger">*</span></label>
                                <div class="cal-icon">
                                    <select id="nurse_id" class="form-select bg-gray-100 border-2 w-full" name="nurse_id">
                                        <option selected selected>Select Nurse</option>
                                        @foreach ($nurses as $nurse)
                                            <option value="{{ $nurse->id }}">{{ $nurse->nurses->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="form-control-icon">
                                        <i class="bi bi-person"></i>
                                    </div>
                                </div>

                                @error('log_date')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 mb-3">
                            <h4 class="m-b-10"><strong>Assign Time </strong></h4>
                            <div class="form-group row mb-1">
                                <div class="row">
                                    <div class="position-relative has-icon-left col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Date <span
                                                    class="text-danger">*</span></label>
                                            <div class="cal-icon">
                                                <input name="log_date" type="text"
                                                    class="form-control datetimepicker bg-gray-100 border-2 w-full @error('log_date') is-invalid @enderror
                                            mb-3"
                                                    id="log_date" aria-describedby="log_date"
                                                    value="{{ old('log_date') }}" placeholder="Test Date">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-calendar-event"></i>
                                                </div>
                                            </div>

                                            @error('log_date')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="position-relative has-icon-left col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Time Slot <span
                                                    class="text-danger">*</span></label>
                                            <div class="cal-icon">
                                                <select class="form-select bg-gray-100 border-2 w-full" name="log_time">
                                                    <option selected disabled selected> --:-- </option>
                                                    <option value="06:00 AM - 08:00 AM">06:00 AM - 08:00 AM</option>
                                                                    <option value="08:00 AM - 10:00 AM">08:00 AM - 10:00 AM</option>
                                                                    <option value="10:00 AM - 12:00 PM">10:00 AM - 12:00 PM</option>
                                                                    <option value="12:00 PM - 14:00 PM">12:00 PM - 14:00 PM</option>
                                                                    <option value="14:00 PM - 16:00 PM">14:00 PM - 16:00 PM</option>
                                                                    <option value="16:00 PM - 18:00 PM">16:00 PM - 18:00 PM</option>
                                                                    <option value="18:00 PM - 20:00 PM">18:00 PM - 20:00 PM</option>
                                                </select>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-clock-fill"></i>
                                                </div>
                                            </div>

                                            @error('log_time')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    </div> --}}
                                    <input hidden type="text" class="form-control" id="status" name="status"
                                        value="Scheduled">
                                    <input hidden type="text" class="form-control" id="request_id" name="request_id"
                                        value="@isset($request_log) {{ $request_log->id }} @endisset">
                                    <input hidden type="text" class="form-control" id="nurse_id" name="nurse_id"
                                        value="{{ Auth::user()->id }}">
                                    <input hidden type="text" class="form-control" id="email" name="email"
                                        value="{{ $request_log->user->email }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-3">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
