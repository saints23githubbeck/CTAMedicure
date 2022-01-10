@extends('admin.layouts.app')

@section('content')
    <!--Container Main start-->
    <div class="height-100 bg-light">
        
       <div class="row ">
           
           <div class="col-md-12 my-5">
    @if(App\Models\Distance::where('order_id',$order_id)->exists())
    <div class="card">
        <div class="card-body">
            Your location :
            <h4>Distance : {{ App\Models\Distance::where('order_id',$order_id)->first()->distance_miles }} miles</h4>
        </div>
    </div>
    @else

        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-primary text-center my-4">Enter your delivery location</h4>
                <p class="card-text text-primary ms-3 mb-4">
                This help us pick the best suppliers associated with your given address
                </p>
                <form action="{{ route('insert.location') }}" method="POST">
                    @csrf
                    <input type="hidden" name="order_id" value="{{ $order_id }}">
                <div class="my-5 mx-5">
                    <div class="input-group">
                        
                        <input type="text" class="form-control" name="location" placeholder="Location" />
                        <div class="input-group-text">
                          
                            <label for=""> Locate me</label>
                        </div>
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


  
