@extends('admin.layouts.app')

@section('content')
    <!--Container Main start-->
    <div class="height-100 bg-light">


            <div class="row">
                <div class="card">
                    <div class="card-body mx-2 my-5">
                        <h2 class="fw-bolder text-center">User Roles</h2>
                        <div class="col-md-12 mt-3">
                            <span class="btn  df-color text-white">New Role</span>
                        </div>

                        <div class="table-responsive">
                            <table class="table my-5">
                                <thead>
                                <tr>
                                    <th scope="col"> Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Lorem </td>
                                    <td>Lorem</td>
                                    <td>
                                        <button type="button" class="btn btn-light" data-mdb-ripple-color="dark">View</button>
                                        <button type="button" class="btn btn-light" data-mdb-ripple-color="dark">View</button>
                                        <button type="button" class="btn btn-light" data-mdb-ripple-color="dark">View</button>
                                    </td>                                </tr>
                                <tr>
                                    <td>Lorem </td>
                                    <td>Lorem</td>
                                    <td>
                                        <button type="button" class="btn btn-light" data-mdb-ripple-color="dark">View</button>
                                        <button type="button" class="btn btn-light" data-mdb-ripple-color="dark">View</button>
                                        <button type="button" class="btn btn-light" data-mdb-ripple-color="dark">View</button>
                                    </td>                                </tr>
                                <tr>
                                    <td>Lorem </td>
                                    <td>0283747478</td>
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
                                <li class=" m-3 "><a class=" btn df-color text-white" href="#">Previous</a></li>
                                <li class="m-3"><a class=" btn df-color text-white" href="#">Next</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection


  
