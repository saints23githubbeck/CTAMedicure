

@extends('layouts.master')
@section('extra-styles')
    <style>
        html,body,.wrapper{
            background: #f7f7f7;
        }
        .steps {
            margin-top: -41px;
            display: inline-block;
            float: right;
            font-size: 16px
        }
        .step {
            float: left;
            background: white;
            padding: 7px 13px;
            border-radius: 1px;
            text-align: center;
            width: 100px;
            position: relative
        }
        .step_line {
            margin: 0;
            width: 0;
            height: 0;
            border-left: 16px solid #fff;
            border-top: 16px solid transparent;
            border-bottom: 16px solid transparent;
            z-index: 1008;
            position: absolute;
            left: 99px;
            top: 1px
        }
        .step_line.backline {
            border-left: 20px solid #f7f7f7;
            border-top: 20px solid transparent;
            border-bottom: 20px solid transparent;
            z-index: 1006;
            position: absolute;
            left: 99px;
            top: -3px
        }
        .step_complete {
            background: #357ebd
        }
        .step_complete a.check-bc, .step_complete a.check-bc:hover,.afix-1,.afix-1:hover{
            color: #eee;
        }
        .step_line.step_complete {
            background: 0;
            border-left: 16px solid #357ebd
        }
        .step_thankyou {
            float: left;
            background: white;
            padding: 7px 13px;
            border-radius: 1px;
            text-align: center;
            width: 100px;
        }
        .step.check_step {
            margin-left: 5px;
        }
        .ch_pp {
            text-decoration: underline;
        }
        .ch_pp.sip {
            margin-left: 10px;
        }
        .check-bc,
        .check-bc:hover {
            color: #222;
        }
        .SuccessField {
            border-color: #458845 !important;
            -webkit-box-shadow: 0 0 7px #9acc9a !important;
            -moz-box-shadow: 0 0 7px #9acc9a !important;
            box-shadow: 0 0 7px #9acc9a !important;
            background: #f9f9f9 url(../images/valid.png) no-repeat 98% center !important
        }

        .btn-xs{
            line-height: 28px;
        }

        /*login form*/
        .login-container{
            margin-top:30px ;
        }
        .login-container input[type=submit] {
            width: 100%;
            display: block;
            margin-bottom: 10px;
            position: relative;
        }

        .login-container input[type=text], input[type=password] {
            height: 44px;
            font-size: 16px;
            width: 100%;
            margin-bottom: 10px;
            -webkit-appearance: none;
            background: #fff;
            border: 1px solid #d9d9d9;
            border-top: 1px solid #c0c0c0;
            /* border-radius: 2px; */
            padding: 0 8px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        .login-container input[type=text]:hover, input[type=password]:hover {
            border: 1px solid #b9b9b9;
            border-top: 1px solid #a0a0a0;
            -moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
            -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
            box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
        }

        .login-container-submit {
            /* border: 1px solid #3079ed; */
            border: 0px;
            color: #fff;
            text-shadow: 0 1px rgba(0,0,0,0.1);
            background-color: #357ebd;/*#4d90fe;*/
            padding: 17px 0px;
            font-family: roboto;
            font-size: 14px;
            /* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#4787ed)); */
        }

        .login-container-submit:hover {
            /* border: 1px solid #2f5bb7; */
            border: 0px;
            text-shadow: 0 1px rgba(0,0,0,0.3);
            background-color: #357ae8;
            /* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#357ae8)); */
        }

        .login-help{
            font-size: 12px;
        }

        .asterix{
            background:#f9f9f9 url(../images/red_asterisk.png) no-repeat 98% center !important;
        }

        /* images*/
        ol, ul {
            list-style: none;
        }
        .hand {
            cursor: pointer;
            cursor: pointer;
        }
        .cards{
            padding-left:0;
        }
        .cards li {
            -webkit-transition: all .2s;
            -moz-transition: all .2s;
            -ms-transition: all .2s;
            -o-transition: all .2s;
            transition: all .2s;
            background-image: url('//c2.staticflickr.com/4/3713/20116660060_f1e51a5248_m.jpg');
            background-position: 0 0;
            float: left;
            height: 32px;
            margin-right: 8px;
            text-indent: -9999px;
            width: 51px;
        }
        .cards .mastercard {
            background-position: -51px 0;
        }
        .cards li {
            -webkit-transition: all .2s;
            -moz-transition: all .2s;
            -ms-transition: all .2s;
            -o-transition: all .2s;
            transition: all .2s;
            background-image: url('//c2.staticflickr.com/4/3713/20116660060_f1e51a5248_m.jpg');
            background-position: 0 0;
            float: left;
            height: 32px;
            margin-right: 8px;
            text-indent: -9999px;
            width: 51px;
        }
        .cards .amex {
            background-position: -102px 0;
        }
        .cards li {
            -webkit-transition: all .2s;
            -moz-transition: all .2s;
            -ms-transition: all .2s;
            -o-transition: all .2s;
            transition: all .2s;
            background-image: url('//c2.staticflickr.com/4/3713/20116660060_f1e51a5248_m.jpg');
            background-position: 0 0;
            float: left;
            height: 32px;
            margin-right: 8px;
            text-indent: -9999px;
            width: 51px;
        }
        .cards li:last-child {
            margin-right: 0;
        }
        /* images end */



        /*
         * BOOTSTRAP
         */
        .container{
            border: none;
        }
        .panel-footer{
            background:#fff;
        }
        .btn{
            border-radius: 1px;
        }
        .btn-sm, .btn-group-sm > .btn{
            border-radius: 1px;
        }
        .input-sm, .form-horizontal .form-group-sm .form-control{
            border-radius: 1px;
        }

        .panel-info {
            border-color: #999;
        }

        .panel-heading {
            border-top-left-radius: 1px;
            border-top-right-radius: 1px;
        }
        .panel {
            border-radius: 1px;
        }
        .panel-info > .panel-heading {
            color: #eee;
            border-color: #999;
        }
        .panel-info > .panel-heading {
            background-image: linear-gradient(to bottom, #555 0px, #888 100%);
        }

        hr {
            border-color: #999 -moz-use-text-color -moz-use-text-color;
        }

        .panel-footer {
            border-bottom-left-radius: 1px;
            border-bottom-right-radius: 1px;
            border-top: 1px solid #999;
        }

        .btn-link {
            color: #888;
        }

        hr{
            margin-bottom: 10px;
            margin-top: 10px;
        }

        /** MEDIA QUERIES **/
        @media only screen and (max-width: 989px){
            .span1{
                margin-bottom: 15px;
                clear:both;
            }
        }

        @media only screen and (max-width: 764px){
            .inverse-1{
                float:right;
            }
        }

        @media only screen and (max-width: 586px){
            .cart-titles{
                display:none;
            }
            .panel {
                margin-bottom: 1px;
            }
        }

        .form-control {
            border-radius: 1px;
        }

        @media only screen and (max-width: 486px){
            .col-xss-12{
                width:100%;
            }
            .cart-img-show{
                display: none;
            }
            .btn-submit-fix{
                width:100%;
            }

        }
        /*
        @media only screen and (max-width: 777px){
            .container{
                overflow-x: hidden;
            }
        }*/

.order{

    font-size: 24px;
    font-weight: bold;
    padding: 4px 70px 4px 70px;
}
    </style>
@endsection
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
                                <img src="{{asset('img/visa.png')}}" alt="visa" class="cart-img-show">
                            </div>
                            <div class="col-md-4">
                                <img src="{{asset('img/master.png')}}" alt="master" class="cart-img-show">
                            </div>
                            <div class="col-md-4">
                                <img src="{{asset('img/mtn.png')}}" alt="mtn" class="cart-img-show">
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