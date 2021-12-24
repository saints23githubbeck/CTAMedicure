@extends('admin.layouts.app')

@section('content')
    <!--Container Main start-->
    <div class="container">

@include('admin.pages.modals.orders.order')
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body mx-2 my-5">
                            <h2 class="fw-bolder text-center">Prescriptions</h2>
                            <div class="row my-3 ">
                                <div class="form-group col">

                                    <input type="text" class="form-control" id="inputEmail4" placeholder=" Filter From">
                                </div>
                                <div class="form-group col">

                                    <input type="text" class="form-control" id="inputPassword4" placeholder="Filter To">
                                </div>
                                <div class="form-group col">
                                    <span class="btn medibg text-white">Filter</span>
                                    <span class="btn btn-danger text-white">Cancel</span>
                                </div>

                            </div>
                            <div class="row justify-content-end mb-3">
                                <div class="col-md-3 ">
                                    <button type="button" class="btn medibg custom-btn text-white" data-bs-toggle="modal" data-bs-target="#order">Buy Prescription</button>
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
                                                    <th scope="col" class="sort" data-sort="budget">Order image</th>
                                                    <th scope="col" class="sort" data-sort="budget">quantity</th>
                                                    <th scope="col" class="sort" data-sort="budget">Note</th>
                                                    {{--<th scope="col" class="sort" data-sort="budget">option</th>--}}
                                                    <th scope="col" class="sort" data-sort="status">Status</th>
                                                    <th scope="col" class="sort" data-sort="completion">Action</th>
                                                    <th scope="col"></th>
                                                </tr>
                                                </thead>
                                                <tbody class="list">

                                                @foreach (App\Models\Order::all() as $order)
                                                <tr>

                                                    <td class="budget">
                                                     <img style="width:50px;height:50px"src="{{ asset('uploads/orders/'.$order->image) }}">
                                                    </td>
                                                    <td>
                                             {{ $order->quantity }}
                                                    </td>
                                                    <td>
                                                        {{ $order->note }}

                                            @if($order->status == 0)
                                            <td class="badge badge-dot mr-4">

                                                <span class="status text-white bg-warning p-1 rounded shadow-lg">Pending</span>
                                              </td>
                        
                                            @else
                                            <td class="badge badge-dot mr-4">

                                                   <span class="status text-white bg-success p-1 rounded shadow-lg">Accepted Waiting For Assign</span>
                                              </td>
                        
                                            @endif

                                                    <td class="text-right ">
                                                        <div class="dropdown">
                                                            <a class="btn btn-lg medibg shadow btn-icon-only text-white"
                                                               href="#"
                                                               role="button" data-toggle="dropdown" aria-haspopup="true"
                                                               aria-expanded="false">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                <a class="dropdown-item" href="#">Update</a>
                                                                <a class="dropdown-item" href="#">Delete</a>
                                                                <a class="dropdown-item" href="#">View</a>
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
                        <div class="container">
                            <div class="col-md-12">
                                <ul class="pagination offset-lg-5 mt-2">
                                    <li class=" m-3 "><a class=" btn medibg text-white" href="#">Previous</a></li>
                                    <li class="m-3"><a class=" btn medibg text-white" href="#">Next</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
    </div>
@endsection


@section('footer_script') 
@if(session('add'))
<script>
    const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: '{{ session("add") }}'
})
</script>

@endif
@endsection

