@extends('admin.layouts.app')

@section('content')
    <!--Container Main start-->
  
    <div class="conatiner">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-10">
                <div class="container">
                    <div class="row pt-5 justify-content-center">
                      <div class="card">
                          <div class="card-header">
                            <i class="fas fa-long-arrow-alt-left fa-2x"></i>
                          </div>
                          <div class="card-body">
                            <div class="row no-gutters">
                                <div class="col-12 col-sm-6 col-md-8 order-lg-1 order-sm-2">
                                    <table class="table table-responsive">
                                        <thead>
                                            <tr class="tree">
                                                <th class="product-thumbnail" scope="col"><img src="https://cdn.pixabay.com/photo/2016/07/24/21/01/thermometer-1539191__480.jpg" class="rounded float-left" alt=""></th>
                                                <th scope="col"><h4>Lorem</h4>
                                                <div style="width: 30px;" class="col-2">
                                                <p>Lorem, ipsum dolor.</p>
                                                </div></th>
                                                <th scope="col"><h4 style="margin-left:150px " >$10.2</h4></th>
                                                <th scope="col">
                                                    <div style="height: 70px; padding: 17px; border-radius: 10px;" class="bg-in">
                                                        01
                                                    </div>
                                                </th>
                                                <th scope="col"><div style="height: 70px; padding: 17px; border-radius: 10px;" class="bg-in">
                                                    <i class="fal fa-times fa-2x"></i>
                                                </div></th>
                                            </tr>
                                            <tr class="tree">
                                                <th class="product-thumbnail" scope="col"><img src="https://cdn.pixabay.com/photo/2016/07/24/21/01/thermometer-1539191__480.jpg" class="rounded float-left" alt=""></th>
                                                <th scope="col"><h4>Lorem</h4>
                                                <div style="width: 30px;" class="col-2">
                                                <p>Lorem, ipsum dolor.</p>
                                                </div></th>
                                                <th scope="col"><h4 style="margin-left:150px ">$10.2</h4></th>
                                                <th scope="col">
                                                    <div style="height: 70px; padding: 17px; border-radius: 10px;" class="bg-in">
                                                        01
                                                    </div>
                                                </th>
                                                <th scope="col"><div style="height: 70px; padding: 17px; border-radius: 10px;" class="bg-in">
                                                    <i class="fal fa-times fa-2x"></i>
                                                </div></th>
                                            </tr>
                                            <tr class="tree">
                                                <th class="product-thumbnail" scope="col"><img src="https://cdn.pixabay.com/photo/2016/07/24/21/01/thermometer-1539191__480.jpg" class="rounded float-left" alt=""></th>
                                                <th scope="col"><h4>Lorem</h4>
                                                <div style="width: 30px;" class="col-2">
                                                <p>Lorem, ipsum dolor.</p>
                                                </div></th>
                                                <th scope="col"><h4 style="margin-left:150px ">$10.2</h4></th>
                                                <th scope="col">
                                                    <div style="height: 70px; padding: 17px; border-radius: 10px;" class="bg-in">
                                                        01
                                                    </div>
                                                </th>
                                                <th scope="col"><div style="height: 70px; padding: 17px; border-radius: 10px;" class="bg-in">
                                                    <i class="fal fa-times fa-2x"></i>
                                                </div></th>
                                            </tr>
                                            
                                        </thead>

                                    </table>
                                    <h3>Subtotal <h2 style="margin-left: 80%; margin-top: -2%;">$110.1</h2></h3>
                                    
                                </div>


                                <!------------------------------->
                                <div style="background-color: #4400AD;" class="col-6 col-md-4 order-lg-2 order-sm-1">
                                    <div style="background: #4400AD;
                                          padding: 48px 24px;
                                          "class="order-main">
                                        <div class="order-title">
                                          <p style="	font-size: 33px;
                                            text-align: center;
                                            color: #fff;
                                            text-transform: uppercase;
                                            font-weight: 700;
                                            font-family: 'Rubik', sans-serif;"
                                        >order details</p>
                                        </div>
                                        <div class="coupon">
                                          <i class="fas fa-gift"></i>
                                          <p>apply coupon</p>
                                          <i class="fas fa-chevron-circle-right"></i>
                                        </div>
                                        <div class="amount">
                                          <div class="value">
                                            <p>cart value</p>
                                            <span>110.1</span>
                                          </div>
                                          <div class="value">
                                            <p>delivery charges</p>
                                            <span>20.0</span>
                                          </div>
                                          <div class="value">
                                            <p>discount</p>
                                            <span>0</span>
                                          </div>
                                        <div class="line"></div>
                                          <div class="value">
                                            <p>amount to be paid</p>
                                            <span>$ 130.1</span>
                                          </div>
                                        </div>
                                        <div class="address">
                                          <div class="address-icon">
                                            <i class="fas fa-map-marker-alt"></i>
                                          </div>
                                          <div class="address-text">
                                            <p>Lorem ipsum dolor sit amet.</p>
                                            <p>Lorem ipsum dolor sit amet.</p>
                                            <p>Lorem ipsum dolor sit amet.</p>
                                          </div>
                                        </div>
                            

                                          <button style="	text-transform: uppercase;

	color: #fff;
  width: 120px !important;
  height: 50px;
	background: red;
	font-weight: 600;
	border: 2px solid transparent;
	transition: 0.5s;
    border-radius: 10px !important;" class="btn btn-danger">deceline</button>
                                          <button 
                                          style="	text-transform: uppercase;

	color: black;
  background-color:white !important;
  width: 120px !important;
  height: 50px;
	background: red;
	font-weight: 600;
	border: 2px solid transparent;
	transition: 0.5s;
    border-radius: 10px !important;"
                                          class="btn ">confirm</button>
                                        
                            
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

    @include('admin.pages.modals.addUser')
@endsection



