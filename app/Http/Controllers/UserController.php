<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = User::query();
        if (request('term')) {
            $users->with('role')->where('userName', 'Like', '%' . request('term') . '%');
        }

        $users  = $users->with('role')->orderBy('id', 'DESC')->paginate(1);

        return view('admin.pages.user', compact('users'));
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
        //
    }


    public function destroy($id)
    {
        //
    }
}
