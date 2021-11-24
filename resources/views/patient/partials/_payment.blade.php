<div class="modal fade" id="about_pay" role="dialog" tabindex="-1">
    <div class="modal-dialog  modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Medical Payment</h3>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="familyBody">
                <form method="POST" action="{{ route('user.edit_save', auth()->user()->id) }}">
                    @csrf
                    @method('PATCH')

                    <div class="row">
                        <div class="form-group col-md-6 mb-3">
                            <label class="display-block mb-3">Medical Aid :</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="med_aid_YN" id="Medquestion"
                                    value="Yes">
                                <label class="form-check-label" for="med_aid_YN">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check form-check-inline mb-3">
                                <input class="form-check-input" type="radio" name="med_aid_YN" id="NonMedquestion"
                                    value="No">
                                <label class="form-check-label" for="med_aid_YN">
                                    No
                                </label>
                            </div>
                            @error('med_aid_YN')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label class="display-block mb-3">Person Responsible For Account:</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="person_responsible_for_acc"
                                    id="PMedAcc" value="{{ Auth::user()->id }}">
                                <label class="form-check-label" for="person_responsible_for_acc">
                                    Me
                                </label>
                            </div>
                            <div class="form-check form-check-inline mb-3">
                                <input class="form-check-input" type="radio" name="person_responsible_for_acc"
                                    id="MedAcc" value="Other">
                                <label class="form-check-label" for="person_responsible_for_acc">
                                    Other
                                </label>
                            </div>
                            @error('med_aid_YN')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>
                    </div>
                    <div id="dvMedical" style="display:none">
                        <div class="form-group mb-3">
                            <label class="form-label">Medical Aid Number</label>
                            <div class="position-relative has-icon-left">
                                <input name="med_aid_number" type="text"
                                    class="form-control mb-3"
                                    id="med_aid_number" aria-describedby="med_aid_number"
                                    value="{{ $user->main_members->med_aid_number }}" placeholder="Medical Aid Number">
                                <div class="form-control-icon">
                                    <i class="bi bi-file-medical"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Medical Aid Plan</label>
                            <div class="position-relative has-icon-left">
                                <select name="med_aid_plan_id" class="form-select">
                                    <option selected disabled selected>Choose medical plan</option>
                                    @foreach ($pricePlan as $medicalAidPlan)
                                        <option value="{{ $medicalAidPlan->id }}">{{ $medicalAidPlan->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="form-control-icon">
                                    <i class="bi bi-journal-medical"></i>
                                </div>
                                @error('med_aid_plan_id')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div id="dvAcc" style="display:none">
                        <div class="form-group mb-3">
                            <label class="form-label">Person Responsible Full Name</label>
                            <div class="position-relative has-icon-left mb-3">
                                <input name="namef" type="text"
                                    class="form-control bg-gray-100 border-2 w-full @error('namef') is-invalid @enderror"
                                    id="first_name" aria-describedby="namef"
                                    value="{{ old('namef') }}"
                                placeholder="Please enter your full name">
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                                @error('namef')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="button" data-dismiss="modal"
                                class="btn btn-secondary  btn-block btn-lg shadow-lg mt-3">Back</button>
                            <button type="submit"
                                class="btn btn-primary btn-block btn-lg shadow-lg mt-3">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
