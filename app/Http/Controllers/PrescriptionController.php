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

 
       $orders = Order::Paginate(5);


    return view('admin.pages.prescription',compact('orders'));
    }
    public function insert(Request $request){

        $request->validate([
        'image'=>'required',
        'quantity'=>'required',
        'delivery_option_id'=>'required',
     
        ]);

if(Auth::id()){
    $image_id = Order::insertGetId([
         
        'quantity'=>$request->quantity,
        'note'=>$request->description,
        'user_id'=>auth()->id(),
        'delivery_option_id'=>$request->delivery_option_id,
       ]);
}else{
    $image_id = Order::insertGetId([
         
        'quantity'=>$request->quantity,
        'note'=>$request->description,
        'delivery_option_id'=>$request->delivery_option_id,
       ]);
}

    

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
    function filter(Request $request){
        if($request->ajax()){
 if($request->from_date != '' && $request->to_date != ''){
  $data = DB::table('orders')->whereBetween('created_at',array($request->from_date,$request->to_date))->get();

 }
//  else{
//  $data = DB::table('orders')->orderBy('created_at','desc')->get();

//  }
 echo json_encode($data);

        }
    }
function status($order_id){
    $status =  Order::find($order_id)->status;
    if($status == 0){

 Order::find($order_id)->update([
 'status'=>1
 ]);
    }else{
     Order::find($order_id)->update([
         'status'=>0
         ]);
    }
    return back();
 
}




    // function filter(Request $request){
    //     $fromdate = $request->from;
    //     $todate = $request->to;
        // echo $fromdate;
        // echo '<br>';
        // echo $todate;
        //$data =  DB::select("SELECT * FROM orders WHERE created_at BETWEEN '$fromdate 00:00:00' AND  '$todate 23:59:59'");
        
         // return view('admin.pages.prescription',[
        //     'orders'=>$data
        // ]);
        
            // $data = Order::where('created_at','=',$request->from)->where('created_at','=',$request->to)->get();
        //     // print_r($data);
        
        // //all code start
        // $data =  DB::select("SELECT * FROM orders WHERE created_at BETWEEN '$fromdate 00:00:00' AND '$todate 23:59:59'");
        
        // $send_html = '';
        
        // foreach($data as $order){
        //     $delivery = DeliveryOption::find($order->delivery_option_id)->option;
        //     $image_location = 'uploads/orders/'.$order->image;
        //     $send_html .= "
        //  <tr>
        
        //                                                     <td class='budget'> ";
        
        
        // $send_html .= '         
        //  <img style="width:100px;height:100px" src="{{asset('.$image_location.')}}">';
        
        
        //                                           $send_html .= "</td>
        //                                                     <td>
        //                                               $order->quantity 
        //                                                     </td>
        //                                                     <td>
        //                                                     $order->note 
        //                                                     </td>
        //                                                     <td>$delivery</td>";
        
        //                                                  if($order->status === 0){
        // $send_html .=  "
        // <td>
        // <span class='badge badge-dot mr-4'>
        // <i class='bg-secondary'></i>
        // <span class='status text-dark'>In complete</span>
        // </span>
        // </td>
        // ";
        // }else{
        // $send_html = "
        // <td>
        // <span class='badge badge-dot mr-4'>
        // <i class='bg-success'></i>
        // <span class='status text-dark'>completed</span>
        // </span>
        // </td>
        // ";                                        
        
        //  }
                                     
        
        
        
        //                                                  $send_html .= "   <td class='text-right'>
        //                                                         <div class='dropdown'>
        //                                                             <a class='btn btn-lg medibg shadow btn-icon-only text-dark'
        //                                                                href='#'
        //                                                                role='button' data-toggle='dropdown' aria-haspopup='true'
        //                                                                aria-expanded='false'>
        //                                                                 <i class='fas fa-ellipsis-v'></i>
        //                                                             </a>
        //                                                             <div class='dropdown-menu dropdown-menu-right dropdown-menu-arrow'>
        //                                                                 <a class='dropdown-item' href='{{ route('edit.prescription',$order->id) }}'>Update</a>
        //                                                                 <a class='dropdown-item' href='{{ route('delete.prescription',$order->id) }}'>Delete</a>
        //                                                                 <a class='dropdown-item' href='{{ route('view.prescription',$order->id) }}'> view </a>
           
        
            
            
        
        //                                                             </div>
        //                                                         </div>
        //                                                     </td>
        //                                                 </tr>
        // ";
        // }
        // return $send_html;
        
        // }
 


 



}
