<?php

namespace App\Http\Controllers;


use App\Models\Consultancy;
use App\Models\ConsultancyConfirm;
use App\Models\Medication;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Constant_settings;
use Illuminate\Validation\ValidationException;
use Monolog\Handler\CubeHandler;
use App\Models\Day;
use Illuminate\Support\Facades\DB;

class ConsultancyController extends Controller{
    public function gettime(Request $request){
 
 

  $constant_id = Constant_settings::where('user_id',$request->doctor_id)->first()->id;
  $days = Day::where('constant_id',$constant_id)->get(['AvailableDate']);



  $send_html = '<option>--select day--</option>';
foreach($days as $day){
    $send_html .= '<option value="'.$day->AvailableDate.'">'.$day->AvailableDate.'</option>';
}    
echo $send_html;



}

public function getDay(Request $request){

$constant_id = Constant_settings::where('user_id',$request->doctor_id)->first()->id; 
$start_time = Day::where('constant_id',$constant_id)->where('AvailableDate',$request->day_name)->first()->availableTime;
$end_time = Day::where('constant_id',$constant_id)->where('AvailableDate',$request->day_name)->first()->closedTime;
$duration = Day::where('constant_id',$constant_id)->where('AvailableDate',$request->day_name)->first()->duration;



$start_time_break = explode(':',$start_time);
$start_mins = ($start_time_break[0]*60) + $start_time_break[1];
$end_time_break = explode(':',$end_time);
$end_mins = ($end_time_break[0]*60) + $end_time_break[1];


$total_mins = $end_mins - $start_mins;

$doctor_total_consult_will_be = $total_mins / $duration;

$total_appoinment = Consultancy::where('doctor_id',$request->doctor_id)->where('AvailableDate',$request->day_name)->count();




   

//   $previous_patient_need_time = $total_appoinment * $duration;
//   $i_have_to_go = $start_time + $previous_patient_need_time;
//   echo $i_have_to_go;





if($doctor_total_consult_will_be > $total_appoinment){
   //Decimal to time 
$t_h = $your_time / 60;
$t_h_b = explode('.',$t_h);
$h = sprintf('%02d',$t_h_b[0]);
$str = intval(substr($t_h_b[1],0,2));

$m = '.'.sprintf('%02d',$str);
$mins = round($m * 60);
if($mins < 10){
    echo $h.':0'.$mins.':00'; 
  

}else{
    echo $h.':'.$mins.':00';
}



}else{
echo 'Doctor fully booked';
}
//   echo $time;
}


function filter(Request $request){

        $fromdate = $request->from_date;
        $todate = $request->to_date;
        // echo $fromdate;
        // echo '<br>';
        // echo $todate;
        //$data =  DB::select("SELECT * FROM orders WHERE created_at BETWEEN '$fromdate 00:00:00' AND  '$todate 23:59:59'");
        
         // return view('admin.pages.prescription',[
        //     'orders'=>$data
        // ]);
        
            // $data = Order::where('created_at','=',$request->from)->where('created_at','=',$request->to)->get();
            // print_r($data);
        
        //all code start
        $data =  DB::select("SELECT * FROM consultancies WHERE created_at BETWEEN '$fromdate 00:00:00' AND '$todate 23:59:59'");
        
        // $send_html = '';
        
        // foreach($data as $appointment){
      
        //     $send_html .= "
        //  <tr>
        //  <td>$appointment->reason</td>
        //  </tr>
        // ";
        // }
        // echo $send_html;
    $json_data = json_encode($data);
    return $json_data;
   
        }
         
    function appointmentPage(){
        if (auth()->user()->role_id == 1){
            
            $appointments = Consultancy::latest()->paginate(10);
            $doctors = User::where('role_id',2)->get();
        }else{
            $appointments = Consultancy::where('user_id',auth()->user()->id)->latest()->paginate(10);
            $doctors = User::where('role_id',2)->get();
        }

        return view('admin.pages.appointment',compact('appointments','doctors'));
    }

