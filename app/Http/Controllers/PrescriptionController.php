<?php

namespace App\Http\Controllers;

use App\Models\ConfirmedOrder;
use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\DeliveryOption;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Laravel\Ui\Presets\React;

class PrescriptionController extends Controller
{
    public function index()
    {
       $orders = Order::orderBy('created_at','desc')->where('user_id',auth()->user()->id)->paginate(5);

    return view('admin.pages.prescription',compact('orders'));
    }
    public function insert(Request $request){

        $request->validate([
        'image'=>'required',
        'quantity'=>'required',
        'delivery_option_id'=>'nullable'
        ]);

//        dd($request->all());

        $image_id = Order::create([
         'quantity'=>$request->quantity,
         'note'=>$request->description,
         'user_id'=>auth()->id(),
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

     $orders = Order::where('status',0)->orderBy('created_at','desc')->paginate(5);

        $confirmOrders = ConfirmedOrder::where('user_id',auth()->user()->id)->orderBy('created_at','desc')->paginate(5);

        return view('admin.pages.request-list',compact('orders','confirmOrders'));
    }

    public function acceptOrder(){

        $confirmOrders = ConfirmedOrder::where('user_id',auth()->user()->id)->orderBy('created_at','desc')->paginate(5);

        return view('admin.pages.request-list',compact('confirmOrders'));
    }


    public function approve( Request $request, Order $order){

        $order->confirmedOrder()->create([
            'amount'=>$request->amount,
            'note'=>$request->description,
            'status'=>0,
            'user_id'=>auth()->id(),
        ]);
        $order->update([
            'status'=>1,
        ]);

        return back()->with('add','order Approved successfully.');
    }


    public function accerpt(Order $order){

        $order->confirmedOrder()->update([
            'status'=>1,
        ]);

        return back()->with('add','order Accerpted successfully.');
    }

    public function reject(Order $order){

        $order->confirmedOrder()->delete();

        $order->update([
            'status'=>0,
        ]);

        return back()->with('add','order Rejected successfully.');
    }
}
