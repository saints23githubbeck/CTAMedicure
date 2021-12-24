<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;

class PrescriptionController extends Controller
{
    public function index()
    {
       $orders = Order::all();

    return view('admin.pages.prescription',compact('orders'));
    }
    public function insert(Request $request){
        $request->validate([
        'image'=>'required',
        'quantity'=>'required',
        'delivery_option_id'=>'required',
     
        ]);
        $image_id = Order::insertGetId([
         
         'quantity'=>$request->quantity,
         'note'=>$request->description,
         'user_id'=>1,
         'delivery_option_id'=>$request->delivery_option_id,
         'created_at'=>Carbon::now()
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
    function delete($order_id){
    
     $image_name =   Order::find($order_id)->image;
     $path = public_path('uploads/orders/'.$image_name);
     unlink($path);
     Order::find($order_id)->delete();
     return back()->with('add','order deleted successfully.');
    }
    function view($order_id){ 
        // $data = $order_id;
$data = Order::find($order_id);
        return view('admin.pages.modals.orders.order_single',[
            'data'=>$data
        ]);
    }
    // function filter(Request $request){
    
    // $data = Order::where('created_at','=',$request->from)->where('created_at','=',$request->to)->get();
    // print_r($data);

    // }
 
}
