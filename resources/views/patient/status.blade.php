@extends('layouts.patient')

@section('content')

    <div class="content">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title">My Request</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table">
                        <thead>
                            <tr>
                                <th>Address</th>
                                <th>Date Requested</th>
                                <th>Time Requested</th>
                                <th>Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($status_request as $status)
                                <tr>
                                    <td>{{ $status->addressLine1 }}
                                        {{ $status->addressLine2 }}
                                        {{ $status->suburb->suburb_name ?? 'No Address' }}
                                    </td>
                                    <td>
                                        @if ($status->created_at->isToday())
                                            <p class="fw-bolder">Today</p>
                                        @elseif( $status->created_at->isTomorrow())
                                            <p class="fw-bolder">Tomorrow</p>
                                        @elseif( $status->created_at->isYesterday())
                                            <p class="fw-bolder">Yesterday</p>
                                        @else
                                            <p class="fw-bolder">{{ $status->created_at->toFormattedDateString() }}</P>
                                        @endif
                                        <p class="fw-bold text-small">Requested
                                            ({{ $status->created_at->diffForHumans() }})
                                    </td>
                                    <td>{{ $status->created_at->toTimeString() }}</td>
                                    <td>
                                        @if ($status->status == 'New')
                                            <span class="custom-badge status-red">{{ $status->status }}</span>
                                        @else
                                            <span class="custom-badge status-green">{{ $status->status }}</span>
                                        @endif
                                    </td>

                                    <td class="text-right">
                                        <form action="{{ route('test_vitals.destroy', $status->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Cancel</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('patient.partials._modalId')
    @include('patient.partials._makeTestRequest')
@endsection
