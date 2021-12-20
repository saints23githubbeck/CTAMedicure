

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


    </style>
@endsection
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



                        <form>
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
                                    <div class="form-group"> <label for="username">
                                            <h6>FULL NAME</h6>
                                        </label>  <div class="input-group border"><input type="text" name="username" placeholder="John Doe" required class="form-control ">
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
                                        <label for="username">
                                            <h6>FULL NAME</h6>
                                        </label>
                                        <div class="input-group border">
                                            <input type="text" name="username" placeholder="John Doe" required class="form-control ">
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
                                    <div class="form-group"> <label for="cardNumber">
                                            <h6>Card number</h6>
                                        </label>
                                        <div class="input-group "> <input type="text" name="cardNumber" placeholder="Valid card number" class="form-control" required>
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
                                    <div class="col-md-4"><button class="btn btn-primary px-3 float-end mb-3">CONFIRM</button></div>
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