<?php

namespace App\Http\Controllers;

use App\Models\ConfirmedOrder;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Validation\ValidationException;
use Intervention\Image\Facades\Image;


class PrescriptionController extends Controller
{

    private $photos_path;
    public function __construct()
    {
//        $this->middleware('auth:admin');
        $this->photos_path = public_path('uploads/orders');
    }

    public function index()
    {
       $orders = Order::orderBy('created_at','desc')->where('user_id',auth()->user()->id)->paginate(5);

    return view('admin.pages.prescription',compact('orders'));
    }

    public function insert(){

        try {
            $this->validate(request(), [
                'quantity'=>'required',
                'delivery_option_id'=>'nullable',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
                'note' => 'nullable'
            ]);

        } catch (ValidationException $e) {
//            dd(\request()->all());
            return redirect()->back()->withErrors($e->errors())->with('error', $e->getMessage());
        }


            $template = new Order();
            $template->quantity = request()->quantity;
            $template->delivery_option_id = request()->delivery_option_id;
            $template->note = request()->note;
            $template->user_id = auth()->id();


            $photo = request()->file('image');

//            dd($photo);
            if(request()->file('image')){
//                dd('has file');
                if (!is_dir($this->photos_path)) {
//                    mkdir($this->photos_path, 0777);
                }
                $name = sha1(date('YmdHis'));
                $save_name = $name . '.' . $photo->getClientOriginalExtension();

                //      this creates and saves the thumbnail image
                Image::make($photo)
                    ->resize(250, null, function ($constraints) {
                        $constraints->aspectRatio();
                    });

                // this saves the actual image
                $photo->move($this->photos_path, $save_name);

                $template->image = $save_name;
            }

            $template->save();
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

        return redirect(route('prescription.checkout',$order))->with('add','order Accerpted successfully.');
    }

    public function checkout(Order $order){



    return view('admin.order.order',compact('order'));
    }

    public function reject(Order $order){

        $order->confirmedOrder()->delete();

        $order->update([
            'status'=>0,
        ]);

        return back()->with('add','order Rejected successfully.');
    }
}
