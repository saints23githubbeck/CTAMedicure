@extends('admin.layouts.app')

@section('content')
    <!--Container Main start-->
    <div class="height-100 bg-light">
        
       <div class="row ">
           
           <div class="col-md-6 my-5">
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
           <div class="row">
               <div class="card">
                   <div class="card-body mx-2 my-5">
                       <h2 class="fw-bolder">DELIVERIES</h2>
                       <h4 class="fw-bold text-primary my-3">Find courier delivery within your location</h4>
                         <div class="row my-3">
                            <div class="form-group col">
                                <label for="inputEmail4">LOCATION</label>
                                <input type="text" class="form-control" id="inputEmail4">
                            </div>
                            <div class="form-group col">
                                <label for="inputPassword4">SUB LOCATION</label>
                                <input type="text" class="form-control" id="inputPassword4">
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table my-5">
                            <thead>
                                <tr>
                                <th scope="col">Delivery Name</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Email </th>
                                <th scope="col">Location</th>
                                <th scope="col">Status </th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Lorem </td>
                                    <td>0283747478</td>
                                    <td>otto@mail.com</td>
                                    <td>Lorem</td>
                                    <td class="text-success">Completed</td>
                                    <td><button type="button" class="btn btn-light" data-mdb-ripple-color="dark">View</button></td>
                                </tr>
                                <tr>
                                    <td>Lorem </td>
                                    <td>0283747478</td>
                                    <td>otto@mail.com</td>
                                    <td>Lorem</td>
                                    <td class="text-danger">Failed</td>
                                    <td><button type="button" class="btn btn-light" data-mdb-ripple-color="dark">View</button></td>
                                </tr>
                                <tr>
                                    <td>Lorem </td>
                                    <td>0283747478</td>
                                    <td>otto@mail.com</td>
                                    <td>Lorem</td>
                                    <td class="text-warning">In Route</td>
                                    <td><button type="button" class="btn btn-light" data-mdb-ripple-color="dark">View</button></td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                   </div>
               </div>
           </div>
           <div class="row my-5">
               <div class="col-md-8">
                   <div class="card">
                   <div class="card-body mx-4">
                        <h3 class="text-primary">Please fill in required information</h3>
                        <div class="input-group">
                            <span class="input-group-text border-0" id="basic-addon1">Who is the consultation for</span>
                            <div class="form-check form-check-inline mt-1">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="inlineRadioOptions"
                                    id="inlineRadio1"
                                    value="option1"
                                />
                                <label class="form-check-label" for="inlineRadio1">me</label>
                            </div>

                            <div class="form-check form-check-inline mt-1">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="inlineRadioOptions"
                                    id="inlineRadio2"
                                    value="option2"
                                />
                                <label class="form-check-label" for="inlineRadio2">Focused</label>
                            </div>
                        </div>
                        <div class="justify-content-center mx-5">
                            <form>
                                <div class="form-group row my-3">
                                    <label for="staticEmail" class="col-sm-3 col-form-label">Doctor</label>
                                    <div class="col-sm-9">
                                    <select class="form-control browser-default custom-select" id="exampleFormControlSelect1">
                                        <option>Select a doctor</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group row my-3">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">Date</label>
                                    <div class="col-sm-9">
                                    <input type="date" class="form-control" id="inputPassword" >
                                    </div>
                                </div>
                                <div class="form-group row my-3">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">First Name</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputPassword" placeholder="Lorem">
                                    </div>
                                </div>
                                <div class="form-group row my-3">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">Last Name</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputPassword" placeholder="Sprite">
                                    </div>
                                </div>
                                <div class="form-group row my-3">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">Phone</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputPassword" placeholder="0000-000-000">
                                    </div>
                                </div>
                                <div class="form-group row my-3">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputPassword" placeholder="lorem@mail.com">
                                    </div>
                                </div>
                                <div class="form-group row my-3">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">Purpose of visit/comment</label>
                                    <div class="col-sm-9">
                                    <textarea type="text" class="form-control" id="inputPassword" rows="5"> Lorem ipsum dolor sit amet consectetur adipisicing elit.</textarea>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-primary">CONTINUE</button>
                                </div>
                            </form>
                        </div>
                        
                   </div>
               </div>
               </div>
           </div>
       </div>
    </div>
@endsection


  
