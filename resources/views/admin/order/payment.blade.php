

@extends('admin.layouts.app')

@section('content')


    <div class="main">

        <div class="container-fluid bodybackground" style="background-color: rgb(185,173,193);">
        <div class="mb-5">
            <div class="row">

                <div class="col-md-8 mt-5 mx-auto border border-dark rounded  shadow-sm card">


                    <div class="row">
                        <div class="text-center mt-2">
                        <h3 class="d-inline" style="color: blueviolet; margin: 0;">Payment </h3><button type="button" class="btn float-end" data-card-widget="remove">
                                <span class="float-end rounded-circle btn-tool btn mt-0" style="background: #ebedf1; color: lightslategrey; font-weight: normal;"><i class="fas fa-times"></i></span>
                            </button>
                            <p class="text-center" style="color: blueviolet;">Choose payment method below</p>

                        </div>
                </div>
                    <div class="me-5 ms-5">



                        <form action="post" method="post">
                            <!-- credit card info-->
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{asset('sujon/visa.png')}}" alt="visa" class="
456+">
                                </div>
                                <div class="col-md-4">
                                    <img src="{{asset('sujon/master.png')}}" alt="master" class="cart-img-show">
                                </div>
                                <div class="col-md-4">
                                    <img src="{{asset('sujon/mtn.png')}}" alt="mtn" class="cart-img-show">
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                                <div id="credit-card" class="tab-pane fade show active pt-3">
                                    <div class="form-group py-3">
                                        <div class="card-title">
                                            <h4>Billing Info</h4>
                                        </div>
                                    </div>
                                    <div class="form-group"> <label for="name">
                                            <h6>FULL NAME</h6>
                                        </label>  <div class="input-group border"><input type="text" id="name" name="name" placeholder="John Doe" required class="form-control ">
                                        </div> </div>
                                    <div class="form-group"> <label for="address">
                                            <h6>ADDRESS</h6>
                                        </label>  <div class="input-group border"><input type="text" name="address" placeholder="467 Evergreen Rd" required class="form-control "></div>
                                    </div>


                                    <div class="form-group">
                                        <div class="row p-0">
                                            <div class="col-md-6">
                                                <div class="form-group"> <label><span class="hidden-xs">
                                                    <h6>CITY</h6>
                                                </span></label>
                                                    <div class="input-group border"> <input type="text" placeholder="Roseville" name="" class="form-control" required> </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group"> <label data-toggle="tooltip" title="Three digit CV code on the back of your card">
                                                        <h6>ZIP CODE</h6>
                                                    </label>  <div class="input-group border"><input type="text" required class="form-control" placeholder="95673"> </div></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">
                                            <h6>Email</h6>
                                        </label>
                                        <div class="input-group border">
                                            <input type="email" name="email" id="email" placeholder="John Doe" required class="form-control ">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="amount">
                                            <h6>Amount</h6>
                                        </label>
                                        <div class="input-group border">
                                            <input type="number" name="amount" id="amount" placeholder="$" required class="form-control ">
                                        </div>
                                    </div>



                                </div>
                            </div>
                            <div class="col-md-6">
                                <div id="credit-card" class="tab-pane fade show active pt-3">
                                    <div class="form-group py-3">
                                        <div class="card-title">
                                           <h4>Credit Card Info</h4>
                                        </div>
                                    </div>
                                    <div class="form-group"> <label for="phone">
                                            <h6>Card number</h6>
                                        </label>
                                        <div class="input-group "> <input type="text" name="phone"  id="phone" placeholder="Valid card number" class="form-control" required>
                                            <div class="input-group-append px-3">    <ul class="cards">
                                                    <li class="visa hand border">Visa</li>
                                                </ul>  </div>
                                        </div>
                                    </div>

                                    <div class="form-group"> <label for="username">
                                            <h6>Card Owner</h6>
                                        </label>
                                        <div class="input-group border">
                                            <input type="text" name="username" placeholder="Card Owner Name" required class="form-control border"> </div></div>

                                    <div class="row">

                                            <div class="form-group"> <label><span class="hidden-xs">
                                                    <h6>EXPIRE DATE</h6>
                                                </span></label>
                                                <div class="input-group border"><input type="text" class="form-control border" name="datepicker" id="datepicker" placeholder="05 / 21" />
                                                </div>
                                            </div>

                                        <div class="col-sm-4">
                                            <div class="form-group mb-4"> <label data-toggle="tooltip" title="Three digit CV code on the back of your card">
                                                    <h6>CVV </h6>
                                                </label><div class="input-group border"> <input type="text" required class="form-control border" placeholder="123"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-8"></div>
                                    </div>
                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-md-4"><button class="btn btn-primary px-3 float-left mb-3">PREVIOUS</button></div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4"><button type="submit" class="btn btn-primary px-3 float-end mb-3">CONFIRM</button></div>
                                </div>
                                </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>

        </div>

    </div>




@endsection

@section('extra-scripts')
    <script>
        $(function () {
            $("makePaymentForm").submit( function (e){
                e.preventDefault();
                var name = $("#name").val();
                var email = $("#email").val();
                var phone = $("#phone").val();
                var amount = $("#amount").val();
                makePayment(amount,email,phone,name)
            });
        });
        function makePayment(amount,email,phone_number,name) {
            FlutterwaveCheckout({
                public_key: "FLWPUBK_TEST-SANDBOXDEMOKEY-X",
                tx_ref: "RX1_{{substr(rand(0,time()),0,7)}}",
                amount,
                currency: "USD",
                country: "US",
                payment_options: " ",
                customer: {
                    email: email,
                    phone_number,
                    name,
                },
                callback: function (data) {
                    console.log(data);
                },
                onclose: function() {
                    // close modal
                },
                customizations: {
                    title: "My store",
                    description: "Payment for items in cart",
                    logo: "https://assets.piedpiper.com/logo.png",
                },
            });
        }
    </script>
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