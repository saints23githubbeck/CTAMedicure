<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConfirmedOrder;
class DeliveryController extends Controller
{
    public function index(){
        $delivary_assign = ConfirmedOrder::where('status',0)->orderBy('created_at','desc')->Paginate(5);
        $delivary_complete = ConfirmedOrder::where('status',1)->orderBy('created_at','desc')->Paginate(5);
        return view('admin.pages.delivery',[
            'delivary_assign'=>$delivary_assign,
            'delivary_complete'=>$delivary_complete,

        ]);
    }
    public function approved(Request $request){
        ConfirmedOrder::find($request->delivary_id)->update([
        'status'=>1
        ]);
        return back()->with('add','Delivary approved');
    }
}
