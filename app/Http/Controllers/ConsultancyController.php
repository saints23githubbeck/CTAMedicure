<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Consultancy;
use App\Models\ConsultancyConfirm;
use App\Models\Medication;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Monolog\Handler\CubeHandler;
use Illuminate\Support\Facades\DB;

class ConsultancyController extends Controller{
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

        $consultancy = new Consultancy();
        $consultancy->reason = $request->reason;
        $consultancy->availableDate = $request->availableDate;
        $consultancy->availableTime = $request->availableTime;
        $consultancy->user_id = auth()->id();
        $consultancy->save();
//        dd($consultancy->id);
        $consultancy->consultancyConfirm()->create([
            'user_id' => $request->user_id
        ]);

        return back()->with(' Successfully Request');
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



