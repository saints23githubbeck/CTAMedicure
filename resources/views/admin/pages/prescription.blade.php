@extends('admin.layouts.app')

@section('content')
    <!--Container Main start-->
    <div class="container">

        @include('admin.pages.modals.orders.order')


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
                                                <th scope="col" class="sort" data-sort="completion" class="text-r">
                                                    Action
                                                </th>


                                            </tr>
                                            </thead>
                                            <tbody class="listing">
                                            @if(count($orders) > 0)
                                                @foreach ($orders as $order)
                                                    <tr>
                                                        <td>
                                                            {{'mdc0'.$order->id}}
                                                        </td>

                                                        <td>
                                                            <img style="width:50px;height:50px"
                                                                 src="{{ asset('uploads/orders/'.$order->image) }}">
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
                                                <i class="bg-warning"></i>
                                                <span class="status text-white bg-warning p-1 rounded shadow-lg">Pending</span>
                                              </span>
                                                            @elseif($order->confirmedOrder->status == 0)
                                                                <span class="badge badge-dot mr-4">
                                                <i class="bg-info"></i>
                                                 <a href="" data-bs-toggle="modal"
                                                    data-bs-target="#preview-order-{{$order->id}}"><span
                                                             class="status text-white bg-info p-1 rounded shadow-lg text-capitalize">approved Review Now</span></a>
                                              </span>
                                                            @elseif( $order->confirmedOrder->pay_by == null AND $order->confirmedOrder->due == null)
                                                                <span class="badge badge-dot mr-4">
                                                <i class="bg-success"></i>
                                                 <a href="" data-bs-toggle="modal"
                                                    data-bs-target="#preview-order-{{$order->id}}"><span
                                                             class="status text-white bg-success p-1 rounded shadow-lg">You Confirmed but Unpaid</span></a>
                                              </span>
                                                            @elseif($order->confirmedOrder->amount == $order->confirmedOrder->due)
                                                                <span class="badge badge-dot mr-4">
                                                <i class="bg-info"></i>
                                                 <a href="" data-bs-toggle="modal"
                                                    data-bs-target="#preview-order-{{$order->id}}"><span
                                                             class="status text-white bg-info p-1 rounded shadow-lg">Paid Waiting for Delivery</span></a>
                                              </span>
                                                            @else
                                                                <span class="badge badge-dot mr-4">
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
                                                                   data-bs-target="#update-pres-{{$order->id}}"
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
                                                                <a class=" bg-danger btn-sm text-white "
                                                                   data-bs-toggle="modal"
                                                                   data-bs-target="#delete-pres-{{$order->id}}"><i
                                                                            class="fas fa-trash"> </i></a>
                                                            @elseif( $order->confirmedOrder->pay_by == null AND $order->confirmedOrder->due == null)
                                                                <a class="bg-info btn-sm text-white"
                                                                   data-bs-toggle="modal"
                                                                   data-bs-target="#details-pres-{{$order->id}}"><i
                                                                            class="fas fa-eye"></i></a>
                                                                <a class=" bg-danger btn-sm text-white "
                                                                   data-bs-toggle="modal"
                                                                   data-bs-target="#delete-pres-{{$order->id}}"><i
                                                                            class="fas fa-trash"> </i></a>
                                                            @elseif($order->confirmedOrder->amount == $order->confirmedOrder->due)
                                                                <a class="bg-info btn-sm text-white"
                                                                   data-bs-toggle="modal"
                                                                   data-bs-target="#details-pres-{{$order->id}}"><i
                                                                            class="fas fa-eye"></i></a>
                                                        @endif

                                                    </tr>





                                                @endforeach
                                            @endif
                                            @if($orders->count() == 0)
                                                <div class="text-center mt-3">
                                                    <em>No users found</em>
                                                </div>
                                            @endif
                                            </tbody>
                                        </table>
                                        <!--all modals start-->
                                    @foreach ($orders as $order)

                                        @if($order->status == 1)
                                            @include('admin.pages.modals.orders.previewOrder')
                                        @endif


                                        @include('admin.pages.modals.orders.details')
                                        @include('admin.pages.modals.orders.order_edit')
                                        @include('admin.pages.modals.orders.delete')
                                    @endforeach
                                    <!--all modals end-->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="col-md-12 mb-4">
                            <ul class="pagination offset-lg-5 mt-2">
                                <li><a class="page-link btn medibg p-2 m-2 text-white"
                                       href="{{ $orders->previousPageUrl() }}">Previous</a></li>
                                <li><a class="page-link p-2 m-2 medibg text-white" href="{{ $orders->nextPageUrl() }}">Next</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>

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

        $(document).ready(function(){
            var path = "{{ url('/location_typehead') }}";
            $('#location').typeahead({
                source:function(query,process){
                    return $.get(path,{query:query},function(data){
                        return process(data);
                    });
                }
            });

        });
    </script>



@endsection

