@extends('admin.layouts.app')

@section('content')
    <!--Container Main start-->
    <section class="delivary">

        <div class="container">
            <div class="row">
               <div class="col-md-12">
                <div class="card card_custom">
                    <div class="card-body">
                     <div class="container">
                         <div class="row">
                             <div class="col-lg-12 ">
                                <div class="top clearfix">
                                  <div class="col-lg-6">
                                    <h1 class="float-sm-start float-none">Deliveries</h1>
                                  </div>
                                 
                                   
                                   <div class="tools float-sm-end float-none">
                                 
                                    <button id="minimize" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-group-task" aria-expanded="false" aria-controls="collapse-group-task">                 
                                            <i class="fas fa-minus"></i>
                                     
                                    
                                    </button>
                                   <button onclick="loading()"  id="load"> <i class="fas fa-redo-alt"></i>  </button>
                                   
                                    <button onclick="openFullscreen();" id="show"><i class="far fa-expand-arrows"></i></button>
                                   
                                    <button onclick="closeFullscreen();" id="hide"><i class="fas fa-compress-arrows-alt"></i></button>
                                  
                                   </div>
        
                               </div>
                             </div>
                        
                             <div class="collapse show" id="collapse-group-task">
        
                             <div class="col-lg-12">
                                 <p class="para">Find courier devlivary with your location.</p>
                             </div>
        <div class="col-lg-11">
          <div class="row">
            <div class="col-lg-12">
              <div class="row form_custom">
                  <div class="col-sm-6 my-1">
                      <label>LOCATION</label>
                    <input type="text" class="form-control"  aria-label="First name">
                  </div>
                  <div class="col-sm-6 my-1">
                      <label>SUB LOCATION</label>
                    <input type="text" class="form-control"  aria-label="Last name">
                  </div>
                </div>    
           </div>
        
        
        
        
           <div class="col-lg-12">
              <div class="table_content">
                <div class="table-responsive">
                  <table class="table table-borderless table-hover">
                    <thead>
                      <tr>
        
                        <th scope="col">Delivary Name</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Email</th>
                        <th scope="col">Location</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                       <td>Lorem ipsum</td>
                        <td>3563465444</td>
                        <td>lorem@gmail.com</td>
                        <td>Lorem ipsume</td>
                        <td><span class="text-success fw-bold">completed</span></td>
                        <td><a href="#" class="btn btn_custom">view</a></td>
                      </tr>
                      <tr>
                        <td>Lorem ipsum</td>
                         <td>356346544</td>
                         <td>lorem@gmail.com</td>
                         <td>Lorem ipsume</td>
                         <td><span class="text-danger fw-bold">Failed</span></td>
                         <td><a href="#" class="btn btn_custom">view</a></td>
                       </tr>
                       <tr>
                        <td>Lorem ipsum</td>
                         <td>3563465444</td>
                         <td>lorem@gmail.com</td>
                         <td>Lorem ipsume</td>
                         <td><span class="text-warning fw-bold">In Route</span></td>
                         <td><a href="#" class="btn btn_custom">view</a></td>
                       </tr>
                    
                
                    </tbody>
                  </table>
                </div>
               
              </div>
           </div>
        </div>
          </div>
        </div>
        
                    
        
                         </div>
                       
                     </div>
                    </div>
                </div>
               </div>
            </div>
        </div>
        
        </section>
        
    @include('admin.pages.modals.addUser')
@endsection



