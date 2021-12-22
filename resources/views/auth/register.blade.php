@extends('layouts.app')

@section('content')
<section class="mt-5 d-flex justify-content-center">
    <div class="container justify-content-center align-items-center">
      <div class="row justify-content-center align-items-center h-100">
        <div class="col-lg-7 col-sm-12">
          <div class="my-1 card card-registration">
            <div class="row g-0">
              <div class="col-lg-6 col-sm-6 mw-100 d-sm-none d-md-block d-none d-lg-block d-md-none d-lg-none d-xl-block">
                <img
                  src="{{ asset('Sources/signInimage.jpg') }}"
                  alt="Sample photo"
                  loading="lazy"
                  class="img-fluid h-100 w-100"
                />
              </div>
              <div class="col-lg-6 col-sm-12 col-md-12 mw-100">
                <form method="POST" action="{{route('register')}}">
                    @csrf
                    <div class="text-black card-body p-md-4">
                        <div class="row align-items-center">
                            <h5 class="mb-5 text-center text-capitalize font-weight-bold text-color">Sign up to medicare</h5>
                        </div>
                    <div class="mb-1 col-12 form-outline">

                        <label class="form-label font-weight-bold" for="form3Example97">User Name</label>

                            <input
                                type="text"
                                id="name"
                                class="form-control form-control-sm @error('name') is-invalid @enderror border" name="userName"
                                value="{{ old('name') }}"
                                required
                                autocomplete="name"
                                autofocus
                            />
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="mb-1 col-12 form-outline">
                        <label class="form-label font-weight-bold" for="form3Example97">Email</label>
                        <input
                        type="email"
                        id="email"
                        class="form-control form-control-sm @error('email') is-invalid @enderror border" name="email"
                        value="{{ old('email') }}"
                        required
                        autocomplete="email"
                    />
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                        <div class="mb-1 col-12 form-outline">
                            <label class="form-label font-weight-bold" for="form3Example97">Contact</label>
                            <input
                                    type="text"
                                    id="contactNumber"
                                    class="form-control form-control-sm @error('email') is-invalid @enderror border" name="contactNumber"
                                    value="{{ old('contactNumber') }}"
                                    required
                                    autocomplete="contactNumber"
                            />
                            @error('contactNumber')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                        <div class="mb-1 col-12 form-outline">
                            <label class="form-label font-weight-bold" for="form3Example97">Role</label>
                            <select class="form-control form-control-sm @error('role_id') is-invalid @enderror border" name="role_id" required>
                                <option value="Low">Doctor</option>
                                <option value="Medium">Delivery</option>
                                <option value="High">Pharmacy</option>
                                <option value="High">patients</option>
                            </select>
                            @error('Role_id')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    <div class="mb-1 col-12 form-outline">
                        <label class="form-label font-weight-bold" for="form3Example97">Password</label>
                        <input
                        type="password"
                        id="password"
                        class="form-control form-control-sm @error('password') is-invalid @enderror border" name="password"
                        value="{{ old('password') }}"
                        required
                        autocomplete="password"
                        autofocus
                    />
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                  
                  <div class="row justify-content-sm-center">
                    <div class="mx-5 mt-2 mb-2 text-center">
                        <p class="mt-2 mb-0"><small class="mr-2 text-dark">Already have an account ?</small>
                            <a href="{{ route("login") }}" class="text-primary text-decoration-none font-weight-bold"><small>Sign in</small>
                            </a>
                        </p>
                    </div>
                </div>
                 <div class="text-center">
                          <button type="submit"  class="btn medibg btn-primary">SIGN UP</button>
                        </div>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
