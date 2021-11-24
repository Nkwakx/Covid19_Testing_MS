@extends('layouts.emp')

@section('content')
    <section class="review-section personal-excellence">
        <div class="review-header text-center">
            <h3 class="review-title">Capture Vitals</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table
                        class="table table-bordered review-table mb-0 table-editable table-nowrap align-middle table-edits">
                        <tr>
                            <th>Address</th>
                            <th>Patient</th>
                            <th>Blood <br> Pressure ( B/P )</th>
                            <th>Temperature <br>( T )</th>
                            <th>Oxygen <br>( Levels )</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <table
                            class="table table-bordered review-table mb-0 table-editable table-nowrap align-middle table-edits">
                            <tbody>
                                <tr>
                                    <td>
                                        {{ $log->testRequest->addressLine1 }},<br>
                                        {{ $log->testRequest->addressLine2 }}<br>{{ $log->testRequest->suburb->suburb_name ?? 'No Address Found' }}</span>
                                    </td>
                                    <td>
                                        <form action="{{ route('nurse.testlog.store') }}" enctype="multipart/form-data"
                                            method="POST">
                                            @csrf
                                            <div data-repeater-list="group-a">
                                                <div data-repeater-item class="row">
                                                    <div class="mb-3 col-md-2">
                                                        @foreach ($dependents as $dep)
                                                            @if ($dep->id == $log->testRequest->test_Subject_Id)
                                                                {{ $dep->name }} {{ $dep->surname }}
                                                            @else

                                                            @endif
                                                        @endforeach

                                                        @foreach ($users as $user)
                                                            @if ($user->id == $log->testRequest->test_Subject_Id)
                                                                {{ $user->name }} {{ $user->surname }}
                                                            @else

                                                            @endif
                                                        @endforeach

                                                    </div>
                                                    <div class="mb-3 col-md-3">
                                                        <input type="text" id="name" name="blood_pressure"
                                                            class="form-control  @error('blood_pressure') is-invalid @enderror"
                                                            value="{{ old('blood_pressure') }}" />
                                                        @error('blood_pressure')
                                                            <span class="invalid-feedback" role="alert">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3 col-md-3">
                                                        <input type="text" id="name" name="temperature"
                                                            class="form-control @error('temperature') is-invalid @enderror"
                                                            value="{{ old('temperature') }}" />
                                                        @error('temperature')
                                                            <span class="invalid-feedback" role="alert">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3 col-md-2">
                                                        <input type="text" id="name" name="oxygen_levels"
                                                            class="form-control @error('oxygen_levels') is-invalid @enderror"
                                                            value="{{ old('oxygen_levels') }}" />
                                                        @error('oxygen_levels')
                                                            <span class="invalid-feedback" role="alert">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-auto float-right ml-auto">
                                                        <button type="submit" class="btn btn-primary btn-add-row"><i
                                                                class="fa fa-plus"> Save</i></button>
                                                    </div>
                                                    <input hidden type="text" class="form-control" id="nurse_id"
                                                        name="nurse_id" value="{{ Auth::user()->id }}">
                                                    <input hidden type="text" class="form-control" id="request_id"
                                                        name="request_id" value="{{ $log->request_id }}">
                                                    <input hidden type="text" class="form-control" id="patient_id"
                                                        name="patient_id" value="{{ $log->testRequest->test_Subject_Id }}">
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </section>
@endsection
