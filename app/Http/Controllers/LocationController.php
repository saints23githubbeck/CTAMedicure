<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_location;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
// use App\Models\admin_location;
use App\Models\Address;
class LocationController extends Controller
{

        public function add(Request $request , Order $order){
//           dd($request->all());
           auth()->user()->address()->create([
            'distance'=>$request->distance,
            'location'=>$request->location,
            'country'=>$request->country  ?? 'Ghana',
        ]);


              return redirect(route('prescription.checkout.location',$order))->with('add','Your location added successfully.');





}


    public function location(){
        // $locations = admin_location::find(1)->location_name

        return view('admin.pages.location');
    }

         public function update_admin(Request $request){
            Address::find(1)->update([
                'distance'=>$request->distance,
                'location'=>$request->location,
                'country'=>$request->country,
                'user_id'=>Auth::id(),
        ]);
            return back()->with('update','My location changed.');
}


//    function update_admin(Request $request)
//    {
//        admin_location::find(1)->update([
//            'location_name' => $request->location
//        ]);
//        return back()->with('update', 'My location changed.');
//    }


    function index($order_id)
    {

        return view('admin.pages.location', [
            'order_id' => $order_id
        ]);
    }

    function insert(Request $request)
    {
        function getDistance($addressFrom, $addressTo, $unit = '')
        {
            // Google API key
            $apiKey = 'AIzaSyCORKyh23LUQPdrAg7RCtNGhuyIcFRK3zI';

            // Change address format
            $formattedAddrFrom = str_replace(' ', '+', $addressFrom);
            $formattedAddrTo = str_replace(' ', '+', $addressTo);

            // Geocoding API request with start address
            $geocodeFrom = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . $formattedAddrFrom . '&sensor=false&key=' . $apiKey);
            $outputFrom = json_decode($geocodeFrom);
            if (!empty($outputFrom->error_message)) {
                // return $outputFrom->error_message;
                // alert('hello');
            }

            // Geocoding API request with end address
            $geocodeTo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . $formattedAddrTo . '&sensor=false&key=' . $apiKey);
            $outputTo = json_decode($geocodeTo);
            if (!empty($outputTo->error_message)) {
                // return $outputTo->error_message;

            }

            // Get latitude and longitude from the geodata
            $latitudeFrom = $outputFrom->results[0]->geometry->location->lat;
            $longitudeFrom = $outputFrom->results[0]->geometry->location->lng;
            $latitudeTo = $outputTo->results[0]->geometry->location->lat;
            $longitudeTo = $outputTo->results[0]->geometry->location->lng;

            // Calculate distance between latitude and longitude
            $theta = $longitudeFrom - $longitudeTo;
            $dist = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) + cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
            $dist = acos($dist);
            $dist = rad2deg($dist);
            $miles = $dist * 60 * 1.1515;

            // Convert unit and return distance
            $unit = strtoupper($unit);
            if ($unit == "K") {
                return round($miles * 1.609344, 2) . ' km';
            } elseif ($unit == "M") {
                return round($miles, 2) . ' miles';

            } else {
                return round($miles * 1609.344, 2) . ' meters';
            }
        }


        $addressFrom = auth()->user()->address->location;
        $addressTo = $request->location;


        $distance = getDistance($addressFrom, $addressTo, "M");


        Address::insert([
            'distance'=>$distance,
            'location'=>$request->location,
            'country'=>$request->country,
            'user_id'=>Auth::id(),
        ]);
        return redirect('prescription')->with('add', 'location added successfully.');

 }

}
