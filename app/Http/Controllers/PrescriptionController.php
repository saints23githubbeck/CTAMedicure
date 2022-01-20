<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\ConfirmedOrder;
use App\Models\Address;
use App\Models\Admin_address;
use App\Models\admin_location;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Validation\ValidationException;
use Intervention\Image\Facades\Image;
use Laravel\Ui\Presets\React;
use Carbon\Carbon;
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
        if (auth()->user()->role_id == 1){
            $orders = Order::with('confirmedOrder')->orderBy('created_at','desc')->paginate(5);
        }else{
            $orders = Order::with('confirmedOrder')->orderBy('created_at','desc')->where('user_id',auth()->user()->id)->paginate(5);
        }

//       dd($orders);

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

    public function update(Request $request,Order $order){

        try {
            $this->validate(request(), [
                'quantity'=>'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
                'note' => 'nullable'
            ]);
        } catch (ValidationException $e) {
           dd( $e->getMessage());
            return redirect()->back()->withErrors($e->errors())->with('error', $e->getMessage());
        }
//        dd($order->all());


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

            $order->image = $save_name;
        }
        $order->update([
            'quantity' => $request->quantity,
            'note' => $request->note,
            'user_id' => $order->user_id,
            'image' => $save_name,
        ]);

        return back()->with('add','order updated successfully.');

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

    public function checkoutWithLocation(Order $order){



    return view('admin.order.orderLocation',compact('order'));
    }



    public function reject(Order $order){

        $order->confirmedOrder()->delete();

        $order->update([
            'status'=>0,
        ]);

        return back()->with('add','order Rejected successfully.');
    }

    public function destroy(Order $order){

        $order->delete();
        

        return back()->with('add','order deleted successfully.');
    }
    public function change_order_location(Request $request){
   $country = Address::where('user_id',Auth::id())->first()->country;
   $exact_location = $country.','.$request->location;
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

$addressTo   = $exact_location;

// Get distance in km

$distance = getDistance($addressFrom, $addressTo, "M");
Address::where('user_id',Auth::id())->update([
'distance'=>$distance,
'location'=>$exact_location,
'updated_at'=>Carbon::now()
]);
return back();
}
public function admin_location(){
    
    return view('admin.pages.admin_location');
}
public function admin_location_change(Request $request){
Admin_address::find(1)->update([
    'location'=>$request->location,
    'updated_at'=>Carbon::now()
]);
return back();
}
public function admin_location_add(Request $request){
Admin_address::insert([
    'location'=>$request->location,
    'created_at'=>Carbon::now()
]);
return back();
}
}
