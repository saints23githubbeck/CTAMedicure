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
                            <form action="#">
                              
                            <div class="row my-3 ">
                                <div class="form-group col">
                                     From
                                    <input type="text" name="from"  class="form-control" id="from" placeholder=" Filter From" >
                                </div>
                                <div class="form-group col">
                                     To
                                    <input type="text" name="to" class="form-control" id="to" placeholder="Filter To">
                                </div>
                                <div class="form-group col">
                                    <button class="btn medibg text-black" id="filter">Filter</button>
                                    <span class="btn btn-danger ">Cancel</span>
                               
                                </div>

                            </div>
                        </form>
                            <div class="row justify-content-end mb-3">
                                <div class="col-md-3 ">
                                    <button type="button" class="btn medibg custom-btn text-black" data-bs-toggle="modal" data-bs-target="#order">Buy Prescription</button>
                               
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
                                                    <th scope="col" class="sort" data-sort="budget">option</th>
                                                    <th scope="col" class="sort" data-sort="status">Status</th>
                                                    <th scope="col" class="sort" data-sort="completion">Action</th>
                                                  
                                                </tr>
                                                </thead>
                                                <tbody class="list">
                                                {{-- @php 
                                                   
                                                $orders = App\Models\Order::Paginate(2);
                                                   
                                                @endphp --}}

                                               
                                                @forelse ($orders as $order)
                                                <tr>

                                                    <td class="budget">
                                                     <img style="width:100px;height:100px"src="{{ asset('uploads/orders/'.$order->image) }}">
                                                    </td>
                                                    <td>
                                             {{ $order->quantity }}
                                                    </td>
                                                    <td>
                                                        {{ $order->note }}
                                                    </td>
                                                    <td>{{ App\Models\DeliveryOption::find($order->delivery_option_id)->option }}</td>
                                                 
                                                    <td>
                                            @if($order->status == 0)
                                            <span class="badge badge-dot mr-4">
                                                <i class="bg-secondary"></i>
                                                <span class="status text-dark">In complete</span>
                                              </span>
                        
                                            @else
                                            <span class="badge badge-dot mr-4">
                                                <i class="bg-success"></i>
                                                <span class="status text-dark">completed</span>
                                              </span>
                        
                                            @endif
                   

                                             </td>

                                                    <td class="text-right">
                                                        <div class="dropdown">
                                                            <a class="btn btn-lg medibg shadow btn-icon-only text-dark"
                                                               href="#"
                                                               role="button" data-toggle="dropdown" aria-haspopup="true"
                                                               aria-expanded="false">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                <a class="dropdown-item" href="{{ route('edit.prescription',$order->id) }}">Update</a>
                                                                <a class="dropdown-item" href="{{ route('delete.prescription',$order->id) }}">Delete</a>
                                                                <a class="dropdown-item" href="{{ route('view.prescription',$order->id) }}"> view </a>
   

    
    

                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                                @empty
                                                <tr>
<td colspan="6">No prescriptions found.</td>

                                                </tr>
 

                                                @endforelse
                                                
                                                    <tr>

                                                    <td class="budget">
                                                        ghfdh v gff vf gjfhk
                                                    </td>
                                                    <td>
                                             
                                                    </td>
                                                    <td>
                                                        <div class="avatar-group">
                                                            02:pm
                                                        </div>
                                                    </td>
                                                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-success"></i>
                        <span class="status">completed</span>
                      </span>
                                                    </td>

                                                    <td class="text-right">
                                                        <div class="dropdown">
                                                            <a class="btn btn-lg medibg shadow btn-icon-only text-dark"
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
                                                {{-- <tr>

                                                    <td class="budget">
                                                        ghfdh v gff vf gjfhk
                                                    </td>
                                                    <td>
                                                          <span class="badge badge-dot mr-4">

                                                            <span class="status">54, dec 2022</span>
                                                          </span>
                                                    </td>
                                                    <td>
                                                        <div class="avatar-group">
                                                            02:pm
                                                        </div>
                                                    </td>
                                                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-success"></i>
                        <span class="status">completed</span>
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
                                                                <a class="dropdown-item" href="#">Update</a>
                                                                <a class="dropdown-item" href="#">Delete</a>
                                                                <a class="dropdown-item" href="#">View</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr> --}}
                                               
                                             
                                                


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="col-md-12">
                             
                     {{ $orders->links('admin.pages.custom_paginate') }}
                            
                    </div>
                        </div>
                    </div>
                </div>

            </div>
    </div>
@endsection


@section('footer_script') 
<script>
    $(document).ready(function(){
$.datepicker.setDefaults({
 dateFormat: 'yy-mm-dd'
});

$(function(){
$('#from').datepicker();
$('#to').datepicker();

});

$('#filter').click(function(){
var from_date = $('#from').val();
var to_date = $('#to').val();
if(from_date != '' && to_date != ''){

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$.ajax({
type:'POST',
url:'/filter/prescription',
data:{from:from_date,to:to_date},
success:function(data){
    $('.list').html(data);
},
error:function(xhr){
    console.log(xhr.responseText);
}
});


}else{
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
  icon: 'warning',
  title: 'You must select from and to both'
})
}
});


    });
</script>
<!--custom modal end-------->
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

