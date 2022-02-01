<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
class ShowAdminUsersController extends Controller
{ 
    public function doctors(){
      $doctor_id = Role::where('name','Doctor')->first()->id;
    $doctors = User::where('role_id',$doctor_id)->get();

        return view('admin.pages.doctors',[
            'doctors'=>$doctors
        ]);
    }    

    public function deliverys(){
        $delivery_boy_id = Role::where('name','Delivery')->first()->id;
        $deliverys = User::where('role_id',$delivery_boy_id)->get();
        return view('admin.pages.deliverys',[
            'deliverys'=>$deliverys
        ]);
    }    
 
    public function pharmacys(){
        $pharmacy_id = Role::where('name','Pharmacy')->first()->id;
        $pharmacys = User::where('role_id',$pharmacy_id)->get();
        return view('admin.pages.pharmacys',[
            'pharmacys'=>$pharmacys
        ]);
    }    
}
