<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Address;
use App\Models\Admin_address;
use App\Traits\ProfileTriat;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'userName' => ['required', 'string', 'max:20','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role_id' => ['required', 'string'],
            'contactNumber' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

      $user = User::create([
            'userName' => $data['userName'],
            'email' => $data['email'],
            'contactNumber' => $data['contactNumber'],
            'role_id' => $data['role_id'],
            'password' => Hash::make($data['password']),
        ]);
        $profile = new Profile();
        $profile->user_id = $user->id;
        $profile->save();

        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,"http://ip-api.com/json");
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);//remove 1
        $result = curl_exec($ch);
        $result = json_decode($result);
        if($result->regionName != ''){
            $location = $result->regionName.','.$result->city;
            $user_exact_location = $result->country.','.$result->regionName.','.$result->city;
        }else{
            $location = $result->city;
            $user_exact_location = $result->country.','.$result->city;

        }
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
                return round($miles, 2); 
               
            }else{
                return round($miles * 1609.344, 2).' meters'; 
            }
        }  
        
        
        if(Admin_address::find(1)->location){
            $addressFrom = Admin_address::find(1)->location;
        }else{
            $addressFrom = 'ghana';
        }
        $addressTo   = $user_exact_location;
        
        // Get distance in km
        
        $distance = getDistance($addressFrom, $addressTo, "M");
        $address = new Address();
        $address->distance = $distance;
        $address->location = $location;
        $address->country = $result->country;
        $address->user_id = $user->id;
        $address->created_at = Carbon::now();
        $address->save();





//        $profile = new Profile();
//        $profile->image = 'default.png';
//        $profile->user_id = $data->id;
//        $profile->save();
 return $user;
    }


}
