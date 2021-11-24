<div class="row align-items-center justify-content-center">
    <div class="col-md-8 col-lg-6 col-xl-8">
        <form wire:submit.prevent="register">

            {{-- STEP 1 --}}

            @if ($currentStep == 1)

                <div class="step-one">
                    <div class="card">
                        <div class="card-header bg-secondary text-white">STEP 1/3 - Personal Details</div>
                        <div class="card-body">
                            <div class="row py-1">
                                <div class="row">
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">First Name</label>
                                        <div class="position-relative has-icon-left">
                                            <input name="name" type="text"
                                                class="form-control bg-gray-100 border-2 w-full @error('name') is-invalid @enderror"
                                                id="first_name" aria-describedby="name" value="{{ old('name') }}"
                                                placeholder="Please enter your first name" wire:model="name">
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
                                                id="surname" aria-describedby="surname" value="{{ old('surname') }}"
                                                placeholder="Please enter your surname" wire:model="surname">
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

                                <div class="row">
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="display-block">Gender :</label>
                                    
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input bg-gray-100 border-2 w-full @error('gender') is-invalid @enderror" type="radio"
                                                    name="gender" id="gender" value="Male" wire:model="gender">
                                                <label class="form-check-label" for="gender">
                                                    Male
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input bg-gray-100 border-2 w-full @error('gender') is-invalid @enderror" type="radio"
                                                    name="gender" id="gender" value="Female" wire:model="gender">
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
                                                <input name="
                                                idNo" type="text"
                                                    class="form-control bg-gray-100 border-2 w-full @error('idNo') is-invalid @enderror"
                                                    id="idNo" aria-describedby="idNo" value="{{ old('idNo') }}"
                                                    placeholder="Please enter you ID number" wire:model="idNo">
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
                                    <div class="form-group mb-3">
                                        <label class="form-label">Email Address</label>
                                        <div class="position-relative has-icon-left">
                                            <input name="email" type="email"
                                                class="form-control bg-gray-100 border-2 w-full @error('email') is-invalid @enderror"
                                                id="email" aria-describedby="email" value="{{ old('email') }}"
                                                placeholder="Please your email address" wire:model="email">
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
                                </div>
                                <div class="row">
                                    <div class="form-groupcol col-md-6 mb-2">
                                        <label class="form-label">Password</label>
                                        <div class="position-relative has-icon-left mb-3">
                                            <input name="password" type="password"
                                                class="form-control bg-gray-100 border-2 w-full @error('password') is-invalid @enderror"
                                                id="password" aria-describedby="password" value="{{ old('password') }}"
                                                placeholder="Password" wire:model="password">
                                            <div class="form-control-icon">
                                                <i class="bi bi-shield-lock"></i>
                                            </div>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-groupcol col-md-6 mb-2">
                                        <label class="form-label">Repeat Password</label>
                                        <div class="position-relative has-icon-left">
                                            <input name="password_confirmation" type="password"
                                                class="form-control bg-gray-100 border-2 w-full @error('password_confirmation') is-invalid @enderror"
                                                id="password_confirmation" aria-describedby="password_confirmation"
                                                value="{{ old('password_confirmation') }}" placeholder="Repeat password"
                                                wire:model="password_confirmation">
                                            <div class="form-control-icon">
                                                <i class="bi bi-shield-check"></i>
                                            </div>
                                            @error('password_confirmation')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-groupcol col-md-6">
                                        <label class="form-label">Security Question</label>
                                        <div class="position-relative has-icon-left">
                                            <select name="security_question_id"
                                                class="form-select bg-gray-100 border-2 w-full @error('security_question_id') is-invalid @enderror"
                                                wire:model="security_question_id">
                                                <option selected disabled selected>Choose question</option>
                                                @foreach ($securityQuestions as $ques)
                                                    <option value="{{ $ques->id }}">{{ $ques->question }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="form-control-icon">
                                                <i class="bi bi-file-earmark-lock"></i>
                                            </div>
                                            @error('security_question_id')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-groupcol col-md-6">
                                        <label class="form-label">Answer</label>
                                        <div class="position-relative has-icon-left mb-3">
                                            <input name="security_answer" type="text"
                                                class="form-control bg-gray-100 border-2 w-full @error('security_answer') is-invalid @enderror"
                                                id="security_answer" aria-describedby="security_answer"
                                                value="{{ old('security_answer') }}" placeholder="Answer"
                                                wire:model="security_answer">
                                            <div class="form-control-icon">
                                                <i class="bi bi-key"></i>
                                            </div>
                                            @error('security_answer')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                                @if ($currentStep == 1)
                                    <div></div>
                                @endif

                                @if ($currentStep == 2 || $currentStep == 3)
                                    <button type="button" class="btn btn-secondary btn-block btn-lg shadow-lg mt-3"
                                        wire:click="decreaseStep()">Previous</button>
                                @endif

                                @if ($currentStep == 1 || $currentStep == 2)
                                    <button type="button" class="btn btn-primary btn-block btn-lg shadow-lg mt-3"
                                        wire:click="increaseStep()">Next</button>
                                @endif

                                @if ($currentStep == 3)
                                    <button type="submit"
                                        class="btn btn-primary btn-block btn-lg shadow-lg mt-3">Submit</button>
                                @endif

                            </div>
                        </div>

                    </div>
                </div>

            @endif

            {{-- STEP 2 --}}

            @if ($currentStep == 2)


                <div class="step-two">
                    <div class="card">
                        <div class="card-header bg-secondary text-white">STEP 2/3 - Contacts & Address</div>
                        <div class="card-body">
                            <div class="row py-3">
                                <div class="row">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Phone Number</label>
                                        <div class="position-relative has-icon-left">
                                            <input name="phone" type="text"
                                                class="form-control bg-gray-100 border-2 w-full @error('phone') is-invalid @enderror"
                                                id="phone" aria-describedby="phone" value="{{ old('phone') }}"
                                                placeholder="please enter your cell number" wire:model="phone">
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
                                                value="{{ old('addressLine1') }}"
                                                placeholder="Address line 1 - House number" wire:model="addressLine1">
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
                                                value="{{ old('addressLine2') }}"
                                                placeholder="Address line 2 - Street number && name"
                                                wire:model="addressLine2">
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
                                            <select name="suburb_id" class="form-select bg-gray-100 border-2 w-full @error('suburb_id') is-invalid @enderror"
                                                wire:model="suburb_id">
                                                @foreach ($suburbs as $suburb)
                                                    <option value="{{ $suburb->id }}">{{ $suburb->suburb_name }}
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
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                                @if ($currentStep == 1)
                                    <div></div>
                                @endif

                                @if ($currentStep == 2 || $currentStep == 3)
                                    <button type="button" class="btn btn-secondary btn-block btn-lg shadow-lg mt-3"
                                        wire:click="decreaseStep()">Previous</button>
                                @endif

                                @if ($currentStep == 1 || $currentStep == 2)
                                    <button type="button" class="btn btn-primary btn-block btn-lg shadow-lg mt-3"
                                        wire:click="increaseStep()">Next</button>
                                @endif

                                @if ($currentStep == 3)
                                    <button type="submit"
                                        class="btn btn-primary btn-block btn-lg shadow-lg mt-3">Submit</button>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>

            @endif
            {{-- STEP 3 --}}

            @if ($currentStep == 3)


                <div class="step-three">
                    <div class="card">
                        <div class="card-header bg-secondary text-white">STEP 3/3 - Medical Aid</div>
                        <div class="card-body">
                            <div class="row py-3">
                                <div class="form-group">
                                    <div class="form-group row mb-3">
                                        <label class="form-label col-md-3">How are you going to pay ?</label>
                                        <div class="col-md-9">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="pay_question" id="Medquestion"
                                                    value="Medical Aid">
                                                <label class="form-check-label" for="pay_question">
                                                    Medical Aid
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="pay_question" id="NonMedquestion"
                                                    value="Private">
                                                <label class="form-check-label" for="pay_question">
                                                    Non-Medical Aid
                                                </label>
                                            </div>
                                            @error('pay_question')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div id="dvMedical" style="display:none">
                                    <div class="form-group">
                                        <div class="form-group row mb-3">
                                            <label class="form-label col-md-3">Medical Aid</label>
                                            <div class="col-md-9">
                                                <input name="medicalAid_No" type="text"
                                                    class="form-control mb-3 @error('medicalAid_No') is-invalid @enderror"
                                                    id="medicalAid_No" aria-describedby="medicalAid_No" value="{{ old('medicalAid_No') }}"
                                                    placeholder="Medical Aid Number">
                                               
                                                @error('medicalAid_No')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="form-label col-md-3">Fund</label>
                                        <div class="col-lg-9">
                                            <div class="row">
                                                <div class="position-relative has-icon-left col-md-6">
                                                    <select name="medical_aid_scheme_id" class="form-select">
                                                        <option selected disabled selected>Choose medical scheme</option>
                                                        @foreach ($medAidSchemes as $medicalAidScheme)
                                                            <option value="{{ $medicalAidScheme->id }}">{{ $medicalAidScheme->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('medical_aid_scheme_id')
                                                        <span class="invalid-feedback" role="alert">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="position-relative has-icon-left col-md-6">
                                                    <select name="medical_aid_plans_id" class="form-select">
                                                        <option selected disabled selected>Choose medical plan</option>
                                                        @foreach ($pricePlan as $medicalAidPlan)
                                                            <option value="{{ $medicalAidPlan->id }}">{{ $medicalAidPlan->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('medical_aid_plans_id')
                                                        <span class="invalid-feedback" role="alert">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>


                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                                @if ($currentStep == 1)
                                    <div></div>
                                @endif

                                @if ($currentStep == 2 || $currentStep == 3)
                                    <button type="button" class="btn btn-secondary btn-block btn-lg shadow-lg mt-3"
                                        wire:click="decreaseStep()">Previous</button>
                                @endif

                                @if ($currentStep == 1 || $currentStep == 2)
                                    <button type="button" class="btn btn-success btn-block btn-lg shadow-lg mt-3"
                                        wire:click="increaseStep()">Next</button>
                                @endif

                                @if ($currentStep == 3)
                                    <button type="submit"
                                        class="btn btn-primary btn-block btn-lg shadow-lg mt-3">Submit</button>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </form>
    </div>
</div>
