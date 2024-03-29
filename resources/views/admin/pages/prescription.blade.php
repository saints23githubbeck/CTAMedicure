@extends('admin.layouts.app')

@section('content')
    <!--Container Main start-->
    <div class="container">

        @include('admin.pages.modals.orders.order')

        @if($orders->count() > 0)
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body mx-2 my-5">
                        <h2 class="fw-bolder text-center">Prescriptions</h2>
                        <div class="row my-3 ">
                            <div class="form-group col">

                                From
                                <input type="text" name="from_date" class="form-control" readonly id="from_date"
                                       placeholder=" Filter From">
                            </div>
                            <div class="form-group col">
                                To
                                <input type="text" name="to_date" class="form-control" readonly id="to_date"
                                       placeholder="Filter To">
                            </div>
                            <div class="form-group col">


                                <button type="button" id="filter" class="btn medibg text-white mt-4">Filter</button>
                                <button type="button" id="refresh" class="btn medibg text-white mt-4">Refresh</button>
                                {{--<span class="btn btn-danger text-white mt-4">Cancel</span>--}}

                                {{--<button type="button" class="btn medibg text-black" name="filter" id="filter">Filter</button>--}}
                                {{--<button type="button" class="btn btn-danger" name="refresh" id="refresh">Refresh</button>--}}


                            </div>

                        </div>

                        <div class="row justify-content-end mb-3">
                            <div class="col-md-3 ">


                                <button type="button" class="btn medibg custom-btn text-white" data-bs-toggle="modal"
                                        data-bs-target="#order">Buy Prescription
                                </button>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <!-- Card header -->

                                    <!-- Light table -->
                                    <div class="table-responsive">
                                        <table class="table align-items-center table-flush">
                                            <thead class="thead-light text-dark ">
                                            <tr>
                                                <th scope="col" class="sort" data-sort="budget">Order</th>
                                                <th scope="col" class="sort" data-sort="budget">Order image</th>
                                                <th scope="col" class="sort" data-sort="budget">quantity</th>
                                                <th scope="col" class="sort" data-sort="budget">Date</th>
                                                <th scope="col" class="sort" data-sort="budget">Note</th>
                                                <th scope="col" class="sort" data-sort="status">Status</th>
                                                <th scope="col" class="sort" data-sort="completion">
                                                    Action
                                                </th>


                                            </tr>
                                            </thead>
                                            <tbody class="listing">

                                                @foreach ($orders as $order)
                                                    <tr>
                                                        <td>
                                                            {{$order->id}}
                                                        </td>

                                                        <td>
                                                            <img style="height:30px"
                                                                class="rounded" src="{{ asset('uploads/orders/'.$order->image) }}">
                                                        </td>
                                                        <td>
                                                            {{ $order->quantity }}
                                                        </td>
                                                        <td>
                                                            {{ $order->created_at->format('d-M-Y' )}}
                                                        </td>
                                                        <td>
                                                            {{ $order->note }}
                                                        </td>
                                                        <td>
                                                            @if($order->status == 0)
                                                                <span class="badge badge-dot mr-4">
                                                <span class="status badge text-white bg-warning p-1 rounded shadow-lg">Pending</span>
                                              </span>
                                                            @elseif($order->confirmedOrder->status == 0)
                                                                <span class="badge badge-dot mr-4">
                                                <i class="bg-info"></i>
                                                 <a href="" data-bs-toggle="modal"
                                                    data-bs-target="#preview-order-{{$order->id}}"><span
                                                             class="status text-white bg-info p-1 rounded shadow-lg text-capitalize">approved Review Now</span></a>
                                              </span>
                                                            @elseif( $order->confirmedOrder->pay_by == null AND $order->confirmedOrder->due == null)

                                                <i class="bg-success"></i>
                                                 <a href="" data-bs-toggle="modal"
                                                    data-bs-target="#preview-order-{{$order->id}}"><span
                                                             class="status text-white bg-success p-1 rounded shadow-lg">Confirmed but Unpaid</span></a>
                                              </span>
                                                            @elseif($order->confirmedOrder->amount == $order->confirmedOrder->due)

                                                <i class="bg-info"></i>
                                                 <a href="" data-bs-toggle="modal"
                                                    data-bs-target="#preview-order-{{$order->id}}"><span
                                                             class="status text-white bg-info p-1 rounded shadow-lg">Paid Waiting for Delivery</span></a>
                                              </span>
                                                            @else

                                                <i class="bg-success"></i>
                                                 <a href="" data-bs-toggle="modal"
                                                    data-bs-target="#preview-order-{{$order->id}}"><span
                                                             class="status text-white bg-success p-1 rounded shadow-lg">Accepted Review Now</span></a>
                                              </span>

                                                            @endif


                                                        </td>


                                                        <td>
                                                            @if($order->status == 0)
                                                                <a data-bs-toggle="modal"
                                                                   data-bs-target="#edit-pres-{{$order->id}}"
                                                                   class="bg-success btn-sm text-white "><i
                                                                            class="fas fa-edit"></i></a>
                                                                <a class="bg-info btn-sm text-white"
                                                                   data-bs-toggle="modal"
                                                                   data-bs-target="#details-pres-{{$order->id}}"><i
                                                                            class="fas fa-eye"></i></a>
                                                                <a class=" bg-danger btn-sm text-white "
                                                                   data-bs-toggle="modal"
                                                                   data-bs-target="#delete-pres-{{$order->id}}"><i
                                                                            class="fas fa-trash"> </i></a>
                                                            @elseif($order->confirmedOrder->status == 0)
                                                                <a class="bg-info btn-sm text-white"
                                                                   data-bs-toggle="modal"
                                                                   data-bs-target="#details-pres-{{$order->id}}"><i
                                                                            class="fas fa-eye"></i></a>
                                                                {{--<a class=" bg-danger btn-sm text-white "--}}
                                                                   {{--data-bs-toggle="modal"--}}
                                                                   {{--data-bs-target="#delete-pres-{{$order->id}}"><i--}}
                                                                            {{--class="fas fa-trash"> </i></a>--}}
                                                            @elseif( $order->confirmedOrder->pay_by == null AND $order->confirmedOrder->due == null)
                                                                <a class="bg-info btn-sm text-white"
                                                                   data-bs-toggle="modal"
                                                                   data-bs-target="#details-pres-{{$order->id}}"><i
                                                                            class="fas fa-eye"></i></a>
                                                                {{--<a class=" bg-danger btn-sm text-white "--}}
                                                                   {{--data-bs-toggle="modal"--}}
                                                                   {{--data-bs-target="#delete-pres-{{$order->id}}"><i--}}
                                                                            {{--class="fas fa-trash"> </i></a>--}}
                                                            @elseif($order->confirmedOrder->amount == $order->confirmedOrder->due)
                                                                <a class="bg-info btn-sm text-white"
                                                                   data-bs-toggle="modal"
                                                                   data-bs-target="#details-pres-{{$order->id}}"><i
                                                                            class="fas fa-eye"></i></a>
                                                        @endif

                                                        </td>
                                                        <td>
                                                            @if($order->status == 1)
                                                                @include('admin.pages.modals.orders.previewOrder')
                                                            @endif
                                                        </td>
                                                    <td> @include('admin.pages.modals.orders.order_edit')</td>
                                                    <td> @include('admin.pages.modals.orders.details')</td>
                                                    <td> @include('admin.pages.modals.orders.delete')</td>





                                                    </tr>




                                                @endforeach


                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
            @else
            <div class="row justify-content-end mb-3">
                <div class="col-md-3 ">


                    <button type="button" class="btn medibg custom-btn text-white" data-bs-toggle="modal"
                            data-bs-target="#order">Buy Prescription
                    </button>

                </div>
            </div>
            @include('admin.pages.modals.orders.order')
            <div class="text-center mb-4">
                <img src="{{asset('/img/result.gif')}}" class="img-fluid" alt="">
                <i>No records were found</i>
            </div>
        @endif


    </div>


