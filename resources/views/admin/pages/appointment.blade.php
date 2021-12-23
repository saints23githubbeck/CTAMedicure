@extends('admin.layouts.app')

@section('content')
    <!--Container Main start-->
<div class="container ">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body ">
                    <h2 class="fw-bolder text-center">Appointments</h2>
                    <div class="row my-3 ">
                        <h2 class=" text-center"> Filter</h2>
                        <div class="form-group col">

                            <input type="text" class="form-control" id="inputEmail4" placeholder="From">
                        </div>
                        <div class="form-group col">

                            <input type="text" class="form-control" id="inputPassword4" placeholder="To">
                        </div>
                        <div class="form-group col">
                            <span class="btn medibg text-white">Filter</span>
                            <span class="btn btn-danger ">Cancel</span>
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
                                <th scope="col">Delivery Name</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Email </th>
                                <th scope="col">Location</th>
                                <th scope="col">Status </th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Lorem </td>
                                <td>0283747478</td>
                                <td>otto@mail.com</td>
                                <td>Lorem</td>
                                <td class="text-success">Completed</td>
                                <td>
                                    <button type="button" class="btn btn-light" data-mdb-ripple-color="dark">View</button>
                                    <button type="button" class="btn btn-light" data-mdb-ripple-color="dark">View</button>
                                    <button type="button" class="btn btn-light" data-mdb-ripple-color="dark">View</button>
                                </td>                                </tr>
                            <tr>
                                <td>Lorem </td>
                                <td>0283747478</td>
                                <td>otto@mail.com</td>
                                <td>Lorem</td>
                                <td class="text-danger">Failed</td>
                                <td>
                                    <button type="button" class="btn btn-light" data-mdb-ripple-color="dark">View</button>
                                    <button type="button" class="btn btn-light" data-mdb-ripple-color="dark">View</button>
                                    <button type="button" class="btn btn-light" data-mdb-ripple-color="dark">View</button>
                                </td>                                </tr>
                            <tr>
                                <td>Lorem </td>
                                <td>0283747478</td>
                                <td>otto@mail.com</td>
                                <td>Lorem</td>
                                <td class="text-warning">In Route</td>
                                <td>
                                    <button type="button" class="btn btn-light" data-mdb-ripple-color="dark">View</button>
                                    <button type="button" class="btn btn-light" data-mdb-ripple-color="dark">View</button>
                                    <button type="button" class="btn btn-light" data-mdb-ripple-color="dark">View</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="container">
                    <div class="col-md-12">
                        <ul class="pagination offset-lg-5 mt-2">
                            <li class=" m-3 "><a class=" btn medibg text-white" href="#">Previous</a></li>
                            <li class="m-3"><a class=" btn medibg  text-white" href="#">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.pages.modals.appointments.appointment')
    </div>

</div>

@endsection



