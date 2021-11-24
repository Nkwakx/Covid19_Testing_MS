@extends('layouts.emp')

@section('content')
    <div class="content">
        <div class="row mb-2">
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="dash-widget">
                    <span class="dash-widget-icon"><i class="fa fa-stethoscope" aria-hidden="true"></i></span>
                    <div class="dash-widget-info text-right">
                        <h3 class="fw-bold">{{ $pendingRequests }}</h3>
                        <span class="widget-title2">Request Pending <i class="fa fa-check" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="dash-widget">
                    <span class="dash-widget-icon"><i class="fa fa-user-o"></i></span>
                    <div class="dash-widget-info text-right">
                        <h3 class="fw-bold">{{ $totalKit }}</h3>
                        <span class="widget-title2">Today's Tool Kit Number<i class="fa fa-check"
                                aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="dash-widget">
                    <span class="dash-widget-icon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                    <div class="dash-widget-info text-right">
                        <h3 class="fw-bold">{{ $count_acceptedR }}</h3>
                        <span class="widget-title2">Total Appointment <i class="fa fa-check"
                                aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="dash-widget">
                    <span class="dash-widget-icon"><i class="fa fa-calendar-check-o" aria-hidden="true"></i></span>
                    <div class="dash-widget-info text-right">
                        <h3 class="fw-bold">{{ $count_todayApt }}</h3>
                        <span class="widget-title2">Today's Appointment <i class="fa fa-check"
                                aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-box col-md-12">
            <h5 class="card-title fw-bolder">Test Requested List</h5>
            <ul class="nav nav-tabs nav-tabs-top nav-justified">
                <li class="nav-item"><a class="nav-link active" href="#top-justified-tab1" data-toggle="tab">All</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="#top-justified-tab2" data-toggle="tab">Favourite
                    Suburb</a></li>
                    <li class="nav-item"><a class="nav-link" href="#top-justified-tab3" data-toggle="tab">Log
                            Schedule</a>
                    </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane  show active" id="top-justified-tab1">
                    <div class="wrapper req-index card-div-2 panel-group" id="accordion" role="tablist"
                        aria-multiselectable="true">
                        @forelse ($requests as $index => $request)
                            <tr>
                                <div class="req-item">
                                    <div class="dash-card-container">
                                        <a class="dash-card" data-toggle="collapse" data-parent="#accordion"
                                            href="#collapse-{{ $index }}" aria-expanded="true"
                                            aria-controls="collapse">

                                            <div class="dash-card-icon">
                                                @if ($request->status == 'New')
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-chevron-right" width="44"
                                                        height="44" viewBox="0 0 24 24" stroke-width="1.5"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <polyline points="9 6 15 12 9 18" />
                                                    </svg>
                                                @else
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-check" width="44" height="44"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M5 12l5 5l10 -10" />
                                                    </svg>
                                                @endif
                                            </div>

                                        </a>
                                        <div class="dash-card-content">
                                            <p>
                                                {{ $request->user->name }} {{ $request->user->surname }} - at
                                                (
                                                {{ $request->addressLine1 }}
                                                {{ $request->addressLine2 }},
                                                {{ $request->suburb->suburb_name ?? 'No Address Found' }}
                                                )____
                                            <p class="fw-bolder text-small">Requested
                                                ({{ $request->created_at->diffForHumans() }})</p>
                                            </p>
                                        </div>
                                        <div class="dash-card-avatars">
                                            @if ($request->status == 'New')
                                                <form action="{{ route('nurse.nurses.update', $request->id) }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @method('PATCH')
                                                    @csrf
                                                    <input type="text" name="status" value="Scheduled" hidden>
                                                    <input type="text" name="number_of_patient" value="1" hidden>
                                                    <input type="text" name="nurse_id" value="{{ Auth::user()->id }}"
                                                        hidden>
                                                    <button type="submit" class="btn btn-do"
                                                        title="Accept test request">&check; Pick</button>
                                                </form>

                                            @else
                                                <form method="POST"
                                                    action="{{ route('nurse.nurses.update', $request->id) }}">
                                                    @method('PATCH')
                                                    @csrf
                                                    <input type="text" name="status" value="New" hidden>
                                                    <button type="submit" class="btn btn-undo"
                                                        title="Undo">&#8630;</button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>

                                    <div id="collapse-{{ $index }}" class="panel-collapse collapse" role="tabpanel"
                                        aria-labelledby="heading2">
                                        <div class="panel-body px-3 py-3 mb-2">
                                            <div class="row">
                                                {{-- @if (is_array($request->dependents) || is_object($request->dependents))
                                                    @foreach ($request->dependents as $testS)
                                                        <h6>Full Name_({{ $testS->name }} {{ $testS->surname }}),
                                                            Contact Number_({{ $testS->phone }})</h6>
                                                    @endforeach
                                                @endif --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>

                        @empty
                            <div class="req-item py-3 fw-bolder">No Pending Request Found</div>
                        @endforelse
                        <span>{{ $requests }}</span>
                    </div>
                </div>
                <div class="tab-pane" id="top-justified-tab2">
                    <div class="wrapper req-index card-div-2 panel-group" id="accordion" role="tablist"
                        aria-multiselectable="true">
                        @forelse ($requests as $index => $request)
                            <div class="req-item">
                                <div class="dash-card-container">
                                    <a class="dash-card" data-toggle="collapse" data-parent="#accordion"
                                        href="#collapse-{{ $index }}" aria-expanded="true" aria-controls="collapse">

                                        <div class="dash-card-icon">
                                            @if ($request->status == 'New')
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-chevron-right" width="44"
                                                    height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <polyline points="9 6 15 12 9 18" />
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-check" width="44" height="44"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M5 12l5 5l10 -10" />
                                                </svg>
                                            @endif
                                        </div>

                                    </a>
                                    <div class="dash-card-content">
                                        <p>
                                            {{ $request->user->name }} {{ $request->user->surname }} - at
                                            (
                                            {{ $request->addressLine1 }}
                                            {{ $request->addressLine2 }},
                                            {{ $request->suburb->suburb_name ?? 'No Address Found' }}
                                            )____
                                        <p class="fw-bolder text-small">Requested
                                            ({{ $request->created_at->diffForHumans() }})</p>
                                        </p>
                                    </div>

                                    <div class="dash-card-avatars">
                                        @if ($request->status == 'New')
                                            <form action="{{ route('nurse.nurses.update', $request->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @method('PATCH')
                                                @csrf
                                                <input type="text" name="status" value="Scheduled" hidden>
                                                <input type="text" name="number_of_patient" value="1" hidden>
                                                <button type="submit" class="btn btn-do"
                                                    title="Accept test request">&check; Pick</button>
                                            </form>
                                        @else
                                            <form method="POST"
                                                action="{{ route('nurse.nurses.update', $request->id) }}">
                                                @method('PATCH')
                                                @csrf
                                                <input type="text" name="status" value="New" hidden>
                                                <button type="submit" class="btn btn-undo" title="Undo">&#8630;</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>

                                <div id="collapse-{{ $index }}" class="panel-collapse collapse" role="tabpanel"
                                    aria-labelledby="heading2">
                                    <div class="panel-body px-3 py-3 mb-2">
                                        <div class="row">
                                            {{-- @if (is_array($request->dependents) || is_object($request->dependents))
                                                @foreach ($request->dependents as $testS)
                                                    <h6>Full Name_({{ $testS->name }} {{ $testS->surname }}), Contact
                                                        Number_({{ $testS->phone }})</h6>
                                                @endforeach
                                            @endif --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="req-item py-3 fw-bolder">No Pending Request Found</div>
                        @endforelse
                        <span>{{ $requests }}</span>
                    </div>

                </div>
                <div class="tab-pane" id="top-justified-tab3">
                    <div class="row">
                        <div class="col-md-12 table-rep-plugin">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="datatable-buttons"
                                    class="table table-striped custom-table datatable dt-responsive nowrap table-wrapper-scroll-y my-custom-scrollbar">
                                    <thead>
                                        <tr>
                                            <th>Week Days</th>
                                            <th>6:00 - 8:00</th>
                                            <th>8:00 - 10:00</th>
                                            <th>10:00 - 12:00</th>
                                            <th>12:00 - 14:00</th>
                                            <th>14:00 - 16:00</th>
                                            <th>16:00 - 18:00</th>
                                            <th>18:00 - 20:00</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($test_logs as $log)
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        @if ($log->log_date->isToday())
                                                            <p>Today</p>
                                                        @elseif($log->log_date->isTomorrow())
                                                            <p>Tomorrow</p>
                                                        @elseif($log->log_date->isYesterday())
                                                            <p>Yesterday</p>
                                                        @else
                                                            {{ $log->log_date->toFormattedDateString() }}
                                                        @endif
                                                    </h2>
                                                </td>
                                                <td>
                                                    <div class="user-add-shedule-list">
                                                        @if ($log->log_time == '06:00 AM - 08:00 AM')
                                                            <h2>
                                                                <form
                                                                    action="{{ route('nurse.testlog.update', $log->id) }}"
                                                                    method="POST">
                                                                    @method('PATCH')
                                                                    @csrf
                                                                    <button type="submit" style="border:2px dashed #1eb53a">
                                                                        <span class="username-info m-b-10">Accepted
                                                                            ({{ $log->created_at->diffForHumans() }})</br>
                                                                            {{ $log->log_time }}</span>
                                                                        <span
                                                                            class="userrole-info">{{ $log->testRequest->addressLine1 }},
                                                                            {{ $log->testRequest->addressLine2 }}</br>{{ $log->testRequest->suburb->suburb_name ?? 'No Address Found' }}</span>
                                                                        <input type="text" name="status" value="Performed"
                                                                            hidden>
                                                                    </button>
                                                                </form>
                                                            </h2>
                                                        @else
                                                            <div class="user-add-shedule-list">
                                                                <a href="#" data-toggle="modal" data-target="#add_schedule">
                                                                    <span><i class="fa fa-plus"></i></span>
                                                                </a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="user-add-shedule-list">
                                                        @if ($log->log_time == '08:00 AM - 10:00 AM')
                                                            <h2>
                                                                <form
                                                                    action="{{ route('nurse.testlog.update', $log->id) }}"
                                                                    method="POST">
                                                                    @method('PATCH')
                                                                    @csrf
                                                                    <button type="submit" style="border:2px dashed #1eb53a">
                                                                        <span class="username-info m-b-10">Accepted
                                                                            ({{ $log->created_at->diffForHumans() }})</br>
                                                                            {{ $log->log_time }}</span>
                                                                        <span
                                                                            class="userrole-info">{{ $log->testRequest->addressLine1 }},
                                                                            {{ $log->testRequest->addressLine2 }}</br>{{ $log->testRequest->suburb->suburb_name ?? 'No Address Found' }}</span>
                                                                        <input type="text" name="status" value="Performed"
                                                                            hidden>
                                                                    </button>
                                                                </form>
                                                            </h2>
                                                        @else
                                                            <div class="user-add-shedule-list">
                                                                <a href="#" data-toggle="modal" data-target="#add_schedule">
                                                                    <span><i class="fa fa-plus"></i></span>
                                                                </a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="user-add-shedule-list">
                                                        @if ($log->log_time == '10:00 AM - 12:00 PM')
                                                            <h2>
                                                                <form
                                                                    action="{{ route('nurse.testlog.update', $log->id) }}"
                                                                    method="POST">
                                                                    @method('PATCH')
                                                                    @csrf
                                                                    <button type="submit" style="border:2px dashed #1eb53a">
                                                                        <span class="username-info m-b-10">Accepted
                                                                            ({{ $log->created_at->diffForHumans() }})</br>
                                                                            {{ $log->log_time }}</span>
                                                                        <span
                                                                            class="userrole-info">{{ $log->testRequest->addressLine1 }},
                                                                            {{ $log->testRequest->addressLine2 }}</br>{{ $log->testRequest->suburb->suburb_name ?? 'No Address Found' }}</span>
                                                                        <input type="text" name="status" value="Performed"
                                                                            hidden>
                                                                    </button>
                                                                </form>
                                                            </h2>
                                                        @else
                                                            <div class="user-add-shedule-list">
                                                                <a href="#" data-toggle="modal" data-target="#add_schedule">
                                                                    <span><i class="fa fa-plus"></i></span>
                                                                </a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="user-add-shedule-list">
                                                        @if ($log->log_time == '12:00 PM - 14:00 PM')
                                                            <h2>
                                                                <form
                                                                action="{{ route('nurse.testlog.update', $log->id) }}"
                                                                method="POST">
                                                                @method('PATCH')
                                                                @csrf
                                                                <button type="submit" style="border:2px dashed #1eb53a">
                                                                    <span class="username-info m-b-10">Accepted
                                                                        ({{ $log->created_at->diffForHumans() }})</br>
                                                                        {{ $log->log_time }}</span>
                                                                    <span
                                                                        class="userrole-info">{{ $log->testRequest->addressLine1 }},
                                                                        {{ $log->testRequest->addressLine2 }}</br>{{ $log->testRequest->suburb->suburb_name ?? 'No Address Found' }}</span>
                                                                    <input type="text" name="status" value="Performed"
                                                                        hidden>
                                                                </button>
                                                            </form>
                                                            </h2>
                                                        @else
                                                            <div class="user-add-shedule-list">
                                                                <a href="#" data-toggle="modal" data-target="#add_schedule">
                                                                    <span><i class="fa fa-plus"></i></span>
                                                                </a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="user-add-shedule-list">
                                                        @if ($log->log_time == '14:00 PM - 16:00 PM')
                                                            <h2>
                                                                <form
                                                                action="{{ route('nurse.testlog.update', $log->id) }}"
                                                                method="POST">
                                                                @method('PATCH')
                                                                @csrf
                                                                <button type="submit" style="border:2px dashed #1eb53a">
                                                                    <span class="username-info m-b-10">Accepted
                                                                        ({{ $log->created_at->diffForHumans() }})</br>
                                                                        {{ $log->log_time }}</span>
                                                                    <span
                                                                        class="userrole-info">{{ $log->testRequest->addressLine1 }},
                                                                        {{ $log->testRequest->addressLine2 }}</br>{{ $log->testRequest->suburb->suburb_name ?? 'No Address Found' }}</span>
                                                                    <input type="text" name="status" value="Performed"
                                                                        hidden>
                                                                </button>
                                                            </form>
                                                            </h2>
                                                        @else
                                                            <div class="user-add-shedule-list">
                                                                <a href="#" data-toggle="modal" data-target="#add_schedule">
                                                                    <span><i class="fa fa-plus"></i></span>
                                                                </a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="user-add-shedule-list">
                                                        @if ($log->log_time == '16:00 PM - 18:00 PM')
                                                            <h2>
                                                                <form
                                                                action="{{ route('nurse.testlog.update', $log->id) }}"
                                                                method="POST">
                                                                @method('PATCH')
                                                                @csrf
                                                                <button type="submit" style="border:2px dashed #1eb53a">
                                                                    <span class="username-info m-b-10">Accepted
                                                                        ({{ $log->created_at->diffForHumans() }})</br>
                                                                        {{ $log->log_time }}</span>
                                                                    <span
                                                                        class="userrole-info">{{ $log->testRequest->addressLine1 }},
                                                                        {{ $log->testRequest->addressLine2 }}</br>{{ $log->testRequest->suburb->suburb_name ?? 'No Address Found' }}</span>
                                                                    <input type="text" name="status" value="Performed"
                                                                        hidden>
                                                                </button>
                                                            </form>
                                                            </h2>
                                                        @else
                                                            <div class="user-add-shedule-list">
                                                                <a href="#" data-toggle="modal" data-target="#add_schedule">
                                                                    <span><i class="fa fa-plus"></i></span>
                                                                </a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="user-add-shedule-list">
                                                        @if ($log->log_time == '18:00 PM - 20:00 PM')
                                                            <h2>
                                                                <form
                                                                action="{{ route('nurse.testlog.update', $log->id) }}"
                                                                method="POST">
                                                                @method('PATCH')
                                                                @csrf
                                                                <button type="submit" style="border:2px dashed #1eb53a">
                                                                    <span class="username-info m-b-10">Accepted
                                                                        ({{ $log->created_at->diffForHumans() }})</br>
                                                                        {{ $log->log_time }}</span>
                                                                    <span
                                                                        class="userrole-info">{{ $log->testRequest->addressLine1 }},
                                                                        {{ $log->testRequest->addressLine2 }}</br>{{ $log->testRequest->suburb->suburb_name ?? 'No Address Found' }}</span>
                                                                    <input type="text" name="status" value="Performed"
                                                                        hidden>
                                                                </button>
                                                            </form>
                                                            </h2>
                                                        @else
                                                            <div class="user-add-shedule-list">
                                                                <a href="#" data-toggle="modal" data-target="#add_schedule">
                                                                    <span><i class="fa fa-plus"></i></span>
                                                                </a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </td>

                                            </tr>
                                        @empty
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="profile.html">
                                                            <span></span></a>
                                                    </h2>
                                                </td>
                                                <td>
                                                    <div class="user-add-shedule-list">
                                                        <div class="user-add-shedule-list">
                                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                                                <span><i class="fa fa-plus"></i></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="user-add-shedule-list">
                                                        <div class="user-add-shedule-list">
                                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                                                <span><i class="fa fa-plus"></i></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="user-add-shedule-list">
                                                        <div class="user-add-shedule-list">
                                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                                                <span><i class="fa fa-plus"></i></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="user-add-shedule-list">
                                                        <div class="user-add-shedule-list">
                                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                                                <span><i class="fa fa-plus"></i></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="user-add-shedule-list">
                                                        <div class="user-add-shedule-list">
                                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                                                <span><i class="fa fa-plus"></i></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="user-add-shedule-list">
                                                        <div class="user-add-shedule-list">
                                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                                                <span><i class="fa fa-plus"></i></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="user-add-shedule-list">
                                                        <div class="user-add-shedule-list">
                                                            <a href="#" data-toggle="modal" data-target="#add_schedule">
                                                                <span><i class="fa fa-plus"></i></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('user.profile_edit')
    @include('nurse.partials._addSchedule')

    <script>
        $(document).ready(function() {
            $('#datatable-buttons').DataTable({
                "scrollY": "50vh",
                "scrollCollapse": true,
            });
            $('.dataTables_length').addClass('bs-select');
        });
    </script>
@endsection