@endsection

@section('footer_script')

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .css({
                            'background': 'url(' + e.target.result + ') center center no-repeat',
                            'background-size': 'cover'
                        });
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>

    <script>
        const storage = [
            {data: '1', status: '0'},
            {data: '2', status: '0'},
            {data: '3', status: '0'},
            {data: '4', status: '0'},
            {data: '5', status: '0'},
            {data: '6', status: '0'},
            {data: '7', status: '1'},
        ];


        $(document).ready(function () {
// var storage = '<?php echo $confirmorders; ?>';
// let counter = 0;
// for (let i = 0; i < storage.length; i++) {
//   if (storage[i].status === '0') counter++;
// }

// console.log(counter); // 6
// alert(abc.length);
// console.log(abc);
// alert(abc);
// console.log(abc);

            $.datepicker.setDefaults({
                dateFormat: 'yy-mm-dd'
            });

            $(function () {
                $('#from_date').datepicker();
                $('#to_date').datepicker();

            });


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            function fetch_data(from_date = '', to_date = '') {
                $.ajax({
                    type: 'POST',
                    url: '/filter/prescription',
                    data: {from_date: from_date, to_date: to_date},
                    dataType: "json",
                    success: function (data) {

// var output = '';

                        var output = '';

                        for (var count = 0; count < data.length; count++) {

                            output += '<tr>';

                            output += '<td>mdc0' + data[count].id + '</td>';
                            output += "<td><img src={{ URL::to('/') }}/uploads/orders/" + data[count].image + " width='70px'/></td>";
                            output += '<td>' + data[count].quantity + '</td>';
                            output += '<td>' + data[count].created_at + '</td>';
                            output += '<td>' + data[count].note + '</td>';

                            output += '<td>';
                            /*order status*/

                            if (data[count].status == 0) {
                                output += '<span class="badge badge-dot mr-4"><i class="bg-warning"></i><span class="status text-white bg-warning p-1 rounded shadow-lg">Pending</span></span>';
                            } else if (data[count].status == 0) {
                                output += '<span class="badge badge-dot mr-4"><i class="bg-info"></i><a href=""  data-bs-toggle="modal" data-bs-target="#preview-order-1"><span class="status text-white bg-info p-1 rounded shadow-lg text-capitalize">approved Review Now</span></a></span>';
                            } else if (data[count].pay_by == null && data[count].due == null) {
                                output += '<span class="badge badge-dot mr-4"><i class="bg-success"></i><a href=""  data-bs-toggle="modal" data-bs-target="#preview-order-1"><span class="status text-white bg-success p-1 rounded shadow-lg">You Confirmed but Unpaid</span></a></span>';
                            } else if (data[count].amount == data[count].due) {
                                output += '<span class="badge badge-dot mr-4"><i class="bg-info"></i><a href=""  data-bs-toggle="modal" data-bs-target="#preview-order-1"><span class="status text-white bg-info p-1 rounded shadow-lg">Paid Waiting for Delivery</span></a></span>';
                            } else {
                                output += '<span class="badge badge-dot mr-4"><i class="bg-success"></i> <a href=""  data-bs-toggle="modal" data-bs-target="#preview-order-1"><span class="status text-white bg-success p-1 rounded shadow-lg">Accepted Review Now</span></a></span>';

                            }


                            output += '</td>';
                            /*order end*/


                            output += '</tr>';
                        }
                        $('.listing').html(output);


                    },
                    error: function (xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }






@endsection

