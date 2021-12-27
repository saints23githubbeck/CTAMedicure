@extends('admin.layouts.app')

@section('content')
    <!--Container Main start-->

    <body class="body-all">
      <div class="container">
          <div class="row d-flex justify-content-center">
              <div class="col-lg-9">
                <div class="container pt-4">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div style="" class="form-group">
                                <label for="exampleInputEmail1"><h3 style="font-weight: 700;">Order Id</h3></label>
                                <input style="" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                              </div>
                            <div class="row justify-content-around mt-4">
                                <div  class="col-md-4">
                                    <div style="" class="col-6 col1 col-sm-4 mt-5 bg-light">
                                        <button type="button" class="btn-whitexx">Cancelled</button>
                                        <button type="button" class="btn-dangerxx">Complaints</button>
                                      </div>
                                </div>
                                <div class="col-sm-7">
                                  <div class="conatiner mt-5 bg-white respo">
                                      <h5 style="font-weight: 600;">Complaints</h5>
                                       <div class="col-auto bg-secondary ">
                                       <p style="font-weight: 600;">Complained</p> 
                                          <h6 style="color: white !important;">Scott Demo</h6>
                                           <h5 style="color: white !important;">#7</h5>
                                           <small class="text-white" style="font-size: 8px; font-weight: 600;">No Delivary receive request</small> <br>
                                           <button type="button" class="btn-white" style="font-size: 13px; width: 95px; padding: 3px ; ">Order Details</button>
                                       </div>
                                       <div style="background-color: white !important;" class="col-auto bg-secondary ">
                                        <h6>Scott Demo</h6>
                                           <h5>#7</h5>
                                           <small class="text-white" style="font-size: 8px; font-weight: 600; color: black !important;">No Delivary receive request</small> <br>
                                           <button type="button" class="btn-white" style="font-size: 13px; width: 95px; padding: 3px ;background-color: #566573  !important; color: white !important;">Order Details</button>
                                       </div>
                                  </div>
                                </div>
                              </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <h3 style="font-weight: 700;">Status</h3>
                            <select class="form-control">
                                <option>Cancelled</option>
                                <option>Default select</option>
                                <option>Default select</option>
                                <option>Default select</option>
                                <option>Default select</option>
                              </select>
                              <button style="font-size: 13px;" type="submit" class="btn btn-success mt-3">Search</button>
                              <button style="font-size: 13px;" type="submit" class="btn btn-success mt-3">Reset</button>

                              <div class="row justify-content-center mt-4">
                                  <div class="col-md-6 bg-coco">
                                    <h5 style="color: rgb(66, 66, 66); padding-top: 12px; font-size: 20px;font-weight: 700!important;">Order Details</h5>
                                    <button style="font-size: 15px; width: 145px !important; padding: 5px;" type="button" class="btn-danger">Currier</button><br>
                                    <button style="margin-top: 8px; width: 115px !important; font-size: 15px; padding: 3px;" type="button" class="btn-danger">Transporter</button>
                                    <h6 style="font-weight: 600!important;" class="mt-3">Customer Name <br>
                                    <small style="font-size: 12px; font-weight: 400;" >Scott Demo</small></h6>
                                  
                                    <h6  style="font-weight: 600!important;"  class="mt-3">Curier Name <br>
                                    <small style="font-size: 12px; font-weight: 400;" >Gwen Demo</small></h6>
                                    <h6  style="font-weight: 600!important;"  class="mt-3">Pharmacy<br>
                                    <small style="font-size: 12px; font-weight: 400;" >Alpina Pharmacy</small><br> <br>
                                    <small style="font-size: 12px; font-weight: 600;" >Click To chat</small></h6>
                                    <h6  style="font-weight: 600!important;"  class="mt-3">Address <br>
                                      <small style="font-size: 12px; font-weight: 400;" >1. 71st ratina Lorem ipsum dolor, sit amet concing.</small></h6>
                                      <div class="note">
                                        <h6>Note:</h6>
                                        <p>No Delivary receive request</p>
                                      </div>
                                  </div>


                                  <!-------------Handle Deposit----------------->
                                  <div class="col-md-6 bg-secondary2">
                                    <h4 style="color: rgb(66, 66, 66); padding-top: 12px; font-size: 20px;  font-weight: 700!important;" >Handle Dispute</h4>
                                    <div class="bg-white2 mt-3">
                                          <h6  style="font-weight: 600!important;" >Order Status</h6>
                                          <input type="text" placeholder="Cancelled">
                                          <button class="btn-primary mt-2">Change Status</button>
                                    </div>
                                    <div style="height: 150px !important;" class="bg-white2  mt-2">
                                          <h6  style="font-weight: 600!important;" >Refund</h6>
                                          <input type="text" placeholder="">
                                          <button class="btn-primary mt-2">cancel & Refund</button><br>
                                          <small style="font-size: 10px;">The money added to user wallet</small>
                                    </div>
                                    <div style="height: 140px;" class="bg-white2 mt-1">
                                          <h6  style="font-weight: 600!important;" >Order Edit Note</h6>
                                          <input style="height:60px !important;" type="text" placeholder=""> <br>
                                          <button class="btn-primary mt-2">Update</button>
                                    </div>
                                    <div style="height: 80px;"class="bg-white2 mt-2">
                                          <h6 style="font-weight: 600!important;" >Complaint Status
                                          <br>
                                          <button  style="width: 95px !important;"  style="border-radius: 2px;" class="btn btn-success mt-2">Resolve</button>
                                        </h6>
                                          
                                    </div>
                                  </div>

                              </div>
                        </div>
                    </div>
                </div>
              </div>
          </div>
      </div>
       

    @include('admin.pages.modals.addUser')
@endsection



