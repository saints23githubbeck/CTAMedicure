<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;

class AppoinmentController extends Controller{

    function appointmentPage(){
        return view('admin.pages.appointment',[
            'apoinements'=>Appointment::latest()->get(),
        ]);
    }
    function appoinmentPost(Request $request){
        $request->validate([
            'date'=>['required'],
            'comment'=>['required'],
        ],[
            'date.required'=>'Please Enter Your Consulate Date',
            'comment.required'=>'Enter Purpose Of Visit',
        ]);
        $appoinments = new Appointment;
        $appoinments->consulation=$request->consulation;
        $appoinments->doctor_name=$request->doctor_name;
        $appoinments->date=$request->date;
        $appoinments->comment=$request->comment;
        $appoinments->save();
        return back();
    }

    function apoinmentDelete($id){
        Appointment::where('id',$id)->delete();
        return back()->with('delete_message','Appoinment Deleted Successfully');
    }

    function apoinmentEdit($id){
        return view('admin.pages.appoinment-edit',[
            'apoinmentEdit'=>Appointment::findOrFail($id),
        ]);

    }

    function apoinmentUpdate(Request $request){
        $appoinmentUpdate = Appointment::findOrFail($request->appoinment_id);
        $appoinmentUpdate->consulation=$request->consulation;
        $appoinmentUpdate->doctor_name=$request->doctor_name;
        $appoinmentUpdate->date=$request->date;
        $appoinmentUpdate->comment=$request->comment;
        $appoinmentUpdate->save();
        return back()->with('update_message','Appoinment Updated Successfully');
    }

    function appoinSearch(Request $request){
       $start = $request->start;
       $end = $request->end;
       $appoinmentsSearch=Appointment::whereBetween('date',[$start,$end])->get();
       return view('admin.pages.appointment',[
         'appoinmentsSearch'=>$appoinmentsSearch,
       ]);
    }




}
