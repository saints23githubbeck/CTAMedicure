

@extends('admin.layouts.app')

@section('content')


    <div class="main">

        <h3>Buy Movie Tickets N500.00</h3>
        <form method="POST" action="{{ route('pay') }}" id="paymentForm">
            {{ csrf_field() }}

            <input name="name" placeholder="Name" />
            <input name="amount" placeholder="amount" />
            <input name="email" type="email" placeholder="Your Email" />
            <input name="phone" type="tel" placeholder="Phone number" />

            <input type="submit" value="Buy" />
        </form>

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