<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Consultancy;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Dashboard()
    {
        $all_user = User::count();
        $all_order = Order::count();
        $all_appoinment = Consultancy::count();
        $this_month_order = Order::whereMonth('created_at',Carbon::now()->month)->count();

    $orders = Order::select(DB::raw("COUNT(*) as count"))
        ->whereYear('created_at',date('Y')) //date('Y') = 2021
        ->groupBy(DB::raw("Month(created_at)")) //Month(created_at)=Month(2017-06-12) = 6
        ->pluck('count');
      
     $months = Order::select(DB::raw("Month(created_at) as month"))
     ->whereYear('created_at',date('Y'))
     ->groupBy(DB::raw("Month(created_at)"))
     ->pluck('month');
    
     $datas = array(0,0,0,0,0,0,0,0,0,0,0,0);
    
    
     foreach($months as $index => $month){
         $datas[$month] = $orders[$index];
        
     }
      

         return view('admin.dashboard',[
             'all_user'=>$all_user,
             'all_order'=>$all_order,
             'all_appoinment'=>$all_appoinment,
             'this_month_order'=>$this_month_order,
             'datas'=>$datas
         ]);
    }






}