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
                <form method="POST" action="#">
                    @csrf
                    <div class="text-black card-body p-md-4">
                        <div class="row align-items-center">
                            <h5 class="mb-5 text-center text-uppercase text-bold text-primary">sign up to medicare</h5>
                        </div>
                    <div class="mb-1 col-12 form-outline">
                        <label class="form-label" for="form3Example97">Name</label>
                            <input
                                type="text"
                                id="name"
                                class="form-control form-control-sm @error('name') is-invalid @enderror" name="name"
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
                        <label class="form-label" for="form3Example97">Email</label>
                        <input
                        type="email"
                        id="email"
                        class="form-control form-control-sm @error('email') is-invalid @enderror" email="email"
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
                        <label class="form-label" for="form3Example97">Password</label>
                        <input
                        type="password"
                        id="password"
                        class="form-control form-control-sm @error('password') is-invalid @enderror" password="password"
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
                  <div class="gap-2 mt-4 d-grid p-sm-5 p-lg-0">
                    <button type="submit" class="btn btn-primary" >Sign Up</button>
                  </div>
                  <div class="row justify-content-sm-center">
                    <div class="mx-5 mt-2 mb-2 text-center">
                        <p class="mt-2 mb-0"><small class="mr-2 text-dark">Already have an account ?</small>
                            <a href="{{ route("login") }}" class="text-primary text-decoration-none font-weight-bold">Sign in
                            </a>
                        </p>
                    </div>
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
