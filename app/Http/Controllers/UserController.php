<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $users = User::query();
        if (request('term')) {
            $users->with('role')->where('userName', 'Like', '%' . request('term') . '%');
        }

        $users  = $users->with('role')->orderBy('id', 'DESC')->paginate(1);
        $roles = Role::all();
        return view('admin.pages.user', compact('users','roles'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {

        $user = User::where('id',$id)->first();
        $user->userName = $request->userName;
        $user->email = $request->email;
        $user->contactNumber = $request->contactNumber;
        $user->role_id = $request->role_id;
        $user->userName = $request->userName;
        $user->update();
        return back()->with('status','User Updated Successfully');
    }


    public function destroy($id)
    {
        $user = User::where('id',$id)->first();
        $user->delete();
        return back()->with('status','User Deleted Successfully');
    }
}
