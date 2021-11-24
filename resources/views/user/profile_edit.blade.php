<div class="modal fade" id="user_profile" role="dialog" tabindex="-1">
    <div class="modal-dialog  modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Edit</h3>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('nurse.user.edit_saves', auth()->user()->id) }}">
                    @csrf
                    @method('PATCH')


                    <div class="card-box">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row mb-3">
                                    <label class="col-lg-3 col-form-label">Personal Details:</label>
                                    <div class="col-lg-9">
                                        <div class="row">
                                            <div class="position-relative has-icon-left col-md-6 mb-3">
                                                <input name="name" type="name"
                                                    class="form-control bg-gray-100 border-2 w-full @error('name') is-invalid @enderror" id="name"
                                                    aria-describedby="name"
                                                    value="{{ auth()->user()->name }}" placeholder="first name">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person"></i>
                                                    </div>
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>

                                                @enderror
                                            </div>
                                            <div class="position-relative has-icon-left col-md-6 mb-3">
                                                <input name="surname" type="text"
                                                    class="form-control bg-gray-100 border-2 w-full @error('surname') is-invalid @enderror"
                                                    id="surname" aria-describedby="surname"
                                                    value="{{ auth()->user()->surname }}" placeholder="Last name">
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
                                <div class="position-relative has-icon-left row mb-3">
                                    <label class="col-md-3 col-form-label"></label>
                                    <div class="col-md-9">
                                        <input name="idNo" type="text"
                                            class="form-control bg-gray-100 border-2 w-full @error('idNo') is-invalid @enderror" id="idNo"
                                            aria-describedby="idNo" value="{{ auth()->user()->idNo }} @isset($user) {{ $user->idNo }} @endisset"
                                            placeholder="Identity number">
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
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label"></label>
                                    <div class="col-md-9">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input bg-gray-100 border-2 w-full" type="radio" name="gender" id="gender"
                                                value="Male">
                                            <label class="form-check-label" for="gender">
                                                Male
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input bg-gray-100 border-2 w-full" type="radio" name="gender" id="gender"
                                                value="Female">
                                            <label class="form-check-label" for="gender">
                                                Female
                                            </label>
                                        </div>
                                    </div>
                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="position-relative has-icon-left row mb-3">
                                    <label class="col-lg-3 col-form-label"></label>
                                    <div class="col-lg-9">
                                        <input name="phone" type="text"
                                            class="form-control bg-gray-100 border-2 w-full @error('phone') is-invalid @enderror" id="phone"
                                            aria-describedby="phone" value="{{ auth()->user()->phone }} @isset($user) {{ $user->phone }} @endisset"
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
                                <div class="form-group position-relative has-icon-left row mb-5">
                                    <label class="col-lg-3 col-form-label"></label>
                                    <div class="col-lg-9">
                                        <input name="email" type="email"
                                            class="form-control bg-gray-100 border-2 w-full @error('email') is-invalid @enderror" id="email"
                                            aria-describedby="email"
                                            value="{{ auth()->user()->email }} @isset($user) {{ $user->email }} @endisset">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row"></div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Address:</label>
                                    <div class="position-relative has-icon-left col-lg-9">
                                        <input name="addressLine1" type="text"
                                            class="form-control bg-gray-100 border-2 w-full @error('addressLine1') is-invalid @enderror mb-3"
                                            id="addressLine1" aria-describedby="addressLine1"
                                            value="{{ auth()->user()->addressLine1 }}" @isset($user) {{ $user->addressLine1 }} @endisset
                                            placeholder="Address line 1 - House number">
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
                                <div class="position-relative has-icon-left row">
                                    <label class="col-lg-3 col-form-label"></label>
                                    <div class="col-lg-9">
                                        <input name="addressLine2" type="text"
                                            class="form-control bg-gray-100 border-2 w-full @error('addressLine2') is-invalid @enderror mb-3"
                                            id="addressLine2" aria-describedby="addressLine1"
                                            value="{{ auth()->user()->addressLine2 }}" @isset($user) {{ $user->addressLine2 }} @endisset
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
                                <div class="form-group position-relative has-icon-left row mb-3">
                                    <label class="col-lg-3 col-form-label"></label>
                                    <div class="col-lg-9">
                                        <select name="suburb_id" class="form-select bg-gray-100 border-2 w-full">
                                            <option selected disabled selected>Choose suburb</option>
                                            @foreach ($suburbs as $suburb)
                                                <option value="{{ $suburb->id }}" {{ $suburb->id == auth()->user()->id ? 'selected' : '' }}>{{ $suburb->suburb_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="form-control-icon">
                                            <i class="bi bi-geo-fill"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group position-relative has-icon-left row mb-3">
                                    <label class="col-lg-3 col-form-label"></label>
                                    <div class="col-lg-9">
                                        <input name="zipCode" type="text"
                                            class="form-control bg-gray-100 border-2 w-full @error('zipCode') is-invalid @enderror" id="zipCode"
                                            aria-describedby="zipCode" value="{{ auth()->user()->zipCode }}" @isset($user) {{ $user->zipCode }} @endisset
                                            placeholder="Zip-Code">
                                        <div class="form-control-icon">
                                            <i class="bi bi-map"></i>
                                        </div>
                                        @error('zipCode')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
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
