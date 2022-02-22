

@extends('admin.layouts.app')

@section('content')


    <div class="main">

        <div class="container-fluid bodybackground" style="background-color: rgb(185,173,193);">
        <div class="mb-5">
            <div class="row">

                <div class="col-md-8 mt-5 mx-auto border border-dark rounded  shadow-sm card">
                    <h1 class="text-center"> Transaction fetched successfully </h1>
                    <h2 class="text-center"> Waiting For Delivery</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-borderless">
                                <thead>

                                </thead>
                                <tbody>
                                <tr>
                                    <th class="float-left">Order ID:</th>
                                    <th class="float-end">{{$order->id}}</th>
                                </tr>
                                <tr>
                                    <th class="float-left">Status:</th>

                                    @if($order->confirmedOrder->pay_by == null AND $order->confirmedOrder->due == null)

                                        <th class="float-end">Order Not Confirmed for Delivery</th>
                                    @elseif($order->confirmedOrder->amount == $order->confirmedOrder->due)

                                        <th class="float-end">Order Confirmed Waiting for Delivery</th>

                                    @endif



                                </tr>
                                <tr>
                                    <th class="float-left">Order Date:</th>
                                    <th class="float-end">{{$order->created_at}}</th>

                                </tr>
                                <tr>
                                    <th class="float-left">Subtotal:</th>
                                    <th class="float-end">${{$order->confirmedOrder->amount}}</th>

                                </tr>

                                <tr>
                                    <th class="float-left">Delivery Charge:</th>
                                    <th class="float-end">{{$order->confirmedOrder->delivery_charge}} </th>

                                </tr>


                                <tr>
                                    <th class="float-left">Total:</th>
                                    <th class="float-end">${{$order->confirmedOrder->amount+$order->confirmedOrder->delivery_charge}}</th>
                                    <input type="text" name="amount" value="{{$order->confirmedOrder->amount}}" hidden>
                                    <input type="text" name="order_id" value="{{$order->id}}" hidden>
                                </tr>
                                <tr>
                                    <th class="float-left">Payment:</th>
                                    <th class="float-end">${{$order->confirmedOrder->payment}}</th>

                                </tr>
                                <tr>
                                    <th class="float-left">Due:</th>
                                    <th class="float-end">${{$order->confirmedOrder->due}}</th>

                                </tr>

                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card mb-3">

                        <div class="card-body">
                            <h3 class="card-title" style="font-weight: bold;">Payment Information</h3>
                            @if(isset($order->cardPayment->first_6digits))
                            <p class="card-text"><strong>First 6 Digits</strong>  :

                                {{$order->cardPayment->first_6digits}}

                            </p>
                            @endif
                            @if(isset($order->cardPayment->last_4digits))
                            <p class="card-text"><strong>Last 4 Digits</strong>  :

                                {{$order->cardPayment->last_4digits}}

                            </p>
                            @endif
                            @if(isset($order->confirmedOrder->pay_by))
                            <p class="card-text"><strong>Payment By </strong>  :

                                    {{$order->confirmedOrder->pay_by}}

                            </p>
                            @endif
                        </div>

                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h6 class="card-title" style="font-weight: bold;">Special Note</h6>
                            <p class="card-text" style="font-weight: bold;">{{$order->confirmedOrder->note}}</p>

                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <a href="{{route('prescription.show')}}"> <button class="btn btn-outline-success" > Prescriptions</button></a>

                        </div>
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