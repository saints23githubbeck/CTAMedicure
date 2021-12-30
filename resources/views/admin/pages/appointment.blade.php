@extends('admin.layouts.app')

@section('content')
    <!--Container Main start-->
<div class="container ">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body justify-content-lg-between">
                    <h2 class="fw-bolder text-center">Appointments</h2>
                    @if (session('delete_message'))
                     <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        <strong>{{ session('delete_message') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                     @endif
                        <div class="col-4">
                            <form action="{{ route('appoinSearch') }}" method="GET">
                                <label for="start">From</label>
                                <input type="date" class="form-control" name="start" value="{{ $start??"" }}" id="start">
                                <label for="end">To</label>
                                <input type="date" class="form-control" name="end" value="{{ $end??"" }}" id="end">
                                <button style="cursor: pointer" type="submit" class="btn btn-primary">Filter</button>
                            </form>
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
                                <th scope="col">Sl</th>
                                <th scope="col">Doctor Name</th>
                                <th scope="col">Date</th>
                                <th scope="col">Comment</th>
                                <th scope="col">Status </th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                            </thead>
                            @isset($appoinmentsSearch)
                            <tbody>
                                @foreach ($appoinmentsSearch as $key=> $apoinement)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $apoinement->doctor_name }}</td>
                                    <td>{{ $apoinement->date }}</td>
                                    <td>{{ Str::limit($apoinement->comment, '10') }}</td>
                                    <td>Status</td>
                                    <td>
                                        <a href="{{ route('appoinmentEdit',$apoinement->id) }}" class="btn-success">Edit</a>
                                        <a href="{{ route('apoinmentDelete',$apoinement->id) }}" class="btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            @else
                            <tbody>
                                @foreach ($apoinements as $key=> $apoinement)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $apoinement->doctor_name }}</td>
                                    <td>{{ $apoinement->date }}</td>
                                    <td>{{ Str::limit($apoinement->comment, '10') }}</td>
                                    <td>Status</td>
                                    <td>
                                        <a href="{{ route('appoinmentEdit',$apoinement->id) }}" class="btn-success">Edit</a>
                                        <a href="{{ route('apoinmentDelete',$apoinement->id) }}" class="btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            @endisset
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



