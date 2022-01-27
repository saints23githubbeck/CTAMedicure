<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class RoleController extends Controller
{

 public function show()
 {
     $roles = Role::orderBy('name','asc')->paginate(3);
     return view('admin.pages.role', compact('roles'));
 }
 public function store(RoleRequest $request)
 {

     try {

         $request->validated();

     } catch (ValidationException $e) {
            dd($e->getMessage());
         return redirect()->back()->withErrors($e->errors())->withInput(request()->all())->with('error', $e->getMessage());
     }
//  dd(request()->all());
   Role::firstOrCreate([
       'name' => $request->name,
       'description' => $request->description
   ]);



   return back()->with('status','Role Added Successfully');
 }

    public function update(RoleRequest $request, Role $role)
    {

        try {

            $request->validated();



        } catch (ValidationException $e) {
//            dd($e->getMessage());
            return redirect()->back()->withErrors($e->errors())->withInput(request()->all())->with('error', $e->getMessage());
        }
//  dd(request('description'));
       $role->update([
            'name' => $request->name,
            'description' => $request->description
        ]);


        return back()->with('status','Role Updated  Successfully');
    }

    public function destroy(Role $role){

        $role->delete();

        return back()->with('status','Role Deleted');

    }

    public function search()
    {

        $roles = Role::where('name','like','%'.request()->name.'%')->orderBy('created_at','ASC')->paginate(5);

        return view('admin.pages.role',compact('roles'));
    }
}
