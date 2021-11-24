@extends('layouts.emp')

@section('content')

    <form action="{{ route('nurse.nurses.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <h4 class="text-center fw-bolder">Request Confirmation</h4>
                        <div class="row mb-2">
                            <div class="col-sm-6 m-b-20">
                                <img src="assets/img/logo-dark.png" class="inv-logo" alt="">
                                <ul class="list-unstyled mb-0">
                                    <li class="text-uppercase fw-bolder mb-0">Address</li>
                                    <li>@isset($request_log) {{ $request_log->addressLine1 }}@endisset,
                                            @isset($request_log) {{ $request_log->addressLine2 }} @endisset</li>
                                        <li>@isset($request_log)
                                                {{ $request_log->suburb->suburb_name ?? 'No Suburb' }}@endisset,
                                                @isset($request_log) {{ $request_log->suburb->Postal_Code }}@endisset</li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-6 m-b-20">
                                            <div class="invoice-details">
                                                <ul class="list-unstyled">
                                                    <li class="text-uppercase fw-bolder mb-0">Requestor</li>
                                                    <li>{{ $request_log->user->main_members->name }}
                                                        <span>{{ $request_log->user->main_members->surname }}</span>
                                                    </li>
                                                    <li>{{ $request_log->user->email }}</li>
                                                    <li>{{ $request_log->user->main_members->phone }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 m-b-20">
                                            <ul class="list-unstyled">
                                                <li class="text-uppercase fw-bolder mb-0">Number of patients</li>
                                                <li><span>{{ $request_log->number_of_patient }}</span></li>
                                            </ul>
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
                                                                    class="form-control datetimepicker bg-gray-100 border-2 w-full
                                                                    @error('log_date') is-invalid @enderror mb-3"
                                                                    id="log_date" aria-describedby="log_date"
                                                                    value="{{ old('log_date') }}" placeholder="Test Date">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-calendar-event"></i>
                                                                </div>
                                                                @error('log_date')
                                                                <span class="invalid-feedback" role="alert">
                                                                    You cannot schedule test for previous day(s) or 48 hrs from today
                                                                </span>
                                                            @enderror
                                                            </div>


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
                                        <button class="btn btn-primary fw-bold" type="submit">CONFIRM</button>
                                        <button class="btn btn-secondary fw-bold" type="button">BACK</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @endsection
