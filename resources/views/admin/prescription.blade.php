@extends('admin.layouts.app')

@section('content')
    <!--Container Main start-->
    <div class="height-100 bg-light">
        <div class="row my-5">
            <div class="col-md-8">
                <div class="d-flex justify-content-between">
                    <div class="d-inline-flex">
                        <img
                        src="https://mdbootstrap.com/img/new/standard/city/041.jpg"
                        class="img-thumbnail"
                        alt="Hollywood Sign on The Hill"
                        width="100px"
                        />
                        <div>
                            <h3 class="text-primary ms-3">Lorem</h3>
                            <p class="text-primary ms-3">Lorem ipsum dolor, <br> sit amet consectetur <br> adipisicing elit. Facere </p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        <h3 class="text-primary">$ 10.2</h3>
                    </div>
                    
                    <div class="d-flex align-items-center justify-content-center" style="background-color: #e0f1fc">
                        <p class="text-primary mx-3">01</p>
                    </div>
                    <button type="button" class="btn" style="background-color: #e0f1fc" data-mdb-ripple-color="dark"><i class="fas fa-times fa-3x mx-3"></i></button>
                    
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <div class="d-inline-flex">
                        <img
                        src="https://mdbootstrap.com/img/new/standard/city/041.jpg"
                        class="img-thumbnail"
                        alt="Hollywood Sign on The Hill"
                        width="100px"
                        />
                        <div>
                            <h3 class="text-primary ms-3">Lorem</h3>
                            <p class="text-primary ms-3">Lorem ipsum dolor, <br> sit amet consectetur <br> adipisicing elit. Facere </p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        <h3 class="text-primary">$ 10.2</h3>
                    </div>
                    
                    <div class="d-flex align-items-center justify-content-center" style="background-color: #e0f1fc">
                        <p class="text-primary mx-3">01</p>
                    </div>
                    <button type="button" class="btn" style="background-color: #e0f1fc" data-mdb-ripple-color="dark"><i class="fas fa-times fa-3x mx-3"></i></button>
                    
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <div class="d-inline-flex">
                        <img
                        src="https://mdbootstrap.com/img/new/standard/city/041.jpg"
                        class="img-thumbnail"
                        alt="Hollywood Sign on The Hill"
                        width="100px"
                        />
                        <div>
                            <h3 class="text-primary ms-3">Lorem</h3>
                            <p class="text-primary ms-3">Lorem ipsum dolor, <br> sit amet consectetur <br> adipisicing elit. Facere </p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        <h3 class="text-primary">$ 10.2</h3>
                    </div>
                    
                    <div class="d-flex align-items-center justify-content-center" style="background-color: #e0f1fc">
                        <p class="text-primary mx-3">01</p>
                    </div>
                    <button type="button" class="btn" style="background-color: #e0f1fc" data-mdb-ripple-color="dark"><i class="fas fa-times fa-3x mx-3"></i></button>
                    
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <h4>SUBTOTAL</h4>
                    <h3>$ 100.1</h3>
                </div>
            </div>
            <div class="col-md-3  bg-primary">
                <div class="mx-3">
                    <h2 class="text-white mt-3 text-center">ORDER DETAILS</h2>
                    <div class="text-center">
                        <button type="button" class="btn btn-light btn-rounded mb-3"><i class="fas fa-gift me-3 text-primary"></i>Apply Coupon<i class="fas fa-chevron-circle-right text-primary ms-3"></i></button>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="text-white">Cart Value</p>
                        <p class="text-white">110.1</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="text-white">Delivery Charges</p>
                        <p class="text-white">10.1</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="text-white">Discount</p>
                        <p class="text-white">0</p>
                    </div>
                    <hr class="text-white" color="#fff" height="5px">
                    <div class="d-flex justify-content-between">
                        <p class="text-white">Amount to be paid</p>
                        <p class="text-white">120</p>
                    </div>
                    <p class="text-white">Name & Address of Pharmacy</p>
                    <div class="d-inline-flex">
                        <i class="fas fa-map-marker-alt text-white fa-5x"></i>
                        <p class="text-white ms-3">Lorem ipsum dolor, <br> sit amet consectetur <br> adipisicing elit. Facere </p>
                    </div>
                    <div class="d-flex justify-content-between my-4">
                        <button type="button" class="btn btn-danger btn-rounded">Decline</button>
                        <button type="button" class="btn btn-light btn-rounded" data-mdb-ripple-color="dark">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="bold">Billing info</h3>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="mb-3 col-12 form-outline">
                                        <label class="form-label font-weight-bold" for="form3Example97">FULL NAME</label>
                                            <input
                                                type="text"
                                                id="name"
                                                class="form-control form-control-sm @error('name') is-invalid @enderror border" name="name" placeholder="John Doe"
                                                value="{{ old('name') }}"
                                                required
                                                autocomplete="name"
                                                autofocus
                                            />
                                            
                                    </div>
                                    <div class="mb-3 col-12 form-outline">
                                        <label class="form-label font-weight-bold" for="form3Example97">ADDRESS</label>
                                            <input
                                                type="text"
                                                id="name"
                                                class="form-control form-control-sm @error('name') is-invalid @enderror border" name="address" placeholder="439 Baatsonaa"
                                                value="{{ old('name') }}"
                                                required
                                                autofocus
                                            />
                                            
                                    </div>
                                    <div class="mb-3 col-12 form-outline">
                                        <label class="form-label font-weight-bold" for="form3Example97">FULL NAME</label>
                                            <input
                                                type="text"
                                                id="name"
                                                class="form-control form-control-sm @error('name') is-invalid @enderror border" name="name" placeholder="John Doe"
                                                value="{{ old('name') }}"
                                                required
                                                autofocus
                                            />
                                            
                                    </div>
                                    <div class="mb-3 col-12 form-outline">
                                        <label class="form-label font-weight-bold" for="form3Example97">POSTAL ADDRESS</label>
                                            <input
                                                type="text"
                                                id="name"
                                                class="form-control form-control-sm @error('name') is-invalid @enderror border" name="name" placeholder="P.O. Box 87"
                                                value="{{ old('name') }}"
                                                required
                                                autofocus
                                            />
                                            
                                    </div>
                                    <div class="mb-3 col-12 form-outline">
                                        <label class="form-label font-weight-bold" for="form3Example97">FULL NAME</label>
                                            <input
                                                type="text"
                                                id="name"
                                                class="form-control form-control-sm @error('name') is-invalid @enderror border" name="name" placeholder="John Doe"
                                                value="{{ old('name') }}"
                                                required
                                                autofocus
                                            />
                                            
                                    </div>
                                    <div class="mb-3 col-12 form-outline">
                                        <label class="form-label font-weight-bold" for="form3Example97">SHIPPING ADDRESS</label>
                                            <input
                                                type="text"
                                                id="name"
                                                class="form-control form-control-sm @error('name') is-invalid @enderror border" name="name" placeholder="899 Banana Street"
                                                value="{{ old('name') }}"
                                                required
                                                autofocus
                                            />
                                            
                                    </div>
                                    <div class="mb-3 col-12 form-outline">
                                        <label class="form-label font-weight-bold" for="form3Example97">EXPIRY DATE</label>
                                            <input
                                                type="text"
                                                id="picker"
                                                class="form-control form-control-sm @error('card_date') is-invalid @enderror border" name="name" placeholder="12/2025"
                                                value="{{ old('name') }}"
                                                required
                                                autofocus
                                            />
                                            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
    </div>
@endsection