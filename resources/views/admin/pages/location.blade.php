@extends('admin.layouts.app')

@section('content')
    <!--Container Main start-->
    <div class="height-100 bg-light">
        
       <div class="row ">
           
           <div class="col-md-12 my-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-primary text-center my-4">Enter your delivery location</h4>
                        <p class="card-text text-primary ms-3 mb-4">
                        This help us pick the best suppliers associated with your given address
                        </p>
                        <div class="my-5 mx-5">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Location" />
                                <div class="input-group-text">
                                    <input class="form-check-input mx-2" type="radio" value="" />
                                    <label for=""> Locate me</label>
                                </div>
                            </div>
                        </div>
                        <div class="d-grid col-6 mx-auto my-auto">
                            <button class="btn btn-lg fw-bolder btn-danger">
                               <p class="h5 mx-auto"> FIND</p>
                            </button>
                        </div>
                    </div>
                </div>
           </div>
       </div>
    </div>
@endsection


  
