@extends('admin.layouts.app')

@section('content')
    <!--Container Main start-->
    <div class="container">
        <div class="row">
            <div class="col-12 mt-lg-5">
                <h1 class="text-lg-center">Delivery list</h1>
                <div class="card-body  mt-7">
                    <div class="row offset-1  mt--6">
                        <div class="form-group col">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Incoming Delivary</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Accepted Delivary</button>
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
                                                    <th scope="col">#</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Preview</th>
                                                    <th scope="col" class="text-center">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                {{--{{dd($myIncomingDeliveries)}}--}}
                                                @foreach($myIncomingDeliveries as $coming)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$coming->created_at->format('d-M-Y')}}</td>
                                                    @if($coming->status == 0)
                                                        <td class="badge badge-dot mr-4">
                                                            <span  class="badge badge-dot mr-4">
                                                            <span class="status text-white bg-warning p-1 rounded shadow-lg">Pending</span>
                                                            </span>

                                                        </td>
                                                    @endif
                                                    <td>
                                                        <a class="badge badge-dot mr-4 bg-primary p-1 text-white"  data-bs-toggle="modal" data-bs-target="#details-pres-{{$coming->id}}">View</a>
                                                    </td>
                                                    <td>
                                                        <a href="#"  data-bs-toggle="modal" data-bs-target="#approve-order-{{$coming->id}}" class="btn-sm btn-success">Approved</a>
                                                        <a href="#"  data-bs-toggle="modal" data-bs-target="#deliveryRej-{{$coming->id}}" class="btn-sm btn-danger">Reject</a>
                                                        {{--<a href="#" class="btn btn-danger">Rejected</a>--}}
                                                    </td>
                                                </tr>
                                                      @include('admin.pages.modals.orders.delivary_details')
                                                      @include('admin.pages.modals.orders.delivary_approve')
                                                      @include('admin.pages.modals.deliveries.delete')


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
                                                    <th scope="col"> #</th>
                                                    <th scope="col"> Date</th>
                                                    <th scope="col">Image</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Preview </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($myAccerptDeliveries as $approved)
                                                <tr>
                                                    {{--<td>{{'del'.sprintf('%02d',$approved->relation_to_order->id) }}</td>--}}
                                                 {{--{{dd($approved->confirmedOrder->amount)}}--}}
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$approved->created_at->format('d-M-Y')}}</td>
                                                    <td class="budget">
                                                      <img style="width:40px;height:40px" src="{{ asset('uploads/orders/'.$approved->confirmedOrder->order->image) }}">
                                                  </td>

                                                    @if($approved->status == 0)
                                                    <td >
                                                        <span  class="badge badge-dot mr-4">
                                                           <i class="bg-info"></i>
                                                        <span class="status text-white bg-info p-1 rounded shadow-lg">Approved But Unpaid</span>

                                                        </span>
                                                    </td>
                                                        @elseif($approved->confirmedOrder->amount == $approved->confirmedOrder->due AND $approved->confirmedOrder->amount != $approved->confirmedOrder->payments)
                                                            <td>
                                                            <span  class="badge badge-dot mr-4">
                                                            <span class="status text-white bg-success p-1 rounded shadow-lg">Cash On Delivery</span>
                                                            </span>
                                                            </td>
                                                    @else
                                                        <td>
                                                            <span  class="badge badge-dot mr-4">
                                                                  <i class="bg-warning"></i>
                                                            <span class="status text-white bg-warning p-1 rounded shadow-lg">Approved But Unpaid</span>
                                                            </span>
                                                        </td>
                                                        @endif
                                                    <td><a href="#" class=" status badge badge-dot mr-4 bg-primary p-1 text-white" data-bs-toggle="modal" data-bs-target="#approved-order-{{$approved->id}}">View</a></td>
                                                </tr>
                                                    @include('admin.pages.modals.orders.delivaryApproveDetails')
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
                                {{--<li ><a class="page-link btn medibg p-2 m-2 text-white" href="{{ $delivary_complete->previousPageUrl() }}">Previous</a></li>--}}
                                {{--<li ><a class="page-link p-2 m-2 medibg text-white" href="{{ $delivary_complete->nextPageUrl() }}">Next</a></li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer_script')
@if(session('add'))
<script>
Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: '{{ session("add") }}',
  showConfirmButton: false,
  timer: 1500
});

</script>
@endif







@endsection

