@extends('admin.layouts.app')

@section('content')
    <!--Container Main start-->
    <div class="height-100 bg-light">
        
       <div class="row ">
           
           <div class="col-md-12 my-5">
@if (App\Models\Address::where('id',1)->exists())
<div class="card">
    <div class="card-body">
        <h4 class="card-title text-primary text-center my-4">Enter admin exact location</h4>
        <p class="card-text text-primary ms-3 mb-4">
        
        </p>
        <form action="{{ route('update.admin_location') }}" method="POST">
            @csrf
    
        <div class="my-5 mx-5">
            <div class="input-group">
                <div class="input-group-text">
                  
                    <label for="">contact</label>
                </div>
      
                <input type="text" class="form-control" name="contact" value="{{ App\Models\Address::find(1)->contact }}" placeholder="contact" />
               
            </div>
        </div>
        <div class="my-5 mx-5">
            <div class="input-group">
                <div class="input-group-text">
                  
                    <label for=""> Location</label>
                </div>
      
                <input type="text" class="form-control" name="location" value="{{ App\Models\Address::find(1)->location }}" placeholder="Location" />
               
            </div>
        </div>
        <div class="my-5 mx-5">
            <div class="input-group">
                <div class="input-group-text">
                  
                    <label for=""> Country</label>
                </div>
      
                <input type="text" class="form-control" name="country" value="{{ App\Models\Address::find(1)->country }}" placeholder="country" />
               
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
@else
<div class="card">
    <div class="card-body">
        <h4 class="card-title text-primary text-center my-4">Enter admin exact location</h4>
        <p class="card-text text-primary ms-3 mb-4">
        
        </p>
        <form action="{{ route('add.admin_location') }}" method="POST">
            @csrf
            <div class="my-5 mx-5">
                <div class="input-group">
                    <div class="input-group-text">
                      
                        <label for="">Contact</label>
                    </div>
          
                    <input type="text" class="form-control" name="contact"  placeholder="contact" />
                   
                </div>
            </div>
            <div class="my-5 mx-5">
                <div class="input-group">
                    <div class="input-group-text">
                      
                        <label for="">Location</label>
                    </div>
          
                    <input type="text" class="form-control" name="location" placeholder="Location" />
                   
                </div>
            </div>
            <div class="my-5 mx-5">
                <div class="input-group">
                    <div class="input-group-text">
                      
                        <label for="">Country</label>
                    </div>
          
                    <input type="text" class="form-control" name="country"  placeholder="country" />
                   
                </div>
            </div>
    
        <div class="d-grid col-6 mx-auto my-auto">
            <button type="submit" class="btn btn-lg fw-bolder btn-danger">
               <p class="h5 mx-auto"> Add</p>
            </button>
        </div>
    </form>

    </div>
</div>



@endif



 



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