<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ConfirmedOrder;

class DeliveryController extends Controller
{
    public function index()
    {
//        if (auth()->user()->role_id = 1){
//            $myIncomingDeliveries = Delivery::where('status', 0)->orderBy('created_at', 'desc')->Paginate(5);
//            $myAccerptDeliveries = Delivery::where('status', 1)->orderBy('created_at', 'desc')->Paginate(5);
//        }else{
            $myIncomingDeliveries = Delivery::where('status', 0)->where('user_id',auth()->id())->orderBy('created_at', 'desc')->Paginate(5);
            $myAccerptDeliveries = Delivery::where('status', 1)->where('user_id',auth()->id())->orderBy('created_at', 'desc')->Paginate(5);
//        }

        return view('admin.pages.delivery', compact('myAccerptDeliveries','myIncomingDeliveries'));
    }

    public function approved(Delivery $coming)
    {
//        dd($coming);

        $coming->update([
            'status' => 1
        ]);
        return back()->with('add', 'Delivary approved');
    }

    public function reject(Delivery $coming)
    {

        $coming->delete();
        return back()->with('status', 'Delivery Rejected ');
    }

    public function show(ConfirmedOrder $approved)
    {
        $delivery = Role::where('id', 3)->pluck('id');

        $userDeliveries = User::where('role_id', $delivery)->get();

        return view('admin.pages.modals.orders.delivery', compact('userDeliveries', 'approved'));
    }

    public function assign(Request $request, $deliver)
    {
//        dd( $request->confirmed_order_id);
        Delivery::updateOrCreate([
            'status' => 0,
            'user_id' => $deliver,
            'confirmed_order_id' => $request->confirmed_order_id
        ]);

        return back()->with('status', 'Order Assigned To Delivery  Successfully');
    }

}

