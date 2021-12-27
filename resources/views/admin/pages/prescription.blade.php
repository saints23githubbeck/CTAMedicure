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
                                    
                                     From
                                    <input type="text" name="form_date" class="form-control" readonly id="from_date" placeholder=" Filter From">
                                </div>
                                <div class="form-group col">
                                     To
                                    <input type="text" name="to_date" class="form-control" readonly id="to_date" placeholder="Filter To">
                                </div>
                                <div class="form-group col">


                                    <span class="btn medibg text-white mt-4">Filter</span>
                                    <span class="btn btn-danger text-white mt-4">Cancel</span>

                                    <button type="button" class="btn medibg text-black" name="filter" id="filter">Filter</button>
                                    <button type="button" class="btn btn-danger" name="refresh" id="refresh">Refresh</button>

                               


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
                                                    <th scope="col" class="sort" data-sort="status">Status</th>
                                                    <th scope="col" class="sort" data-sort="completion" class="text-r">Action</th>
                                                    
                                                </tr>
                                                </thead>
                                                <tbody class="list">

                                                @php

                                                $orders = App\Models\Order::Paginate(2);

                                                @endphp

                                                {{-- @php 
                                                   
                                                $orders = App\Models\Order::Paginate(2);
                                                   
                                                @endphp --}}



                                                @foreach ($orders as $order)
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


                                                   <span class="status text-white bg-success p-1 rounded shadow-lg">completed</span>

                                                <a href=""  data-bs-toggle="modal" data-bs-target="#preview-order-{{$order->confirmedOrder}}"><span class="status text-white bg-success p-1 rounded shadow-lg">Accepted Review Now</span></a>

                                              </td>

                                            @endif

                                                    <td class="text-right ">
                                                        <a class="btn btn-warning" href="{{ route("edit.prescription",$order->id) }}">Update</a>
                                                        <a class="btn btn-danger" href="{{ route("delete.prescription",$order->id) }}">Delete</a>
                                                        <a class="btn btn-success" href="{{ route("view.prescription",$order->id) }}">View</a>
                                                        <a class="btn btn-primary" href="{{ route("status.prescription",$order->id) }}">Status</a>
                                                      
                                                        {{-- <div class="dropdown">
                                                            <a class="btn btn-lg medibg shadow btn-icon-only text-white"
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
                                                    @include('admin.pages.modals.orders.previewOrder')
                                                @endforeach


                                                            </div>
                                                        </div> --}}
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


                     {{ $orders->links('admin.pages.custom_paginate') }}


                    </div>

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
$('#from_date').datepicker();
$('#to_date').datepicker();

});
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

fetch_data();
function fetch_data(from_date = '',to_date = ''){
    $.ajax({
type:'POST',
url:'/filter/prescription',
data:{from_date:from_date,to_date:to_date},
dataType:"json",
success:function(data){
 
    var output = '';
    for(var count = 0;count < data.length;count++){
        output += '<tr>';
           
        output += "<td><img src={{ URL::to('/') }}/uploads/orders/"+data[count].image+" width='70px'/></td>";
        // output += '<td><img src="'+"asset('uploads/orders/"+data[count].image+')"></td>';

        output += '<td>'+data[count].quantity+'</td>';
        output += '<td>'+data[count].note+'</td>';
        if(data[count].status === 0){
        output += '<td><span class="status text-white bg-warning p-1 rounded shadow-lg">Pending</span></td>';
        }else{
            output += '<td><span class="status text-white bg-success p-1 rounded shadow-lg">completed</span></td>';
        }
        output +=  '<td class="text-right">';
        output += '<a class="btn btn-warning" href={{ route("edit.prescription",$order->id) }}>Update</a>';
        output += '<a class="btn btn-danger" href={{ route("delete.prescription",$order->id) }}>Delete</a>';
        output += '<a class="btn btn-success" href={{ route("view.prescription",$order->id) }}>View</a>';
        output += '<a class="btn btn-primary" href={{ route("status.prescription",$order->id) }}>Status</a>';
      
        output += '</td>';
                        
       



        output += '<tr>';
    }
$('.list').html(output);

},
error:function(xhr){
    console.log(xhr.responseText);
}
});
}

$('#filter').click(function(){
var from_date = $('#from_date').val();
var to_date = $('#to_date').val();
if(from_date != '' && to_date != ''){
 fetch_data(from_date,to_date);
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
  title: 'choose from and to date'
})

}

});

$('#refresh').click(function(){
$('#from_date').val('');
$('#to_date').val('');
location.reload();
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

