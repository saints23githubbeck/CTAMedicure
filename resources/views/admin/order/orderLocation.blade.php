

@extends('admin.layouts.app')

@section('content')

    <div class="container-fluid">

        <div class="card">
            <div class="card-body">
                <div class="row">

                    <div class="col-md-12">

                                {{ csrf_field() }}

                            <div class="text-center mb-4">
                                <button data-bs-toggle="modal" data-bs-target="#payPlan" class="btn text-primary px-5 py-1 mt-3 bg-white border-primary border-2" style="font-size: 24px; border-color: #4400AD;">PICKUP</button>
                                <a href="{{route('payment.delivery',$order->id)}}" class="btn bg-primary text-white px-5 py-1 mt-3 border-2" style="font-size: 24px; font-weight: bold;">DELIVERY</a>
                            </div>

                            @include('admin.pages.modals.orders.payPlan')
                            @include('admin.pages.location')
                        <div class="row">
                            <div class="col-lg-7">
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
                                                <th class="float-end">{{$order->created_at->format('D-M-Y')}}</th>

                                            </tr>
                                            <tr>
                                                <th class="float-left">Subtotal:</th>
                                                <th class="float-end">${{$order->confirmedOrder->amount}}</th>

                                            </tr>
                                            <tr>
                                                <th class="float-left">Discount:</th>
                                                <th class="float-end">$0</th>

                                            </tr>
                                            <tr>
                                                <th class="float-left">Delivery Charge:</th>
                                                <th class="float-end">$0</th>

                                            </tr>
                                            <tr>
                                                <th class="float-left">Total:</th>
                                                <th class="float-end">${{$order->confirmedOrder->amount}}</th>
                                                <input type="text" name="amount" value="{{$order->confirmedOrder->amount}}" hidden>
                                                <input type="text" name="order_id" value="{{$order->id}}" hidden>
                                            </tr>

                                            </tbody>
                                        </table>


                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h6 class="card-title" style="font-weight: bold;">Delivery Address</h6>
                                        <p class="card-text" style="font-weight: bold;">
                                            Pick From : {{$order->confirmedOrder->user->address->location}} <br>
                                            To : {{$order->user->address->location}}
                                        </p>

                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h6 class="card-title" style="font-weight: bold;">Special Note</h6>
                                        <p class="card-text" style="font-weight: bold;">{{$order->confirmedOrder->note}}</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="text-center" style="color: blueviolet;">Available Payment Plan</p>
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