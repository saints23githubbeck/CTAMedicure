<?php

namespace App\Http\Controllers\AdminPortal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    //
    public function __invoke(Request $request)
    {
        # code...
        return view('admin_portal.prescription.order_delivery');
    }
}
