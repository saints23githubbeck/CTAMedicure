<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\ConfirmedOrder;
use App\Models\Order;
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

        $users  = $users->with('role')->orderBy('id', 'DESC')->paginate(3);

        $roles = Role::all();

        return view('admin.pages.user', compact('users','roles'));
    }
    function action(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data = User::where('userName', 'like', '%'.$query.'%')
                    ->orWhere('email', 'like', '%'.$query.'%')
                    ->orWhere('contactNumber', 'like', '%'.$query.'%')
                    ->get();

            }
            else
            {
                $data = User::
                    orderBy('id', 'desc')
                    ->get();
            }
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $row)
                {
                    $output .= '
      <tr>

                                                    <td class="budget">'
                                                        .$row->userName.'
                                                    </td>
                                                    <td >
                                                        <img src="/public/uploads/user/'.$row->profile->img.'" alt="'.$row->name.'" width="50"  class="img-fluid rounded-circle img-thumbnail">
                                                    </td>
                                                    <td>
                                                          <span class="badge badge-dot mr-4">

                                                            <span class="status">'.$row->email.'</span>
                                                          </span>
                                                    </td>
                                                    <td>
                                                        <div class="avatar-group">
                                                            '.$row->contactNumber.'
                                                        </div>
                                                    </td>
                                                    <td>
                      <span class="badge badge-dot mr-4">
                        <span class="status">'.$row->role->name.'</span>
                      </span>
                                                    </td>
                                                    <td>
                                                        <a data-bs-toggle="modal" data-bs-target="#update-Role-'.$row->id.'" class="bg-success btn-sm text-white "  ><i
                                                                    class="fas fa-edit"></i></a>
                                                        <a class="bg-info btn-sm text-white" data-bs-toggle="modal" data-bs-target="#details-Role-'.$row->id.'"><i
                                                                    class="fas fa-eye"></i></a>
                                                        <a class=" bg-danger btn-sm text-white "data-bs-toggle="modal" data-bs-target="#user-delete-'.$row->id.'"><i
                                                                    class="fas fa-trash"> </i></a>
                                                    </td>
                                                </tr>
        ';
                }
            }
            else
            {
                $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
            }
            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
            );

            echo json_encode($data);
        }
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


    public function delivery(ConfirmedOrder $approved)
    {
      $delivery = Role::where('name','delivery')->value('id');


      $userDeliveries = User::where('role_id',$delivery)->get();

//        return $userDeliveries;
      return view('admin.pages.delivery',compact('userDeliveries','approved'));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, User $user)
    {

//  dd(request()->all());
        $user->update([
            'userName'=>$request->userName,
            'email'=>$request->email,
            'contactNumber'=>$request->contactNumber,
            'role_id'=>$request->role_id,
        ]);
//        $user->userName = $request->userName;
//        $user->email = $request->email;
//        $user->contactNumber = $request->contactNumber;
//        $user->role_id = $request->role_id;
//        $user->userName = $request->userName;
//        $user->update();

          $user->address()->updateOrCreate([
            'distance'=>$request->distance ?? 'Null',
            'location'=>$request->location,
            'country'=>$request->country ?? 'Ghana',
        ]);

        return back()->with('status','User Updated Successfully');
    }


    public function destroy($id)
    {
        $user = User::where('id',$id)->first();
        $user->delete();
        return back()->with('status','User Deleted Successfully');
    }
}
