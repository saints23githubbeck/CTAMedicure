<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Constant_settings;
use App\Models\User;
use App\Models\Role;

class ConstantController extends Controller
{
    public function index()
    {

        $doctors_id = Role::where('name', 'Doctor')->first()->id;

        $doctors = User::where('role_id', $doctors_id)->get();


        $constants = Constant_settings::all();
        return view('admin.pages.constant_settings', [
            'constants' => $constants,
            'doctors' => $doctors
        ]);
    }

    public function add(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required',
            'availableTime' => 'required',
            'speciality' => 'required',
            'price' => 'required',
        ]);
// dd($request->all());
        Constant_settings::insert([
            'user_id' => $request->doctor_id,
            'availableTime' => $request->availableTime,
            'speciality' => $request->speciality,
            'price' => $request->price
        ]);
        return back();

    }

    public function delete(Request $request)
    {
        Constant_settings::find($request->id)->delete();
        return back();
    }

    public function update(Request $request)
    {


        $request->validate([
            'doctor_id' => 'required',
            'availableTime' => 'required',
            'speciality' => 'required',
            'price' => 'required',
        ]);

        Constant_settings::find($request->id)->update([
            'user_id' => $request->doctor_id,
            'availableTime' => $request->availableTime,
            'speciality' => $request->speciality,
            'price' => $request->price,
        ]);
        return back();


    }
}
