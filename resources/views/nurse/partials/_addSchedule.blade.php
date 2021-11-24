@csrf

<div class="modal fade" id="add_schedule" role="dialog" tabindex="-1">
    <div class="modal-dialog  modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Add Request To Your My Schedule</h3>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

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
                                        {{-- {{ $request->user->name }} {{ $request->user->surname }} - at --}}
                                        (
                                        {{ $request->addressLine1 }}
                                        {{ $request->addressLine2 }},
                                        {{ $request->suburb->suburb_name ?? 'No Suburb'}}
                                        )
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
                                            <button type="submit" class="btn btn-do" title="Accept test request">&check;</button>
                                        </form>
                                        
                                    @else
                                        <form method="POST" action="{{ route('nurse.nurses.update', $request->id) }}">
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
                                        @if (is_array($request->TestSubject_id) || is_object($request->TestSubject_id))
                                            @foreach ($request->TestSubject_id as $testS)
                                                <h6>{{ $testS }}</h6>
                                            @endforeach
                                        @endif
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
        </div>
    </div>
</div>
