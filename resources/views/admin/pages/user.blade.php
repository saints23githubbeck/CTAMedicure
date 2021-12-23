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
                <h1 class="text-lg-center">Users</h1>
                <form action="{{route('users')}}" method="GET" role="search" name="term">
                <div class="card ">
                    <div class="card-body  mt-7">

                        <div class="row offset-1  mt--6">

                            <div class="form-group col">

                                <input type="text" class="form-control" id="inputPassword4" placeholder="Search user"
                                name="term">
                            </div>
                            <div class="form-group col">
                                <button type="submit"> <span class="btn medibg text-white">Search</span> </button>

                            </div>

                        </div>
                        <div class="container-fluid mt--7">
{{--                            <div class="card-header border-0">--}}
{{--                                <div class="row justify-content-end mt-2">--}}
{{--                                    <div class="col-md-3 ">--}}
{{--                                        <button type="button" class="btn medibg custom-btn text-white"--}}
{{--                                                data-bs-toggle="modal" data-bs-target="#addUser">New User--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

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
                                                    <th scope="col" class="sort" data-sort="budget">Email</th>
                                                    <th scope="col" class="sort" data-sort="budget">Contact</th>
                                                    <th scope="col" class="sort" data-sort="status">Role</th>
                                                    <th scope="col" class="sort" data-sort="completion">Action</th>
                                                    <th scope="col"></th>
                                                </tr>
                                                </thead>
                                                <tbody class="list">
                                                @foreach($users as $user)
                                                    @include('admin.pages.modals.users.update')
                                                    @include('admin.pages.modals.users.details')
                                                <tr>

                                                    <td class="budget">
                                                        {{$user->userName}}
                                                    </td>
                                                    <td>
                                                          <span class="badge badge-dot mr-4">

                                                            <span class="status">  {{$user->email}}</span>
                                                          </span>
                                                    </td>
                                                    <td>
                                                        <div class="avatar-group">
                                                            {{$user->contactNumber}}
                                                        </div>
                                                    </td>
                                                    <td>
                      <span class="badge badge-dot mr-4">
                        <span class="status">{{$user->role->name}}</span>
                      </span>
                                                    </td>

                                                    <td class="text-right">
                                                        <div class="dropdown">
                                                            <a class="btn btn-lg medibg shadow btn-icon-only text-light"
                                                               href="#"
                                                               role="button" data-toggle="dropdown" aria-haspopup="true"
                                                               aria-expanded="false">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#update-Role-{{$user->id}}">Update</a>
                                                                <a class="dropdown-item" href="{{route('users.destroy',$user->id)}}">Delete</a>

                                                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#details-Role-{{$user->id}}">View</a>
                                                            </div>
                                                        </div>
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
                            {{ $users->links('pagination.custom') }}

                        </div>
                    </div>
                </div>
                </form>
            </div>

        </div>
    </div>
    @include('admin.pages.modals.addUser')
@endsection



