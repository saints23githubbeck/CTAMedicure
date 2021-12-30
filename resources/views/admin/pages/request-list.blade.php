@extends('admin.layouts.app')

@section('content')
    <!--Container Main start-->
    <div class="container">
        <div class="col-md-9 offset-2">
            <div class="breadcrumbs-area">
                @include('admin.layouts.status')
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-lg-5">
                <h1 class="text-lg-center">Request List</h1>
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
                                                                <i class="bg-warning"></i>
                                                            <span class="status text-white bg-warning p-1 rounded shadow-lg">Pending</span>
                                                            </span>

                                                        </td>
                                                    @endif
                                                    <td>
                                                        <a  data-bs-toggle="modal" data-bs-target="#details-pres-{{$order->id}}">View</a>
                                                    </td>
                                                    <td>
                                                        <a href="#"  data-bs-toggle="modal" data-bs-target="#approve-order-{{$order->id}}" class="btn btn-success">Approved</a>
                                                        {{--<a href="#" class="btn btn-danger">Rejected</a>--}}
                                                    </td>
                                                </tr>
                                                      @include('admin.pages.modals.orders.details')
                                                      @include('admin.pages.modals.orders.approve')
                                                    @endforeach
                                                </tbody>
                                            </table>
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
                                                <tr>
                                                    <td>{{'mdc0'.$approved->id}}</td>
                                                    <td>{{$approved->created_at->format('d-M-Y')}}</td>
                                                    @if($approved->status == 0)
                                                    <td >
                                                        <span  class="badge badge-dot mr-4">
                                                           <i class="bg-info"></i>
                                                        <span class="status text-white bg-info p-1 rounded shadow-lg">Unapproved</span></td>
                                                        </span>

                                                    @else
                                                        <td>
                                                            <span  class="badge badge-dot mr-4">
                                                                  <i class="bg-warning"></i>
                                                            <span class="status text-white bg-warning p-1 rounded shadow-lg">Approved But Unpaid</span></td>
                                                            </span>

                                                        @endif
                                                    <td><a href="#" data-bs-toggle="modal" data-bs-target="#approved-order-{{$approved->id}}">View</a></td>
                                                    <td><span class="badge bg-primary text-white">Assign</span></td>
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



