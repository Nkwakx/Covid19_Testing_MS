@extends('layouts.patient')

@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-div d-flex flex-column">
                    <h3 class="font-weight-bold">Select and update the address of the members </h3> <span
                        class="d-block text-center px-3 mb-5">You may group your request as per addresses <br>
                        or if people you requesting for are going to test in seperate addresses then you may make
                        separate
                        request per each group.</span>
                </div>
                <form action="{{ route('testRequest') }}" method="POST">
                    @csrf
                    <div class="mb-3 py-5">
                        <div class="row">
                            <div class="form-check col-md-9 mx-auto">
                                <input hidden type="text" class="form-control" id="requestor_id" name="requestor_id"
                                    value="{{ Auth::user()->id }}">
                                <input hidden type="text" class="form-control" id="status" name="status"
                                    value="New">
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="table-responsive">
                                    <table class="table table-inbox table-hover">
                                        <thead>
                                            <tr>
                                                <th> <a class="avatar" href="profile.html">MAIN</a>
                                                    {{ $name }} {{ $surname }}
                                                </th>
                                                <th> <input class="form-check-input" name="subjectTest[]"
                                                    type="checkbox" value="{{ Auth::user()->id }}"</td></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>

                                            </tr>

                                            @foreach ($dependents as $dependent)
                                                <tr>
                                                    <td>
                                                        <a class="avatar" href="profile.html">FM</a>
                                                        {{ $dependent->name }}
                                                        {{ $dependent->surname }}
                                                    </td>
                                                    <td class="checkmail">
                                                        <input class="form-check-input" name="subjectTest[]" id="{{ $dependent->name }}"
                                                            type="checkbox" value="{{ $dependent->id }}"</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group mb-3">
                                    <input hidden name="number_of_patient" type="text"
                                        class="form-control @error('number_of_patient') is-invalid @enderror mb-3"
                                        id="number_of_patient" aria-describedby="number_of_patient"
                                        value="1"
                                        placeholder="Number of people you requesting for">
                                    @error('number_of_patient')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Address Line 1</label>
                                        <div class="position-relative has-icon-left">
                                            <input name="addressLine1" type="text"
                                                class="form-control bg-gray-100 border-2 w-full @error('addressLine1') is-invalid @enderror"
                                                id="addressLine1" aria-describedby="addressLine1" value="{{ old('addressLine1') }}"
                                                placeholder="Address line 1 - House number">
                                            <div class="form-control-icon">
                                                <i class="bi bi-geo"></i>
                                            </div>
                                            @error('addressLine1')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Address Line 2</label>
                                        <div class="position-relative has-icon-left">
                                            <input name="addressLine2" type="text"
                                                class="form-control bg-gray-100 border-2 w-full @error('addressLine2') is-invalid @enderror"
                                                id="addressLine2" aria-describedby="addressLine1" value="{{ old('addressLine2') }}"
                                                placeholder="Address line 2 - Street number && name">
                                            <div class="form-control-icon">
                                                <i class="bi bi-geo-alt"></i>
                                            </div>
                                            @error('addressLine2')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Select Suburb</label>
                                        <div class="position-relative has-icon-left">
                                            <select id="suburb_id" class="form-select select2 @error('suburb_id') is-invalid @enderror"" name="suburb_id">
                                                <option selected disabled selected>Choose suburb</option>
                                                @foreach ($suburbs as $suburb)
                                                    <option value="{{ $suburb->id }}">{{ $suburb->suburb_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('suburb_id')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-3">Make Request</button>
                        <a href="{{ url('index') }}" class="btn btn-secondary  btn-block btn-lg shadow-lg mt-3">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('patient.partials._makeTestRequest')
@endsection
