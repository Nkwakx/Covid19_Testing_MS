<div class="modal fade" id="user_profile" role="dialog" tabindex="-1">
    <div class="modal-dialog  modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Update profile</h3>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="familyBody">
                <div>
                    <form method="POST" action="{{ route('user.edit_save', auth()->user()->id) }}">
                        @csrf
                        @method('PATCH')

                        <div class="row">
                            <div class="row">
                                <div class="form-group col-md-6 mb-3">
                                    <label class="form-label">First Name</label>
                                    <div class="position-relative has-icon-left">
                                        <input name="name" type="text"
                                            class="form-control bg-gray-100 border-2 w-full @error('name') is-invalid @enderror"
                                            id="first_name" aria-describedby="name"
                                            value="{{ $user->main_members->name }}"
                                        placeholder="Please enter your first name">
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label class="form-label">Last Name</label>
                                    <div class="position-relative has-icon-left">
                                        <input name="surname" type="text"
                                            class="form-control bg-gray-100 border-2 w-full @error('surname') is-invalid @enderror"
                                            id="surname" aria-describedby="surname" value="{{ $user->main_members->surname }}"
                                            placeholder="Please enter your surname">
                                            <div class="form-control-icon">
                                                <i class="bi bi-person"></i>
                                            </div>
                                            @error('surname')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 mb-3">
                                    <label class="display-block">Gender :</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bg-gray-100 border-2 w-full @error('gender') is-invalid @enderror"
                                            type="radio" name="gender" id="gender" value="Male">
                                        <label class="form-check-label" for="gender">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input bg-gray-100 border-2 w-full @error('gender') is-invalid @enderror"
                                            type="radio" name="gender" id="gender" value="Female">
                                        <label class="form-check-label" for="gender">
                                            Female
                                        </label>
                                    </div>

                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label class="form-label">Identity No.</label>
                                    <div class="position-relative has-icon-left">
                                        <div class="">
                                            <input name="idNo" type="text"
                                                class="form-control bg-gray-100 border-2 w-full @error('idNo') is-invalid @enderror"
                                                id="idNo" aria-describedby="idNo"
                                                value="{{ $user->main_members->idNo }}" @isset($user) {{ $user->idNo }} @endisset
                                                placeholder="Please enter you ID number">
                                            <div class="form-control-icon">
                                                <i class="bi bi-bookmark-check"></i>
                                            </div>
                                            @error('idNo')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 mb-3">
                                    <label class="form-label">Email Address</label>
                                    <div class="position-relative has-icon-left">
                                        <input name="email" type="email"
                                            class="form-control bg-gray-100 border-2 w-full @error('email') is-invalid @enderror"
                                            id="email" aria-describedby="email"
                                            value="{{ auth()->user()->email }}" @isset($user) {{ $user->email }} @endisset
                                            placeholder="Please your email address">
                                        <div class="form-control-icon">
                                            <i class="bi bi-envelope"></i>
                                        </div>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label class="form-label">Phone Number</label>
                                    <div class="position-relative has-icon-left">
                                        <input name="phone" type="text"
                                            class="form-control bg-gray-100 border-2 w-full @error('phone') is-invalid @enderror"
                                            id="phone" aria-describedby="phone"
                                            value="{{ old('phone') }}" @isset($user) {{ $user->main_members->phone }} @endisset
                                            placeholder="Phone number">
                                        <div class="form-control-icon">
                                            <i class="bi bi-telephone"></i>
                                        </div>
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 mb-3">
                                    <label class="form-label">Address Line 1</label>
                                    <div class="position-relative has-icon-left">
                                        <input name="addressLine1" type="text"
                                            class="form-control bg-gray-100 border-2 w-full @error('addressLine1') is-invalid @enderror"
                                            id="addressLine1" aria-describedby="addressLine1"
                                            value="{{ old('addressLine1') }}" @isset($user) {{ $user->main_members->addressLine1 }} @endisset placeholder="Address line 1 - House number">
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
                                            id="addressLine2" aria-describedby="addressLine1"
                                            value="{{ old('addressLine2') }}" @isset($user) {{ $user->main_members->addressLine2 }} @endisset
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
                                        <select id="suburb_id" class="form-select" name="suburb_id">
                                            <option selected disabled selected>Choose suburb</option>
                                            @foreach ($suburbs as $suburb)
                                                <option value="{{ $suburb->id }}{{ $suburb->id == $user->main_members->id ? 'selected' : '' }}" @isset($user) {{ $user->id }} @endisset>{{ $suburb->suburb_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="form-control-icon">
                                            <i class="bi bi-geo-fill"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                        value="{{ old('med_aid_number') }}" @isset($user) {{ $user->main_members->med_aid_number }} @endisset placeholder="Medical Aid Number">
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

                </div>
                <div class="modal-footer">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="button" data-dismiss="modal" class="btn btn-secondary  btn-block btn-lg shadow-lg mt-3">Back</button>
                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-3">Submit</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@if (count($errors) > 0)
    <script>
        $(document).ready(function() {
            $('#user_profile').modal('show');
        });
    </script>
@elseif (count($errors) < 0)
    <script>
        $(document).ready(function() {
            $('#add_family_member').modal('hide');
        });
    </script>
@endif
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
    $(function() {
        $("input[name='med_aid_YN']").click(function() {
            if ($("#Medquestion").is(":checked")) {
                $("#dvMedical").show();
            } else {
                $("#dvMedical").hide();
            }
        });
    });
    $(function() {
        $("input[name='person_responsible_for_acc']").click(function() {
            if ($("#MedAcc").is(":checked")) {
                $("#dvAcc").show();
            } else {
                $("#dvAcc").hide();
            }
        });
    });
</script>
