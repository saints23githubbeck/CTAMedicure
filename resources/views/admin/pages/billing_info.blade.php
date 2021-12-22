@extends('admin.layouts.app')

@section('content')
    <!--Container Main start-->
    <div class="container">
        <h2 class="bill_title">Billing info</h2>
         <div class="row custom_mobile">
             <div class="col-md-5 left_inputs">
     <div class="form-group left">
         <label>Full Name</label>
         <input type="text" placeholder="john Doe" class="custom_input">
     </div>
     <div class="form-group left">
         <label>Address</label>
         <input type="text" placeholder="497 Evergreen Rd." class="custom_input">
     </div>
     <div class="form-group left">
         <label>Full Name</label>
         <input type="text" placeholder="john Doe" class="custom_input">
     </div>
     <div class="form-group left">
         <label>Address</label>
         <input type="text" placeholder="497 Evergreen Rd." class="custom_input">
     </div>
     <div class="form-group left">
         <label>Full Name</label>
         <input type="text" placeholder="john Doe" class="custom_input">
     </div>
     <div class="form-group left">
         <label>Address</label>
         <input type="text" placeholder="497 Evergreen Rd." class="custom_input">
     </div>
     <div class="form-group left">
         <label>expire date</label>
         <input type="date" placeholder="05 \ 21" class="custom_input">
     </div>
     <div class="left_bottom_1">
     
         <div class="row custom_medium">
             <div class="col-xl-4 col-lg-4 col-md-3 col-sm-3 icon icon_text">
                 
                 <small>Every DAY</small><br>
                 <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    
                 
                   
             </div>
             <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 mobile_hide icon_text">
                  <small>EXPIRE DATE</small>
                 <div class="box">
                     <div class="box_left">8:00 AM</div>
                     <div class="box_right"><i class="far fa-clock"></i></div>
                 </div>
           
             </div>
             <div class="col-xl-4 col-lg-5 col-md-4 col-sm-4 icon_text">
                 <small>EXPIRE DATE</small>
                 <div class="box">
                     <div class="box_left">8:00 AM</div>
                     <div class="box_right"><i class="far fa-clock"></i></div>
                 </div>
             </div>
          
        </div>
     </div>
     
     <div class="left_bottom_2">
     <img src="{{ asset('assets/img/theme/bill.jpg') }}">
     </div>
     
             </div>
             <div class="col-md-7">
               <div class="col-md-12">
                 <div class="map">
                 <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14612.917468726213!2d90.40310325!3d23.70350185!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1639837672325!5m2!1sen!2sbd" width="100%" height="100%" style="border:0;border-radius: 15px;" allowfullscreen="" loading="lazy"></iframe>
               </div>
               </div>
              <div class="col-md-12 my-2">
                 <div class="form-group right">
                     <label>Full Name</label>
                     <input type="text" placeholder="john Doe" class="custom_input_right">
                 </div>
                 <div class="form-group right">
                     <label>Address</label>
                     <input type="text" placeholder="497 Evergreen Rd." class="custom_input_right">
                 </div>
              </div>
              <div class="col-md-12 custom_calendar">
                 <div id="my-calendar"></div>
              </div>
              <div class="col-md-12 buttons">
                  <button class="red_button"><i class="far fa-times-circle"></i> cancel</button>
                  <button class="green_button"><i class="fas fa-save"></i> save</button>
              </div>
     
             </div>
         </div>
     </div>
     
@endsection

@section('extra_script')
<script>
    const my_calendar = new TavoCalendar('#my-calendar');
</script>

@endsection