    function appointmentList(){

        if (auth()->user()->role_id == 1){
            $appointments = ConsultancyConfirm::where('status',0)->orderBy('created_at','desc')->paginate(5);
            $completeAppointments = ConsultancyConfirm::where('status',1)->orderBy('created_at','desc')->paginate(5);
        }else{
            $appointments = ConsultancyConfirm::where('user_id',auth()->user()->id)->where('status',0)->orderBy('created_at','desc')->paginate(5);
            $completeAppointments = ConsultancyConfirm::where('status',1)->orderBy('created_at','desc')->paginate(5);
        }
//            dd($appointments);

//        $appointments = ConfirmedOrder::where('user_id',auth()->user()->id)->orderBy('created_at','desc')->paginate(5);
        return view('admin.pages.appointment-list',compact('appointments','completeAppointments'));
    }
    function store(Request $request){



        try {
            $this->validate(request(), [
                'reason'=>'required',
                'availableDate'=>'required',
                'availableTime'=>'required',
                'user_id' => 'required'
            ]);

        } catch (ValidationException $e) {
//
            return redirect()->back()->withErrors($e->errors())->with('error', $e->getMessage());
        }

        if($request->availableTime == 'Doctor fully booked'){
          return back()->with('exists','This Doctor fully booked on given day ! please try other days well wishes for you');
        }else{
            $consultancy = new Consultancy();
            $consultancy->reason = $request->reason;
            $consultancy->availableDate = $request->availableDate;
            $consultancy->availableTime = $request->availableTime;
            $consultancy->user_id = auth()->id();
            $consultancy->doctor_id = $request->user_id;
            $consultancy->save();
    //        dd($consultancy->id);
            $consultancy->consultancyConfirm()->create([
                'user_id' => $request->user_id
            ]);
    
            return back()->with(' Successfully Request');
        }



    }

    function destroy(Consultancy $consultancy){
       $consultancy->delete();
        return back()->with('delete_message','Appoinment Deleted Successfully');
    }


    function update(Request $request, Consultancy $appointment){
        try {
            $this->validate(request(), [
                'reason'=>'required',
                'availableDate'=>'required',
                'availableTime'=>'required',
                'user_id' => 'required'
            ]);

        } catch (ValidationException $e) {
//
            return redirect()->back()->withErrors($e->errors())->with('error', $e->getMessage());
        }

        $appointment->update([
        'reason' => $request->reason,
        'availableDate' => $request->availableDate,
        'availableTime' => $request->availableTime,
        'user_id' => auth()->id()
        ]);


        $appointment->consultancyConfirm()->create([
            'user_id' => $request->user_id
        ]);

        return back()->with(' Successfully Updated');

    }

    function appoinSearch(Request $request){
       $start = $request->start;
       $end = $request->end;
       $appoinmentsSearch = Consultancy::whereBetween('availableDate',[$start,$end])->get();
        $doctors = User::where('role_id',2)->get();
       return view('admin.pages.appointment',compact('appoinmentsSearch','doctors'));
    }

    function markComplete(Consultancy $appointment){
//            dd($appointment);
        $appointment->consultancyConfirm()->update([
            'status' => 1
        ]);

        return view('admin.pages.modals.appointments.medication',compact('appointment'))->with(' Appointment Completed Successfully');
    }


    function medication( Request $request, Consultancy $appointment){
//            dd($appointment->consultancyConfirm->id);
        try {
            $this->validate(request(), [
                'medication'=>'nullable',
                'advice'=>'nullable',
            ]);

        } catch (ValidationException $e) {
//
            return redirect()->back()->withErrors($e->errors())->with('error', $e->getMessage());
        }

        Medication::create([
            'medication' => $request->medication,
            'advice' => $request->medication,
            'consultancy_confirm_id' => $appointment->consultancyConfirm->id
        ]);

        return redirect()->route('appointment.list')->with(' Medications added Successfully');
    }

}



