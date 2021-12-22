@extends('admin.layouts.app')

@section('content')
    <!--Container Main start-->
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-9">
    <!---whole order start -->
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
            <div class="icon_list">
                <i style="color:#4900b4" class="far fa-check-circle"></i>
            </div>
            </div>
            <div class="col-lg-9">
               <div class="order_content">
                <p>Your prescription order was submitted successfully.</p>
                <p>If you chose the delivery option, your courier will call you to arrange delivery.</p>
              <p>If the pickup option was selected, you may do so at the most convenient time of yoiu choosing. </p>   
            </div>
            </div>
            <div class="container">
            <div class="row d-flex justify-content-center">
             <div class="col-lg-10">
    
    
                <div class="card mb-3 card_custom">
                    <div class="row g-0">
                      <div class="col-sm-6">
                    
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3970.5938364179096!2d-0.08777018528626451!3d5.62681909592096!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfdf8510c90603f9%3A0xc416b17a60a005f8!2sCharles%20Technology%20Africa%20Limited!5e0!3m2!1sen!2sbd!4v1639811956519!5m2!1sen!2sbd" width="100%" height="100%" style="border-top-left-radius: 20px;border-bottom-left-radius: 20px;" allowfullscreen="" loading="lazy"></iframe>
                    
                    
                    </div>
                      <div class="col-sm-6">
                        <div class="card-body">
                          <h5 class="card-title fw-bold">Pharmacy Name & Address</h5>
                          <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nulla ab rerum obcaecati sapiente! Velit aliquid voluptates dolores. Exercitationem, molestiae.</p>
                          <p class="card-text"><span class="number">123 456 789</span></p>
                        </div>
                      </div>
                    </div>
                  </div>
             </div>
                </div>
            </div>
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-9">
                        <h3 style="color:#4900b4">Your order</h3>
    <!--order start-->
        <div class="order_parent">
            
            <div class="single_order">
                <h4>Item Full Name</h4>
                <small>Description or item</small>
            </div>
    
            <div class="single_order">
                <input type="text" placeholder="7 Day supply" class="custom_input">
            </div>
            <div class="single_order">
                <select class="custom_select">
                    <option value="">1</option>
                    <option value="">2</option>
                    <option value="">3</option>
                </select>
            
            </div>
            <div class="single_order">
                <p class="vio">$ 1,500</p>
            </div>
            </div>
                       
            <!---order end-->
    <!--order start-->
    <div class="order_parent">
            
        <div class="single_order">
            <h4>Item Full Name</h4>
            <small>Description or item</small>
        </div>
    
        <div class="single_order">
            <input type="text" placeholder="7 Day supply" class="custom_input">
        </div>
        <div class="single_order">
            <select class="custom_select">
                <option value="">1</option>
                <option value="">2</option>
                <option value="">3</option>
            </select>
        
        </div>
        <div class="single_order">
            <p class="vio">$ 1,100</p>
        </div>
        </div>
                   
        <!---order end-->
        <!--order start-->
        <div class="order_parent">
            
            <div class="single_order">
                <h4>Item Full Name</h4>
                <small>Description or item</small>
            </div>
    
            <div class="single_order">
                <input type="text" placeholder="7 Day supply" class="custom_input">
            </div>
            <div class="single_order">
                <select class="custom_select">
                    <option value="">1</option>
                    <option value="">2</option>
                    <option value="">3</option>
                </select>
            
            </div>
            <div class="single_order">
                <p class="vio">$ 1,400</p>
            </div>
            </div>
                       
            <!---order end-->
      
                    
                    <div class="total clearfix">
                        <span class="float-start">Total</span>
                        <span class="float-end vio">$19,00</span>
                    </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!---whole order end -->
    
            </div>
            </div>
        </div>
    </div>
              

@endsection



