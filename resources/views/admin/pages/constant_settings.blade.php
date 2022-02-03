@extends('admin.layouts.app')
@section('content')
    <!--Container Main start-->
    <div class="container">
        <div class="row">

            <div class="col-12 mt-lg-5">
                <h1 class="text-lg-center">Doctors</h1>

                <div class="card ">
                    <div class="card-body  mt-7">
                 
                        <div class="container-fluid mt--7">
                            <div class="card-header border-0">
                                <div class="row justify-content-end mt-2">
                                    <div class="col-md-3 ">
                                        <a  class="btn medibg custom-btn text-white"
                                                data-bs-toggle="modal" data-bs-target="#addUser">Doctor time
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
                                                    <th scope="col" class="sort" data-sort="budget">Doctor name</th>
                                                    <th scope="col" class="sort" data-sort="budget">Available Time</th>
                                                    <th scope="col" class="sort" data-sort="budget">Speciality</th>
                                                    <th scope="col" class="sort" data-sort="budget">Price</th>
                                                    <th scope="col" class="sort" data-sort="completion">Action</th>
                                                    <th scope="col"></th>
                                                </tr>
                                                </thead>
                                                <tbody class="list">
                                                @foreach($constants as $constant)
                                                    @include('admin.pages.modals.constant.update')
                                                    @include('admin.pages.modals.constant.details')
                                                    @include('admin.pages.modals.constant.delete')
                                                <tr>

                                                    <td class="budget">
                                                       {{ App\Models\User::find($constant->user_id)->userName }}
                                                    </td>
                                                    <td class="budget">
                                                        {{ $constant->availableTime }}
                                                     </td>
                                                    <td class="budget">
                                                        {{ $constant->speciality }}
                                                     </td>
                                                     <td class="budget">
                                                        {{ $constant->price }}
                                                     </td>
                                                    
                                               
                                                    <td>
                                                        <a data-bs-toggle="modal" data-bs-target="#update-Role-{{$constant->id}}" class="bg-success btn-sm text-white "  ><i
                                                                    class="fas fa-edit"></i></a>
                                                        <a class="bg-info btn-sm text-white" data-bs-toggle="modal" data-bs-target="#details-Role-{{$constant->id}}"><i
                                                                    class="fas fa-eye"></i></a>
                                                        <a class=" bg-danger btn-sm text-white "data-bs-toggle="modal" data-bs-target="#user-delete-{{$constant->id}}"><i
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
                    {{-- <div class="container">
                        <div class="col-md-12">
                            {{ $users->links('pagination.custom') }}

                        </div>
                    </div> --}}
                </div>

            </div>

        </div>
    </div>
    @include('admin.pages.modals.constant.add')

    
@endsection
