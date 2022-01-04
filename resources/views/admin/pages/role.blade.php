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
                <h1 class="text-lg-center">User Roles</h1>
                <div class="card ">

                    <div class="card-body  mt-7">
                        <form action="{{route('role.add')}}" method="post">
                            @csrf
                        <div class="row offset-1  mt--6">

                            <div class="form-group col">

                                <input type="text" name="name" class="form-control" id="inputPassword4" placeholder="Search Role" required>
                            </div>
                            <div class="form-group col">
                                <button type="submit" class="btn medibg text-white">Search</button>
                            </div>

                        </div>
                        </form>
                        <div class="container-fluid mt--7">
                            <div class="card-header border-0">
                                <div class="row justify-content-end mt-2">
                                    <div class="col-md-3 ">
                                        <button type="button" class="btn medibg custom-btn text-white"
                                                data-bs-toggle="modal" data-bs-target="#addRole">New Role
                                        </button>
                                    </div>
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
                                                    <th scope="col" class="sort" data-sort="budget">Name</th>
                                                    <th scope="col" class="sort" data-sort="budget">Description</th>
                                                    <th scope="col" class="sort" data-sort="completion">Action</th>
                                                    <th scope="col"></th>
                                                </tr>
                                                </thead>
                                                <tbody class="list">
                                                @foreach($roles as $role)
                                                    @include('admin.pages.modals.roles.update')
                                                    @include('admin.pages.modals.roles.details')
                                                    @include('admin.pages.modals.roles.delete')
                                                <tr class="text-capitalize font-weight-bold">

                                                    <td>
                                                        {{$role->name}}
                                                    </td>

                                                    <td>
                                                     {{$role->description}}
                                                    </td>

                                                    <td>
                                                        <a data-bs-toggle="modal" data-bs-target="#update-Role-{{$role->id}}"class="bg-success btn-sm text-white "  ><i
                                                                    class="fas fa-edit"></i></a>
                                                        <a class="bg-info btn-sm text-white" data-bs-toggle="modal" data-bs-target="#details-Role-{{$role->id}}"><i
                                                                    class="fas fa-eye"></i></a>
                                                        <a class=" bg-danger btn-sm text-white " data-bs-toggle="modal" data-bs-target="#role-delete-{{$role->id}}"><i
                                                                    class="fas fa-trash"> </i></a>
                                                    </td>
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
                    <div class="container">
                        <div class="col-md-12">
                            <ul class="pagination offset-lg-5 mt-2">
                                <li class=" m-3 "><a class=" btn medibg text-white" href="{{ $roles->previousPageUrl() }}">Previous</a></li>
                                <li class="m-3"><a class=" btn medibg text-white" href="{{ $roles->nextPageUrl() }}">Next</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            @include('admin.pages.modals.roles.add')
        </div>
    </div>
@endsection


  
