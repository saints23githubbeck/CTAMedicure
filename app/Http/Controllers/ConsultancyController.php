<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Consultancy;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ConsultancyController extends Controller{

    function appointmentPage(){
        $appointments = Consultancy::latest()->paginate(10);
        $doctors = User::where('role_id',2)->get();
        return view('admin.pages.appointment',compact('appointments','doctors'));
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



}

