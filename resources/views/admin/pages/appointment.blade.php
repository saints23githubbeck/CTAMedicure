@extends('admin.layouts.app')

@section('content')
    <!--Container Main start-->
<div class="container ">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body ">
                    <h2 class="fw-bolder text-center">Appointments</h2>
                    @if (session('delete_message'))
                     <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        <strong>{{ session('delete_message') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                     @endif
                    <div class="row my-3 ">
                        <div class="form-group col">

                            From
                            <input type="date" name="form_date" class="form-control"  id="from_date" placeholder=" Filter From">
                        </div>
                        <div class="form-group col">
                            To
                            <input type="date" name="to_date" class="form-control"  id="to_date" placeholder="Filter To">
                        </div>
                        <div class="form-group col">


                            <span class="btn medibg text-white mt-4">Filter</span>
                            {{--<span class="btn btn-danger text-white mt-4">Cancel</span>--}}

                            {{--<button type="button" class="btn medibg text-black" name="filter" id="filter">Filter</button>--}}
                            {{--<button type="button" class="btn btn-danger" name="refresh" id="refresh">Refresh</button>--}}




                        </div>

                    </div>
                    <div class="row justify-content-end mb-3">
                        <div class="col-md-3 ">
                            <button type="button" class="btn medibg custom-btn text-white" data-bs-toggle="modal" data-bs-target="#appointment">New Appointments</button>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table my-5">
                            <thead>
                            <tr>
                                <th scope="col">consultancy</th>
                                <th scope="col">Doctor Name</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th scope="col">Reason</th>
                                <th scope="col">Status </th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($appointments as $key=> $appointment)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $appointment->consultancyConfirm->user->profile->firstName.' '.$appointment->consultancyConfirm->user->profile->firstName}}</td>
                                    <td>{{ $appointment->availableDate }}</td>
                                    <td>{{ $appointment->availableTime }}</td>
                                    <td>{{ Str::limit($appointment->reason, '18')  }}</td>
                                    <td>
                                        @if($appointment->status == 0)
                                            <span class="badge badge-dot mr-4">
                                                <i class="bg-warning"></i>
                                                <span class="status text-white bg-warning p-1 rounded shadow-lg">Pending</span>
                                              </span>

                                        @elseif($appointment->consultancyConfirm->status == 1 )
                                            <span class="badge badge-dot mr-4">
                                                <i class="bg-info"></i>
                                                 <a href=""  data-bs-toggle="modal" data-bs-target="#preview-order-{{$appointment->id}}"><span class="status text-white bg-info p-1 rounded shadow-lg">Waiting for Delivery</span></a>
                                              </span>

                                        @endif
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-lg medibg text-white shadow btn-icon-only"
                                               href="#"
                                               role="button" data-toggle="dropdown" aria-haspopup="true"
                                               aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu ">
                                                <a class="dropdown-item  bg-success text-white text-center" data-bs-toggle="modal" data-bs-target="#update-appo-{{$appointment->id}}">Update</a>
                                                <a class="dropdown-item  bg-danger text-white text-center" data-bs-toggle="modal" data-bs-target="#delete-appo-{{$appointment->id}}">Delete</a>
                                                <a class="dropdown-item btn  text-center" data-bs-toggle="modal" data-bs-target="#details-appo-{{$appointment->id}}">View</a>
                                            </div>
                                        </div>
                                    </td>
                                    @include('admin.pages.modals.appointments.modals.delete')
                                    @include('admin.pages.modals.appointments.modals.edit')
                                    @include('admin.pages.modals.appointments.modals.details')
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
                <div class="container">
                    <div class="col-md-12">
                        <ul class="pagination offset-lg-5 mt-2">
                            <li class=" m-3 "><a class=" btn medibg text-white" href="{{ $appointments->previousPageUrl() }}">Previous</a></li>
                            <li class="m-3"><a class=" btn medibg  text-white" href="{{ $appointments->previousPageUrl() }}">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.pages.modals.appointments.appointment')
    </div>

</div>

@endsection



