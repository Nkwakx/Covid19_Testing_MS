@extends('layouts.admin')

@section('content')
    @include('layouts.sidebar.sidebar')

    <div class="row">
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="card-body">
                    <span class="dash-widget-icon"><i class="fa fa-calendar-check-o" aria-hidden="true"></i></span>
                    <div class="dash-widget-info">
                        <h3 class="fw-bold">{{ $count_todayApt }}</h3>
                        <span class="widget-title2">Today's Appointment <i class="fa fa-check"
                                aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="card-body">
                    <span class="dash-widget-icon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                    <div class="dash-widget-info">
                        <h3 class="fw-bold">{{ $count_acceptedR }}</h3>
                        <span class="widget-title2">Total Appointment <i class="fa fa-check"
                                aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="card-body">
                    <span class="dash-widget-icon"><i class="fa fa-stethoscope" aria-hidden="true"></i></span>
                    <div class="dash-widget-info">
                        <h3 class="fw-bold">{{ $pendingRequests }}</h3>
                        <span class="widget-title2">Request Pending <i class="fa fa-check"
                                aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="card-body">
                    <span class="dash-widget-icon"><i class="fa fa-user-o"></i></span>
                    <div class="dash-widget-info">
                        <h3 class="fw-bold">{{ $test_captured }}</h3>
                        <span class="widget-title2">Patients Captured<i class="fa fa-check"
                                aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 text-center d-flex">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <h5 class="card-title fw-bolder">Overview</h5>
                            <canvas id="lineChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <h5 class="card-title text-center fw-bolder">Awaiting Requests</h5>
                            <ul class="list-group">
                                @forelse ($requests as $request)
                                    <li class="list-group-item list-group-item-action">{{ $request->user->name }}
                                        {{ $request->user->surname }} - at
                                        (
                                        {{ $request->addressLine1 }}
                                        {{ $request->addressLine2 }}
                                        {{ $request->suburb->suburb_name ?? 'No Address' }})
                                        @if ($request->created_at->diffForHumans() > 720 )
                                            <span class="float-right text-sm text-muted">
                                                <span
                                                    class="badge bg-inverse-info">{{ $request->created_at->diffForHumans() }}</span>
                                            </span>
                                        @else
                                        <span class="float-right text-sm text-muted">
                                            <span
                                                class="badge bg-inverse-danger">{{ $request->created_at->diffForHumans() }}</span>
                                        </span>
                                        @endif
                                    </li>
                                @empty
                                    <div class="req-item py-3 fw-bolder">No Pending Request Found</div>
                                @endforelse
                            </ul>
                            <span>{{ $requests }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
