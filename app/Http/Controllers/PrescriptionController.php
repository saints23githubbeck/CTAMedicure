<?php

namespace App\Http\Controllers;

use App\Models\ConfirmedOrder;
use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;



class PrescriptionController extends Controller
{
    public function index()
    {
       $orders = Order::with('user');

    return view('admin.pages.prescription',compact('orders'));
    }
    public function insert(Request $request){

        $request->validate([
        'image'=>'required',
        'quantity'=>'required',
        'delivery_option_id'=>'required',
     
        ]);

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
    function edit($order_id){
        $data = Order::find($order_id);
        return view('admin.pages.modals.orders.order_edit',[
            'data'=>$data
        ]);
    }
    function edit_post(Request $request){
        if($request->image){
            $photo_name = Order::find($request->order_id)->image;
            $path = str_replace('\\','/',public_path()).'/uploads/orders/'.$photo_name;
            unlink($path);
            
            $image_name = $request->image;
            $extension = $image_name->getClientOriginalExtension();
            $order_new_image = $request->order_id.'.'.$extension;
            
            Order::find($request->order_id)->update([
                'image'=> $order_new_image,
                'quantity'=> $request->quantity,
                'note'=> $request->description,
                'delivery_option_id'=>$request->delivery_option_id
                
            ]);

            Image::make($image_name)->resize(500, 400)->save(base_path('public/uploads/orders/'.$order_new_image));
            
            }else{

                Order::find($request->order_id)->update([
                    
                    'quantity'=> $request->quantity,
                    'note'=> $request->description,
                    'delivery_option_id'=>$request->delivery_option_id 
                    
                ]);  



                
            }
            return back()->with('add','prescription updated succesfully.');
    }
    // function filter(Request $request){
    
    // $data = Order::where('created_at','=',$request->from)->where('created_at','=',$request->to)->get();
    // print_r($data);

    // }
 


    public function showRequest(){

     $orders = Order::where('status',0)->orderBy('created_at','desc')->get();

        $confirmOrders = ConfirmedOrder::where('user_id',auth()->user()->id)->orderBy('created_at','desc')->get();

        return view('admin.pages.request-list',compact('orders','confirmOrders'));
    }

    public function acceptOrder(){

        $confirmOrders = ConfirmedOrder::where('user_id',auth()->id)->orderBy('created_at','desc')->get();

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
}
