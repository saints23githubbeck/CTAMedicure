<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;

class AppoinmentController extends Controller{
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


}
