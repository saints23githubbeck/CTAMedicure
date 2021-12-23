<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;


class PrescriptionController extends Controller
{
    public function index()
    {
       $orders = Order::all();

    return view('admin.pages.prescription',compact('orders'));
    }
    public function insert(Request $request){
//        dd($request->all());
        $image_id = Order::insertGetId([
         
         'quantity'=>$request->quantity,
         'note'=>$request->description,
         'user_id'=>\auth()->id(),
         'delivery_option_id'=>$request->delivery_option_id,
        ]);

        $photo_name = $request->image;
        $extension = $photo_name->getClientOriginalExtension();
        $image_name = $image_id.'.'.$extension;
        
        $target = public_path('uploads/orders/'.$image_name);
        
        Image::make($photo_name)->resize(500, 500)->save($target);
        Order::find($image_id)->update([
        'image'=>$image_name,
        ]);
        return back()->with('add','order added successfully.');
    }

    public function showRequest(){

     $orders = Order::where('status',0)->orderBy('created_at','desc')->get();

        return view('admin.pages.request-list',compact('orders'));
    }
}
