@extends('admin.layouts.app')

@section('content')
        <div class="container-fluid">
            <section class="delivary">

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card_custom">
                                <div class="card-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12 ">
                                                <div class="top clearfix">
                                                    <div class="col-lg-6">
                                                        <h1 class="float-sm-start float-none">Deliveries</h1>
                                                    </div>


                                                    {{--<div class="tools float-sm-end float-none">--}}

                                                        {{--<button id="minimize" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-group-task" aria-expanded="false" aria-controls="collapse-group-task">--}}
                                                            {{--<i class="fas fa-minus"></i>--}}
                                                        {{--</button>--}}
                                                        {{--<button onclick="loading()"  id="load"> <i class="fas fa-redo-alt"></i>  </button>--}}

                                                        {{--<button onclick="openFullscreen();" id="show"><i class="far fa-expand-arrows"></i></button>--}}

                                                        {{--<button onclick="closeFullscreen();" id="hide"><i class="fas fa-compress-arrows-alt"></i></button>--}}

                                                    {{--</div>--}}

                                                </div>
                                            </div>

                                            <div class="collapse show" id="collapse-group-task">

                                                <div class="col-lg-12">
                                                    <p class="para">Find courier devlivary with your location.</p>
                                                </div>
                                                <div class="col-lg-11">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="row form_custom">
                                                                <div class="col-sm-6 my-1">
                                                                    <label>LOCATION</label>
                                                                    <input type="text" class="form-control"  aria-label="First name">
                                                                </div>
                                                                <div class="col-sm-6 my-1">
                                                                    <label>SUB LOCATION</label>
                                                                    <input type="text" class="form-control"  aria-label="Last name">
                                                                </div>
                                                            </div>
                                                        </div>




                                                        <div class="col-lg-12">
                                                            <div class="table_content">
                                                                <div class="table-responsive">
                                                                    <table class="table table-borderless table-hover">
                                                                        <thead>
                                                                        <tr>

                                                                            <th scope="col">#</th>
                                                                            <th scope="col">UserName</th>
                                                                            <th scope="col">Phone Number</th>
                                                                            <th scope="col">Location</th>
                                                                            <th scope="col">Assign</th>

                                                                        </tr>
                                                                        </thead>
                                                                        {{--{{dd($userDeliveries)}}--}}
                                                                        <tbody>
                                                                        @foreach($userDeliveries as $deliver)
                                                                            <tr>
                                                                                <td>{{$loop->iteration}}</td>
                                                                                <td>{{$deliver->userName}}</td>
                                                                                <td>{{$deliver->contactNumber}}</td>
                                                                                <td>{{$deliver->address->location}}</td>
                                                                                @if($deliver->address->location == $approved->user->address->location)
                                                                                    <td>
                                                                                        {{--<a  class="bg-success btn-sm text-white" data-bs-target="modal" data-bs-toggle="#assign-delivery">assign</a>--}}
                                                                                        <a href=""  data-bs-toggle="modal" data-bs-target="#assign-delivery-{{$deliver->id}}-{{$approved->id}}">
                                                                                            <span class="status badge text-white bg-info p-1 rounded shadow-lg"></span>
                                                                                        </a>

                                                                                        @include('admin.pages.modals.deliveries.assign')
                                                                                    </td>
                                                                                @else
                                                                                    <td>
                                                                                        {{--<a  class="bg-success btn-sm text-white" data-bs-target="modal" data-bs-toggle="#assign-delivery">assign</a>--}}
                                                                                        <a href=""  data-bs-toggle="modal" data-bs-target="">
                                                                                            <span class="status text-white bg-info p-1 rounded shadow-lg">
                                                                                                Access Limited
                                                                                            </span>
                                                                                        </a>

                                                                                        {{--@include('admin.pages.modals.deliveries.assign')--}}
                                                                                    </td>
                                                                                @endif
                                                                                {{--<td><span class="text-success fw-bold">completed</span></td>--}}
                                                                                {{--<td><a href="#" class="btn btn_custom">view</a></td>--}}

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



                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
        </div>
    </div>
    @include('admin.pages.modals.addUser')
@endsection

@section('footer_script')
@if(session('add'))
<script>
Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: '{{ session("add") }}',
  showConfirmButton: false,
  timer: 1500
});

</script>
@endif








@endsection



