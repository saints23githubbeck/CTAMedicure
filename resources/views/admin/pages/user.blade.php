@extends('admin.layouts.app')
@section('head')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />--}}
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}
@endsection
@section('content')
    <!--Container Main start-->
    <div class="container">
        <div class="row">

            <div class="col-12 mt-lg-5">
                <h1 class="text-lg-center">Users</h1>

                <div class="card ">
                    <div class="card-body  mt-7">

                        <div class="row offset-1  mt--6">

                            <div class="form-group col">

                                <input type="text" name="search" id="search" class="form-control"
                                       placeholder="Search User"/>
                            </div>
                            <div class="form-group col">
                                <a type="submit"> <span class="btn medibg text-white">Search</span> </a>

                            </div>

                        </div>
                        @can('isAdmin','App\Models\User')

                            <div class="container-fluid mt--7">
                                <div class="card-header border-0">
                                    <div class="row justify-content-end mt-2">
                                        <div class="col-md-3 ">

                                            <a class="btn medibg custom-btn text-white"
                                               data-bs-toggle="modal" data-bs-target="#addUser">New User
                                            </a>

                                        </div>
                                    </div>
                                </div>
                                @endcan
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
                                                        <th scope="col" class="sort" data-sort="budget">Photo</th>
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
                                                        @include('admin.pages.modals.users.delete')
                                                        <tr>

                                                            <td class="budget">{{$user->userName}}</td>
                                                            <td>
                                                                <img src="{{'/public/uploads/user'.$user->profile->img}}"
                                                                     alt="{{$user->name}}" width="50"
                                                                     class="img-fluid rounded-circle img-thumbnail">
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

                        {{-- <span class="status">{{$user->role->name}}</span>
                    --}}
                    </span>

                                                                <span class="status">{{$user->role->name ?? 'no'}}</span>
                                                                </span>

                                                            </td>
                                                            <td>
                                                                @can('isAdmin','App\Models\User')
                                                                    <a data-bs-toggle="modal"
                                                                       data-bs-target="#update-Role-{{$user->id}}"
                                                                       class="bg-success btn-sm text-white "><i
                                                                                class="fas fa-edit"></i></a>
                                                                    <a class=" bg-danger btn-sm text-white "
                                                                       data-bs-toggle="modal"
                                                                       data-bs-target="#user-delete-{{$user->id}}"><i
                                                                                class="fas fa-trash"> </i></a>
                                                                @endcan
                                                                <a class="bg-info btn-sm text-white"
                                                                   data-bs-toggle="modal"
                                                                   data-bs-target="#details-Role-{{$user->id}}"><i
                                                                            class="fas fa-eye"></i></a>

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
                    <div class="container mb-3">
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <ul class="pagination offset-lg-5 ">
                                    <li><a class="page-link btn medibg p-2 m-2 text-white"
                                           href="{{ $users->previousPageUrl() }}">Previous</a></li>
                                    <li><a class="page-link p-2 m-2 medibg text-white"
                                           href="{{ $users->nextPageUrl() }}">Next</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
    @include('admin.pages.modals.addUser')
    <script>
        $(document).ready(function () {

            fetch_customer_data();

            function fetch_customer_data(query = '') {
                $.ajax({
                    url: "{{ route('users.action') }}",
                    method: 'GET',
                    data: {query: query},
                    dataType: 'json',
                    success: function (data) {
                        $('tbody').html(data.table_data);
                        $('#total_records').text(data.total_data);
                    }
                })
            }

            $(document).on('keyup', '#search', function () {
                var query = $(this).val();
                fetch_customer_data(query);
            });
        });
    </script>
@endsection

{{--@section('footer')--}}

{{--@endsection--}}

