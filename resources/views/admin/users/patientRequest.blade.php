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

    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-solid nav-justified flex-column">
                        <li class="nav-item"><a class="nav-link active fw-bold" data-toggle="tab" href="#home">Recent
                                Request </a></li>
                        <li class="nav-item"><a class="nav-link fw-bold" data-toggle="tab" href="#menu1">
                                Over Due Time Request</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <div id="home" class="tab-pane show active">
                            <div class="card-box">
                                <div class="table-responsive">
                                    <table class="table table-striped custom-table mb-0 datatable">
                                        <thead>
                                            <tr>
                                                <th>Address Request At</th>
                                                <th class="text-center">Request Time</th>
                                                <th class="text-right">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @forelse ($requests as $request)
                                                <tr>
                                                    @if ($request->created_at->diffForHumans() > 12)
                                                        <td>
                                                            {{ $request->user->name }}
                                                            {{ $request->user->surname }} - at
                                                            (
                                                            {{ $request->addressLine1 }}
                                                            {{ $request->addressLine2 }}
                                                            {{ $request->suburb->suburb_name ?? 'No Address' }})

                                                        </td>
                                                        <td class="text-center">
                                                            <div class="action-label">
                                                                <a class="btn btn-white btn-sm btn-rounded" href="#">
                                                                    <i class="fa fa-dot-circle-o text-success"></i>
                                                                    <span class="float-right text-sm text-muted">
                                                                        <span
                                                                            class="badge bg-inverse-info">{{ $request->created_at->diffForHumans() }}</span>
                                                                    </span>
                                                                </a>
                                                            </div>
                                                        </td>
                                                        <td class="text-right">
                                                            <div class="dropdown dropdown-action">
                                                                <a href="#" class="action-icon dropdown-toggle"
                                                                    data-toggle="dropdown" aria-expanded="false"><i
                                                                        class="fa fa-ellipsis-v"></i></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <form action="{{ route('assign.update', $request->id) }}" method="POST"
                                                                        enctype="multipart/form-data">
                                                                        @method('PATCH')
                                                                        @csrf
                                                                        <input type="text" name="status" value="Approved" hidden>
                                                                        {{-- <button type="submit" class="btn btn-do" title="Accept test request">&check;</button> --}}

                                                                        <button class="dropdown-item" type="submit">&check; Assign</button>
                                                                            <a class="dropdown-item" href="" data-toggle="modal"
                                                                            data-target="#delete_employee"><i
                                                                                class="fa fa-trash-o m-r-5"></i> Reject</a>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    @endif
                                                </tr>
                                            @empty
                                                <div class="req-item py-3 fw-bolder">No Pending Request Found</div>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="menu1" class="tab-pane fade">
                            <div class="card-box">
                                <div class="table-responsive">
                                    <table class="table table-striped custom-table mb-0 datatable">
                                        <thead>
                                            <tr>
                                                <th>Address Request At</th>
                                                <th class="text-center">Request Time</th>
                                                <th class="text-right">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($requests as $request)
                                                <tr>
                                                    @if ($request->created_at->diffForHumans() < 720)
                                                        <td>
                                                            {{ $request->user->name }}
                                                            {{ $request->user->surname }} - at
                                                            (
                                                            {{ $request->addressLine1 }}
                                                            {{ $request->addressLine2 }}
                                                            {{ $request->suburb->suburb_name ?? 'No Address' }})

                                                        </td>
                                                        <td class="text-center">
                                                            <div class="action-label">
                                                                <a class="btn btn-white btn-sm btn-rounded" href="#">
                                                                    <i class="fa fa-dot-circle-o text-danger"></i>
                                                                    <span class="float-right text-sm text-muted">
                                                                        <span
                                                                            class="badge bg-inverse-danger">{{ $request->created_at->diffForHumans() }}</span>
                                                                    </span>
                                                                </a>
                                                            </div>
                                                        </td>
                                                        <td class="text-right">
                                                            <div class="dropdown dropdown-action">
                                                                <a href="#" class="action-icon dropdown-toggle"
                                                                    data-toggle="dropdown" aria-expanded="false"><i
                                                                        class="fa fa-ellipsis-v"></i></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <form action="{{ route('assign.update', $request->id) }}" method="POST"
                                                                        enctype="multipart/form-data">
                                                                        @method('PATCH')
                                                                        @csrf
                                                                        <input type="text" name="status" value="Approved" hidden>
                                                                        {{-- <button type="submit" class="btn btn-do" title="Accept test request">&check;</button> --}}

                                                                        <button class="dropdown-item" type="submit">&check; Assign</button>
                                                                            <a class="dropdown-item" href="" data-toggle="modal"
                                                                            data-target="#delete_employee"><i
                                                                                class="fa fa-trash-o m-r-5"></i> Reject</a>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    @endif
                                                </tr>
                                            @empty
                                                <div class="req-item py-3 fw-bolder">No Pending Request Found</div>
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

    </div>
@endsection
