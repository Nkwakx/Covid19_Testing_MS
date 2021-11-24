
@csrf
<div class="row align-items-center justify-content-center">
    <div class="col-md-8 col-lg-6 col-xl-8">
        <div class="step-one">
            <div class="card">
                <div class="card-body">
                    <div class="row py-1">
                        <div class="row">
                            <div class="form-group col-md-6 mb-3">
                                <label class="form-label">First Name</label>
                                <div class="position-relative has-icon-left">
                                    <input name="name" type="text"
                                        class="form-control bg-gray-100 border-2 w-full @error('name') is-invalid @enderror"
                                        id="first_name" aria-describedby="name" value="{{ old('name') }}"
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
                                        id="surname" aria-describedby="surname" value="{{ old('surname') }}"
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

                        <div class="row">
                            <div class="form-group col-md-6 mb-3">
                                <label class="display-block">Gender :</label>

                                <div class="form-check form-check-inline">
                                    <input
                                        class="form-check-input bg-gray-100 border-2 w-full @error('gender') is-invalid @enderror"
                                        type="radio" name="gender" id="gender" value="Male">
                                    <label class="form-check-label" for="gender">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input
                                        class="form-check-input bg-gray-100 border-2 w-full @error('gender') is-invalid @enderror"
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
                                        <input name="idNo" type="text" class="form-control bg-gray-100 border-2 w-full @error('idNo') is-invalid @enderror"
                                            id="idNo" aria-describedby="idNo" value="{{ old('idNo') }}"
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
                            <div class="form-group mb-3">
                                <label class="form-label">Email Address</label>
                                <div class="position-relative has-icon-left">
                                    <input name="email" type="email"
                                        class="form-control bg-gray-100 border-2 w-full @error('email') is-invalid @enderror"
                                        id="email" aria-describedby="email" value="{{ old('email') }}"
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
                        </div>
                        <div class="row">
                            <div class="form-groupcol col-md-6 mb-2">
                                <label class="form-label">Password</label>
                                <div class="position-relative has-icon-left mb-3">
                                    <input name="password" type="password"
                                        class="form-control bg-gray-100 border-2 w-full @error('password') is-invalid @enderror"
                                        id="password" aria-describedby="password" value="{{ old('password') }}" placeholder="Password">
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
                                        value="{{ old('password_confirmation') }}" placeholder="Repeat password">
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
                                        value="{{ old('security_question_id') }}">
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
                                        value="{{ old('security_answer') }}" placeholder="Answer">
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
                        <button type="submit"
                        class="btn btn-primary btn-block btn-lg shadow-lg mt-3">Submit</button>
                    <a href="{{ '/' }}"
                        class="btn btn-secondary  btn-block btn-lg shadow-lg mt-3">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>