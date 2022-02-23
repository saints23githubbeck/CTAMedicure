<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Constant_settings;
use App\Models\User;
use App\Models\Role;
use App\Models\Day;
class ConstantController extends Controller
{

public function index(){
    


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $doctors_id = Role::where('name', 'Doctor')->first()->id;


 $doctors = User::where('role_id',$doctors_id)->get();


    $constants = Constant_settings::all();
    return view('admin.pages.constant_settings',[
        'constants'=>$constants,
        'doctors'=>$doctors
    ]);
}
public function delete_time($id){
    Day::find($id)->delete();
    return back();
}
public function add_time(Request $request){



$request->validate([
    'day'=>'required',
    'duration'=>'required',
    'availableTime'=>'required',
    'closedTime'=>'required',
]);




if(Day::where('constant_id',$request->constant_id)->where('AvailableDate',$request->day)->exists()){

    return back()->with('exists',$request->day.'available time already given');

}else{
    
    $start_time = $request->availableTime;
    $end_time = $request->closedTime;
    $duration = $request->duration;
    
    $start_time_break = explode(':',$start_time);
    $start_mins = ($start_time_break[0]*60) + $start_time_break[1];
    $end_time_break = explode(':',$end_time);
    $end_mins = ($end_time_break[0]*60) + $end_time_break[1];
    
    $total_mins = $end_mins - $start_mins;
    
    $doctor_total_consult_will_be = $total_mins / $duration;
    if($doctor_total_consult_will_be < 1 || is_float($doctor_total_consult_will_be)){
        return back()->with('exists','Your time is invalid duration is not mathched with given time?');
      
    }else{
        Day::insert([
            'constant_id'=>$request->constant_id,
            'duration'=>$request->duration,
            'availableTime'=>$request->availableTime,
            'closedTime'=>$request->closedTime,
            'AvailableDate'=>$request->day,
        ]);
        return back();
    }
    


}

}
public function add(Request $request){
    $request->validate([
   'doctor_id'=>'required',
   'speciality'=>'required',
   'price'=>'required',
    ]);
if(Constant_settings::where('user_id',$request->doctor_id)->exists()){
 return back()->with('exists','This doctor had been already assigned');
}else{
    Constant_settings::insert([
        'user_id'=>$request->doctor_id,
        'speciality'=>$request->speciality,
        'price'=>$request->price
        ]);
}

   
return back();

}
public function delete(Request $request){
    Constant_settings::find($request->id)->delete();
    return back();
}
public function update(Request $request){


    $request->validate([
        'doctor_id'=>'required',
        'speciality'=>'required',
        'price'=>'required',
         ]);

  Constant_settings::find($request->id)->update([
 'user_id'=>$request->doctor_id,
 'speciality'=>$request->speciality,
 'price'=>$request->price,
  ]);
  return back();


}
}
