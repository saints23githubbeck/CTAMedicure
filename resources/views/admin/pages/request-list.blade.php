@extends('admin.layouts.app')

@section('content')
    <!--Container Main start-->
    <div class="container">
        <div class="row">
            <div class="col-12 mt-lg-5">
                <h1 class="text-lg-center">Prescription</h1>
                <div class="card-body  mt-7">
                    <div class="row offset-1  mt--6">
                        <div class="form-group col">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Incoming Orders</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Accepted Orders</button>
                                </li>
                              </ul>
                              <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <div class="border_give">
                                        <h4 class="text-lg-left test">Searching List</h4>
                                        <div class="table-responsive">
                                            {{--{{dd(auth()->user()->address)}}--}}
                                            @if(auth()->user()->address == null)
                                                <td><a class="status badge text-white btn-danger p-3 rounded shadow-lg" href="#" data-bs-toggle="modal" data-bs-target="#locationModel">Please Update yor Location</a></td>
                                                @include('admin.pages.modals.users.location')
                                                @else
                                                <table class="table my-5">
                                                    <thead class="border_botttom">
                                                    <tr>
                                                        <th scope="col">Order</th>
                                                        <th scope="col">Image</th>
                                                        <th scope="col">Date</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Preview</th>
                                                        <th scope="col" class="text-center">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>



                                                    @foreach($orders as $order)
                                                        <tr>

                                                            <td>{{'mdc0'.$order->id}}</td>
                                                            <td class="budget">
                                                                <img style="width:50px;height:50px"src="{{ asset('uploads/orders/'.$order->image) }}">
                                                            </td>
                                                            <td>{{$order->created_at->format('d-M-Y')}}</td>
                                                            @if($order->status == 0)
                                                                <td class="badge badge-dot mr-4">
                                                            <span  class="badge badge-dot mr-4">

                                                            <span class="status badge text-white bg-warning p-1 rounded shadow-lg">Pending</span>
                                                            </span>

                                                                </td>
                                                            @endif
                                                            <td>
                                                                <a   data-bs-toggle="modal" data-bs-target="#details-pres-{{$order->id}}">View</a>
                                                            </td>
                                                            <td>
                                                                @if( auth()->user()->role->name == 'admin')
                                                                    <a href="#"  data-bs-toggle="modal" data-bs-target="#approve-order-{{$order->id}}" class="btn btn-success">Approved</a>

                                                                @elseif($order->user->address->location == auth()->user()->address->location)
                                                                    <a href="#"  data-bs-toggle="modal" data-bs-target="#approve-order-{{$order->id}}" class="btn btn-success">Approved</a>
                                                                    {{--<a href="#" class="btn btn-danger">Rejected</a>--}}
                                                                @else
                                                                    <span
                                                                            class=" p-1 rounded shadow-lg text-danger">Out Of your range
                                                            </span>
                                                                    {{--<a href="#" class="btn btn-danger">Rejected</a>--}}
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        @include('admin.pages.modals.orders.details')
                                                        @include('admin.pages.modals.orders.approve')

                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="border_give">
                                        <h4 class="text-lg-left test">Searching List</h4>
                                        <div class="table-responsive">
                                            <table class="table my-5">
                                                <thead class="border_botttom">

                                                <tr>
                                                    <th scope="col">Order</th>
                                                    <th scope="col"> Date</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Preview </th>
                                                    <th scope="col">Assign</th>
                                                    <th scope="col" class="text-center">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($confirmOrders as $approved)
                                                    {{--{{dd($approved->delivery->count)}}--}}
                                                <tr>
                                                    <td>{{'mdc0'.$approved->id}}</td>
                                                    <td>{{$approved->created_at->format('d-M-Y')}}</td>
                                                    @if($approved->status == 0)
                                                    <td >
                                                        <span  class="badge badge-dot mr-4">

                                                        <span class="status text-white bg-info p-1 rounded shadow-lg">Approved But Unpaid</span>

                                                        </span>
                                                        </td>
                                                        @elseif($approved->amount == $approved->due AND $approved->amount != $approved->payments)
                                                            <td>
                                                            <span  class="badge badge-dot mr-4">

                                                            <span class="status badge text-white bg-success p-1 rounded shadow-lg">Cash On Delivery</span>
                                                            </span>
                                                            </td>
                                                    @else
                                                        <td>
                                                            <span  class="badge badge-dot mr-4">

                                                            <span class="status badge text-white bg-warning p-1 rounded shadow-lg">Approved But Unpaid</span>
                                                            </span>
                                                        </td>
                                                        @endif
                                                    <td><a href="#" data-bs-toggle="modal" data-bs-target="#approved-order-{{$approved->id}}">View</a></td>
                                                    @if($approved->amount == $approved->due AND $approved->amount != $approved->payments)

                                                        <td>
                                                            <span  class="badge badge-dot mr-4">
                                                                @if(!$approved->delivery)
                                                            <a href="{{route('delivery.assign.show',$approved->id)}}" class="badge bg-primary text-white">Assign</a>
                                                                    @else
                                                                    <a href="#" class="badge bg-info text-white">Already Assigned</a>
                                                                @endif
                                                            </span>
                                                        </td>
                                                    @else
                                                        <td>
                                                            <span  class="badge badge-dot mr-4">

                                                            <span class="badge bg-primary text-white">can`t Assign</span>
                                                            </span>
                                                        </td>
                                                    @endif
                                                    <td>
                                                        <a href=""><i class="fab fa-telegram-plane"></i></a>
                                                        <a href=""><i class="fas fa-pills"></i></a>
                                                        <a href=""><i class="fas fa-user"></i></a>
                                                    </td>
                                                </tr>
                                                    @include('admin.pages.modals.orders.orderApprovedetails')
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="col-md-12 mb-4">
                            <ul class="pagination offset-lg-5 mt-2">
                                <li ><a class="page-link btn medibg p-2 m-2 text-white" href="{{ $confirmOrders->previousPageUrl() }}">Previous</a></li>
                                <li ><a class="page-link p-2 m-2 medibg text-white" href="{{ $confirmOrders->nextPageUrl() }}">Next</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.pages.modals.addUser')
@endsection



