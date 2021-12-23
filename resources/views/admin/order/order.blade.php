

@extends('admin.layouts.app')

@section('content')

    <div class="container-fluid">

        <div class="card">
            <div class="card-body">
                <div class="row">

                    <div class="col-md-2">

                    </div>
                    <div class="col-md-8">


                            <div class="float-start d-inline mt-2">
                                <span class="" style="font-size: 40px;"><i class="fas fa-long-arrow-alt-left"></i></span>
                            </div>

                            <div class="text-center mb-4">
                                <button class="btn text-primary px-5 py-1 mt-3 bg-white border-primary border-2" style="font-size: 24px; border-color: #4400AD;" type="button">PICKUP</button>
                                <button class="btn bg-primary text-white px-5 py-1 mt-3 border-2" style="font-size: 24px; font-weight: bold;" type="button">DELIVERY</button>
                            </div>


                        <div class="row">
                            <div class="col-sm-5">
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table table-borderless">
                                            <thead>

                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th class="float-left">Order ID:</th>
                                                <th class="float-end">3</th>

                                            </tr>
                                            <tr>
                                                <th class="float-left">Status:</th>
                                                <th class="float-end">Pending</th>

                                            </tr>
                                            <tr>
                                                <th class="float-left">Order Date:</th>
                                                <th class="float-end">2021-09-04</th>

                                            </tr>
                                            <tr>
                                                <th class="float-left">Subtotal:</th>
                                                <th class="float-end">$1042.02</th>

                                            </tr>
                                            <tr>
                                                <th class="float-left">Discount:</th>
                                                <th class="float-end">$0</th>

                                            </tr>
                                            <tr>
                                                <th class="float-left">Delivery Charge:</th>
                                                <th class="float-end">$22</th>

                                            </tr>
                                            <tr>
                                                <th class="float-left">Total:</th>
                                                <th class="float-end">$1064.02</th>

                                            </tr>

                                            </tbody>
                                        </table>


                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h6 class="card-title" style="font-weight: bold;">Delivery Address</h6>
                                        <p class="card-text" style="font-weight: bold;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure </p>

                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h6 class="card-title" style="font-weight: bold;">Special Note</h6>
                                        <p class="card-text" style="font-weight: bold;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="text-center" style="color: blueviolet;">Choose payment method below</p>
                        <div class="row text-center">
                            <div class="col-md-4 ">
                                <img src="{{asset('sujon/visa.png')}}" alt="visa" class="cart-img-show">
                            </div>

                            <div class="col-md-4">
                                <img src="{{asset('sujon/master.png')}}" alt="master" class="cart-img-show">
                            </div>
                            <div class="col-md-4">
                                <img src="{{asset('sujon/mtn.png')}}" alt="mtn" class="cart-img-show">
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary order" style="">ORDER</button>

                        </div>

                    </div>
                    <div class="col-md-2">

                    </div>
                </div>

            </div>
        </div>
    </div>






@endsection

@section('extra-scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">

        $("#datepicker").datepicker( {
            format: "mm / yy",
            startView: "months",
            minViewMode: "months"
        });

    </script>
@endsection