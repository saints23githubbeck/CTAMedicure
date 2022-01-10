<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use App\Models\Address;
use App\Models\Distance;
class LocationController extends Controller
{

function add(Request $request){
    Address::insert([
    'contact'=>$request->contact,
    'location'=>$request->location,
    'country'=>$request->country,
    'user_id'=>Auth::id(),
    'created_at'=>Carbon::now()
]);
return back();

}
    //admin location page
    function admin_location(){
        // $locations = admin_location::find(1)->location_name
     
        return view('admin.pages.admin_location');
    }
function update_admin(Request $request){
    Address::find(1)->update([
        'contact'=>$request->contact,
        'location'=>$request->location,
        'country'=>$request->country,
        'user_id'=>Auth::id(),
        'updated_at'=>Carbon::now()
]);  
return back()->with('update','My location changed.');
}

   
    

function index($order_id){

     return view('admin.pages.location',[
         'order_id'=>$order_id
     ]);
 }
 function insert(Request $request){
     
    function getDistance($addressFrom, $addressTo, $unit = ''){
        // Google API key
        $apiKey = 'AIzaSyCORKyh23LUQPdrAg7RCtNGhuyIcFRK3zI';
        
        // Change address format
        $formattedAddrFrom    = str_replace(' ', '+', $addressFrom);
        $formattedAddrTo     = str_replace(' ', '+', $addressTo);
        
        // Geocoding API request with start address
        $geocodeFrom = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrFrom.'&sensor=false&key='.$apiKey);
        $outputFrom = json_decode($geocodeFrom);
        if(!empty($outputFrom->error_message)){
            // return $outputFrom->error_message;  
        // alert('hello');
        }
        
        // Geocoding API request with end address
        $geocodeTo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrTo.'&sensor=false&key='.$apiKey);
        $outputTo = json_decode($geocodeTo);
        if(!empty($outputTo->error_message)){
            // return $outputTo->error_message;
           
        }
        
        // Get latitude and longitude from the geodata
        $latitudeFrom    = $outputFrom->results[0]->geometry->location->lat;
        $longitudeFrom    = $outputFrom->results[0]->geometry->location->lng;
        $latitudeTo        = $outputTo->results[0]->geometry->location->lat;
        $longitudeTo    = $outputTo->results[0]->geometry->location->lng;
        
        // Calculate distance between latitude and longitude
        $theta    = $longitudeFrom - $longitudeTo;
        $dist    = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
        $dist    = acos($dist);
        $dist    = rad2deg($dist);
        $miles    = $dist * 60 * 1.1515;
        
        // Convert unit and return distance
        $unit = strtoupper($unit);
        if($unit == "K"){
            return round($miles * 1.609344, 2).' km';
        }elseif($unit == "M"){
            return round($miles, 2).' miles'; 
           
        }else{
            return round($miles * 1609.344, 2).' meters'; 
        }
    }  
    
    $addressFrom = Address::find(1)->location_name;
    $addressTo   = $request->location;
    
    
    $distance = getDistance($addressFrom, $addressTo, "M");

    
    
    
Distance::insert([
    'order_id'=>$request->order_id,
    'user_id'=>Auth::id(),
    'distance_miles'=>$distance,
    'location'=>$request->location,
    'created_at'=>Carbon::now(),

 ]);
 return redirect('prescription')->with('add','location added successfully.');
 }
}
