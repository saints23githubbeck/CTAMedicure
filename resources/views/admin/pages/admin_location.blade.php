@extends('admin.layouts.app')

@section('content')
    <!--Container Main start-->
    <div class="height-100 bg-light">
        
       <div class="row ">
           
           <div class="col-md-12 my-5">


        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-primary text-center my-4">Enter admin exact location</h4>
                <p class="card-text text-primary ms-3 mb-4">
                
                </p>
                <form action="{{ route('update.admin_location') }}" method="POST">
                    @csrf
            
                <div class="my-5 mx-5">
                    <div class="input-group">
                        
                        <input type="text" class="form-control" name="location" value="{{ $locations }}" placeholder="Location" />
                        <div class="input-group-text">
                          
                            <label for=""> Locate me</label>
                        </div>
                    </div>
                </div>
                <div class="d-grid col-6 mx-auto my-auto">
                    <button type="submit" class="btn btn-lg fw-bolder btn-danger">
                       <p class="h5 mx-auto"> update</p>
                    </button>
                </div>
            </form>
    
            </div>
        </div>

 



           </div>
       </div>
    </div>
@endsection


  
@section('footer_script')
@if(session('update'))
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
  icon: 'update',
  title: '{{ session("add") }}'
})
</script>

@endif
@endsection