@extends('admin.layouts.app')

@section('content')
    <!--Container Main start-->
<div class="container ">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body ">
                    <h2 class="fw-bolder text-center">Appointments</h2>
                    <div class="row my-3 ">
                        <div class="form-group col">

                            From
                            <input type="text" name="from_date" class="form-control"  id="from_date" placeholder=" Filter From" readonly/>
                        </div>
                        <div class="form-group col">
                            To
                            <input type="text" name="to_date" class="form-control"  id="to_date" placeholder="Filter To" readonly/>
                        </div>
                        <div class="form-group col">


                            <button type="button" id="filter" class="btn medibg text-white mt-4">Filter</button>
                            <button type="button" id="refresh" class="btn medibg text-white mt-4">Refresh</button>
                          
                            {{--<span class="btn btn-danger text-white mt-4">Cancel</span>--}}

                            {{--<button type="button" class="btn medibg text-black" name="filter" id="filter">Filter</button>--}}
                            {{--<button type="button" class="btn btn-danger" name="refresh" id="refresh">Refresh</button>--}}




                        </div>

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
                                <th scope="col">#</th>
                                <th scope="col">Doctor</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th scope="col">Reason</th>
                                <th scope="col">Status </th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody class="listing">
                                @foreach ($appointments as  $appointment)

                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $appointment->consultancyConfirm->user->profile->firstName.' '.$appointment->consultancyConfirm->user->profile->lastName}}</td>
                                    <td>{{ $appointment->availableDate }}</td>
                                    <td>{{ $appointment->availableTime }}</td>
                                    <td>{{ Str::limit($appointment->reason, '18')  }}</td>
                                    <td>
                                        @if($appointment->status == 0)
                                            <span class="badge badge-dot mr-4">
                                                <i class="bg-warning"></i>
                                                <span class="status text-white bg-warning p-1 rounded shadow-lg">Pending</span>
                                              </span>

                                        @elseif($appointment->consultancyConfirm->status == 1 )
                                            <span class="badge badge-dot mr-4">
                                                <i class="bg-info"></i>
                                                 <a href=""  data-bs-toggle="modal" data-bs-target="#preview-order-{{$appointment->id}}"><span class="status text-white bg-info p-1 rounded shadow-lg">Waiting for Delivery</span></a>
                                              </span>

                                        @endif
                                    </td>
                                    <td>
                                        <a data-bs-toggle="modal" data-bs-target="#update-appo-{{$appointment->id}}" class="bg-success btn-sm text-white "  ><i
                                                    class="fas fa-edit"></i></a>
                                        <a class="bg-info btn-sm text-white" data-bs-toggle="modal" data-bs-target="#details-appo-{{$appointment->id}}"><i
                                                    class="fas fa-eye"></i></a>
                                        <a class=" bg-danger btn-sm text-white "data-bs-toggle="modal" data-bs-target="#delete-appo-{{$appointment->id}}"><i
                                                    class="fas fa-trash"> </i></a>
                                    </td>

                               


                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                        @foreach ($appointments as $key=> $appointment)
                        @include('admin.pages.modals.appointments.modals.delete')
                        @include('admin.pages.modals.appointments.modals.edit')
                        @include('admin.pages.modals.appointments.modals.details')
                        @endforeach
                      


                    </div>
                </div>
                <div class="container">
                    <div class="col-md-12">
                        <ul class="pagination offset-lg-5 mt-2">
                            <li class=" m-3 "><a class=" btn medibg text-white" href="{{ $appointments->previousPageUrl() }}">Previous</a></li>
                            <li class="m-3"><a class=" btn medibg  text-white" href="{{ $appointments->previousPageUrl() }}">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.pages.modals.appointments.appointment')
    </div>

</div>

@endsection


@section('footer_script')
<script>
    $('#doctor_id').on('change',function(){
         var doctor_id = $(this).val();
 $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$.ajax({
 type:'POST',
 url:'/gettime',
 data:{doctor_id:doctor_id},
 success:function(data){
  $('#time').val(data);
 },
 error:function(xhr){
     console.log(xhr.responseText);
 }
 
});

    });
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


// fetch_data();
// function fetch_data(from_date = '',to_date = ''){
//     $.ajax({
// type:'POST',
// url:'/appointment/filter',
// data:{from_date:from_date,to_date:to_date},
// dataType:"json",
// success:function(data){
 
// alert('hello');


// },
// error:function(xhr){
//     console.log(xhr.responseText);
// }
// });
// }



$('#filter').click(function(){
var from_date = $('#from_date').val();
var to_date = $('#to_date').val();
if(from_date != '' && to_date != ''){
//  fetch_data(from_date,to_date);
$.ajax({
    type:'POST',
    url:'/appointment/filter',
    data:{from_date:from_date,to_date:to_date},
    dataType:'json',
    success:function(data){
        var output = '';
        var a = 1;
    for(var count = 0;count < data.length;count++){

        output += '<tr>';
        output += '<td>'+a+'</td>';
        output += '<td>'+'just for Testing'+'</td>';
        output += '<td>'+data[count].availableDate+'</td>';
        output += '<td>'+data[count].availableTime+'</td>';
        output += '<td>'+data[count].reason+'</td>';
        if(data[count].status === 0){
        output += '<td> <span class="badge badge-dot mr-4"><i class="bg-warning"></i><span class="status text-white bg-warning p-1 rounded shadow-lg">Pending</span></span></td>';
        }else{
            output += '<td><span class="badge badge-dot mr-4"><i class="bg-info"></i><a href=""  data-bs-toggle="modal" data-bs-target="#preview-order-"><span class="status text-white bg-info p-1 rounded shadow-lg">Waiting for Delivery</span></a></span></td>';
        }
        output +=  '<td class="text-right">';
        output += '<a data-bs-toggle="modal" data-bs-target="#update-appo-'+data[count].id+'" class="bg-success btn-sm text-white" ><i class="fas fa-edit"></i></a>';
        output += ' <a class="bg-info btn-sm text-white" data-bs-toggle="modal" data-bs-target="#details-appo-'+data[count].id+'"><i class="fas fa-eye"></i></a>';
        output += '<a class=" bg-danger btn-sm text-white "data-bs-toggle="modal" data-bs-target="#delete-appo-'+data[count].id+'"><i class="fas fa-trash"> </i></a>';
      
        output += '</td>';
                        
       



        output += '<tr>';
        a++;
    }
$('.listing').html(output);
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
  title: 'choose from and to date'
})

}

});


$('#refresh').click(function(){
$('#from_date').val('');
$('#to_date').val('');
location.reload();
});
$(window).ready(()=>{
     var myElement = document.querySelector("#my-element");
     myElement.addEventListener("event", handler);
});
    });
</script>

@endsection
