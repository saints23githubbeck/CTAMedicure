@extends('admin.layouts.app')
@section('head')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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

                                <input type="text" name="search" id="search" class="form-control" placeholder="Search User" />
                            </div>
                            <div class="form-group col">
{{--                                <a type="submit"> <span class="btn medibg text-white">Search</span> </a>--}}

                            </div>

                        </div>

                        <div class="container-fluid mt--7">
                            <div class="card-header border-0">
                                <div class="row justify-content-end mt-2">
                                    <div class="col-md-3 ">
                                        <a  class="btn medibg custom-btn text-white"
                                                data-bs-toggle="modal" data-bs-target="#addUser">New User
                                        </a>
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

            </div>

        </div>
    </div>
    @include('admin.pages.modals.addUser')
    <script>
        $(document).ready(function(){

            fetch_customer_data();

            function fetch_customer_data(query = '')
            {
                $.ajax({
                    url:"{{ route('users.action') }}",
                    method:'GET',
                    data:{query:query},
                    dataType:'json',
                    success:function(data)
                    {
                        $('tbody').html(data.table_data);
                        $('#total_records').text(data.total_data);
                    }
                })
            }

            $(document).on('keyup', '#search', function(){
                var query = $(this).val();
                fetch_customer_data(query);
            });
        });
    </script>
@endsection

@section('footer')

@endsection

