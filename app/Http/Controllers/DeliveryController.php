<?php

namespace App\Http\Controllers;

use App\Models\ConfirmedOrder;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{

    public function assign(Request $request, ConfirmedOrder $delivery)
    {

//  dd($delivery->delivery());
        $delivery->delivery()->create([
            'status'=>0,
            'user_id'=>auth()->id(),
        ]);

        return back()->with('status','Order Assigned To Delivery  Successfully');
    }
}
