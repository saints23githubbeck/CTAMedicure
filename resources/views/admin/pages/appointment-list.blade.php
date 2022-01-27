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
                <h1 class="text-lg-center"> Appointments</h1>
                <div class="card-body  mt-7">
                    <div class="row offset-1  mt--6">
                        <div class="form-group col">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Incoming Appointments</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Complete Appointments</button>
                                </li>
                              </ul>
                              <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <div class="border_give">

                                        <div class="table-responsive">
                                            <table class="table my-5">
                                                <thead class="border_botttom">
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Doctor </th>
                                                    <th scope="col">Date $ Time</th>
                                                    <th scope="col">Reason</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col" >Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                @foreach($appointments as $appointment)
                                                    <tr class="text-capitalize">
                                                        <td>{{'mdc0'.$appointment->id}}</td>
                                                        <td>{{$appointment->user->profile->firstName.' '.$appointment->user->profile->lastName}}</td>
                                                        <td>{{\Carbon\Carbon::parse($appointment->consultancy->availableDate)->format('D-d-M-y').' '.$appointment->consultancy->availableTime}}</td>
                                                        <td>{{Str::limit($appointment->consultancy->reason, 10)}}</td>
                                                        @if($appointment->consultancy->status == 0)

                                                            <td>
                                                            <span  class="badge badge-dot mr-4">

                                                            <span class="status text-white bg-warning p-1 rounded shadow-lg">Unpaid</span>
                                                            </span>
                                                            </td>
                                                        @else
                                                            <td >
                                                        <span  class="badge badge-dot mr-4">

                                                        <span class="status text-white bg-success p-1 rounded shadow-lg"> Paid</span>

                                                        </span>
                                                            </td>
                                                        @endif
                                                        <td>
                                                            <a href="#"  data-bs-toggle="modal" data-bs-target="#previewApp-{{$appointment->id}}" class="btn btn-success">Preview</a>
                                                        </td>
                                                    </tr>
                                                    @include('admin.pages.modals.appointments.modals.previewApp')
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="border_give">
                                        <div class="table-responsive">
                                            <table class="table my-5">
                                                <thead class="border_botttom">

                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col"> Patients</th>
                                                    <th scope="col">Doctor</th>
                                                    <th scope="col">status </th>
                                                    <th scope="col">Medication</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($completeAppointments as $appointment)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$appointment->consultancy->user->profile->firstName.'  '.$appointment->consultancy->user->profile->lastName}}</td>
                                                    <td>{{$appointment->user->profile->firstName.'  '.$appointment->user->profile->lastName}}</td>

                                                    {{--<td>{{$appointment->consultancy->consultancyConfirm}}</td>--}}

                                                    @if($appointment->consultancy->consultancyConfirm)
                                                    <td >
                                                        <span  class="badge badge-dot mr-4">
                                                        <span class="status text-white bg-success p-1 rounded shadow-lg">Completed</span>

                                                        </span>
                                                        </td>
                                                        @endif
                                                    <td>
                                                        <a href="#"  data-bs-toggle="modal" data-bs-target="#previewMedication-{{$appointment->id}}" class="btn btn-success status text-white bg-info p-1 rounded shadow-lg">Preview</a>
                                                    </td>
                                                </tr>
                                                    @include('admin.pages.medications.previewMedication')
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
                            <ul class="pagination offset-lg-5 mt-2 mb-4">
                                <li ><a class="page-link btn medibg p-2 m-2 text-white" href="{{ $appointments->previousPageUrl() }}">Previous</a></li>
                                <li ><a class="page-link p-2 m-2 medibg text-white" href="{{ $appointments->nextPageUrl() }}">Next</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



