<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{

    public function index()
    {
        $users = User::query();
        if (request('term')) {
            $users->with('role')->where('userName', 'Like', '%' . request('term') . '%');
        }

        $users  = $users->with('role')->orderBy('id', 'DESC')->paginate(10);

        $roles = Role::all();
 echo 'lasjdl';
        die();
        return view('admin.pages.user', compact('users','roles'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $user = User::where('id',auth()->user()->id)->first();
        $image = $request->file('image');

        if ($image) {


            $name = time().$image->getClientOriginalName();
            $img = Image::make($image)->resize(240,320);
            $upload_path = 'user/';
            $image_url = $upload_path.$name;
            $img->save($image_url);
         //   $user->userName = $request->userName;
            $user->email = $request->email;
            $user->contactNumber = $request->contactNumber;
          //  $user->role_id = $request->role_id;
            $user->update();
            $profile  = Profile::where('user_id',$user->id)->first();
            if ($profile->img == 'assets/img/theme/team-4.jpg'){
                $profile->firstName = $request->firstName;
                $profile->img = $image_url;
                $profile->lastName = $request->lastName;
                $profile->update();

            }elseif($profile->img){
                unlink( $profile->img);
                $profile->firstName = $request->firstName;
                $profile->img = $image_url;
                $profile->lastName = $request->lastName;
                $profile->update();

            }else{
                $profile->firstName = $request->firstName;
                $profile->img = $image_url;
                $profile->lastName = $request->lastName;
                $profile->update();

            }



        }else{

          //  $user->userName = $request->userName;
            $user->email = $request->email;
            $user->contactNumber = $request->contactNumber;
           // $user->role_id = $request->role_id;
            $user->update();
            $profile  = Profile::where('user_id',$user->id)->first();
            $profile->firstName = $request->firstName;
            $profile->lastName = $request->lastName;
            $profile->update();

        }

        return back()->with('status','Profile Updated Successfully');
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
