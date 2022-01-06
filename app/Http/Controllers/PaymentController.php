<?php

namespace App\Http\Controllers;

use App\Models\CardPayment;
use App\Models\ConfirmedOrder;
use App\Models\Order;
use Illuminate\Http\Request;
use KingFlamez\Rave\Facades\Rave as Flutterwave;
class PaymentController extends Controller
{
    public function index($id){
        $order = Order::where('id',$id)->first();


        return view('admin.order.thanks',compact('order'));
    }
    public function delivery($id){
        $order = Order::where('id',$id)->first();
        return view('admin.order.delivery',compact('order'));
    }
    public function store(Request $request){

        $request = [
            'tx_ref' =>time(),
            'amount' => '100',
            'currency'=>'NGN',
          //  'redirect_url' => route('thankyou'),
            'payments_options'=>'card',
            'customer'=>[
                'email'=> 'mimobaydullah@gmail.com',
                'name'=> 'sujon',
            ],
            ' customizations,'=>[
                'title'=> "Remedy plus",
                'description'=> "Payment for items in cart",
                'logo' => asset('img/logo.png'),
            ],
        ];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/123456/verify",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => json_encode($request),
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "Authorization: Bearer FLWSECK_TEST-1090b4e5393b92f0887e4ff3b7978a94-X"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        echo $response;




    }

    public function initialize($id)
    {
        $order = Order::where('id',$id)->first();
        //This generates a payment reference
        $reference = Flutterwave::generateReference();

        // Enter the details of the payment
        $data = [
            'payment_options' => 'card,banktransfer',
            'amount' => $order->confirmedOrder->amount,
            'email' => auth()->user()->email,
            'order_id' => $id,
            'tx_ref' => $reference,

            'currency' => "usd",
            'redirect_url' => route('callback'),
            'customer' => [
                'email' => auth()->user()->email,
                "phone_number" => auth()->user()->contactNumber,
                "name" => auth()->user()->userName

            ],

            'meta' => [
                'price' => $order->confirmedOrder->amount,
                'order_id' => $id,
                'user_id' => auth()->user()->id
            ],

            "customizations" => [
                "title" => 'Pay For Prescription',
                "description" => "Buying Prescription from MEDICARE"
            ]
        ];

        $payment = Flutterwave::initializePayment($data);

//                    dd($data);
        if ($payment['status'] !== 'success') {
            // notify something went wrong
            return $payment;
        }

        return redirect($payment['data']['link']);

//        $reference = Flutterwave::generateReference();
//
//        $data = [
//            'amount' => 100,
//            'email' => 'wole@email.co',
//            'redirect_url' => route('callback'),
//            'tx_ref' => $reference,
//            'phone_number' => '054709922220',
//            'network' => 'MTN'
//        ];
//
//        $charge = Flutterwave::payments()->momoGH($data);
//
//        if ($charge['status'] === 'success') {
//            // Redirect to the charge url
//            return redirect($charge['data']['redirect']);
//        }

    }
    public function callback()
    {

        $status = request()->status;

        //if payment is successful
        if ($status ==  'successful') {

            $transactionID = Flutterwave::getTransactionIDFromCallback();
            $data = Flutterwave::verifyTransaction($transactionID);
//
            $confirmed_order = ConfirmedOrder::where('user_id',auth()->user()->id)->where('order_id',json_decode($data['data']['meta']['order_id']))->first();
            $confirmed_order->payment = json_decode($data['data']['charged_amount']);
            $confirmed_order->due = json_decode($data['data']['charged_amount'])-$confirmed_order->amount;
            $confirmed_order->pay_by = json_decode($data['data']['payment_type']);
            $confirmed_order->transaction_id = json_decode($data['data']['tx_ref']);
            $confirmed_order->update();

            $card_payment = new CardPayment();
            $card_payment->order_id = json_decode($data['data']['meta']['order_id']);
            $card_payment->first_6digits = json_decode($data['data']['card']['first_6digits']);
            $card_payment->last_4digits = json_decode($data['data']['card']['last_4digits']);
            $card_payment->issuer = json_decode($data['data']['card']['issuer']);
            $card_payment->country = json_decode($data['data']['card']['country']);
            $card_payment->type = json_decode($data['data']['card']['type']);
            $card_payment->expiry = json_decode($data['data']['card']['expiry']);
            $card_payment->save();

            return redirect()->route('payment.details', json_decode($data['data']['meta']['order_id']))->with('add','Transaction has been Successfully');
            //  dd($data);
        }
        elseif ($status ==  'cancelled'){
            //Put desired action/code after transaction has been cancelled here

            return redirect()->route('pres')->with('add','transaction has been cancelled');
        }
        else{
            return redirect()->route('pres')->with('add','Payment Failed');
        }
        // Get the transaction from your DB using the transaction reference (txref)
        // Check if you have previously given value for the transaction. If you have, redirect to your successpage else, continue
        // Confirm that the currency on your db transaction is equal to the returned currency
        // Confirm that the db transaction amount is equal to the returned amount
        // Update the db transaction record (including parameters that didn't exist before the transaction is completed. for audit purpose)
        // Give value for the transaction
        // Update the transaction to note that you have given value for the transaction
        // You can also redirect to your success page from here

    }
    public function mobile($id)
    {

//        return redirect($payment['data']['link']);
        $order = Order::where('id',$id)->first();
        $reference = Flutterwave::generateReference();

        $data = [
            'amount' => $order->confirmedOrder->amount,
            'email' => auth()->user()->email,
            'redirect_url' => route('callback.mobile'),
            'tx_ref' => $reference,
            "currency" => "GHS",
            'phone_number' => auth()->user()->contactNumber,
            'network' => 'MTN',
            'meta' => [
                'price' => $order->confirmedOrder->amount,
                'order_id' => $id,
                'user_id' => auth()->user()->id
            ],
        ];

        $charge = Flutterwave::payments()->momoGH($data);

        if ($charge['status'] === 'success') {
            // Redirect to the charge url
            return redirect($charge['data']['redirect']);
        }

    }
    public function callbackm()
    {

        $status = request()->status;

        //if payment is successful
        if ($status ==  'successful') {

            $transactionID = Flutterwave::getTransactionIDFromCallback();
            $data = Flutterwave::verifyTransaction($transactionID);

            $confirmed_order = ConfirmedOrder::where('user_id',auth()->user()->id)->where('order_id',json_decode($data['data']['meta']['order_id']))->first();
            $confirmed_order->payment = json_decode($data['data']['charged_amount']);
            $confirmed_order->due = json_decode($data['data']['charged_amount'])-$confirmed_order->amount;
            $confirmed_order->pay_by = json_decode($data['data']['payment_type']);
            $confirmed_order->transaction_id = json_decode($data['data']['tx_ref']);
            $confirmed_order->update();

            $card_payment = new CardPayment();
            $card_payment->order_id = json_decode($data['data']['meta']['order_id']);
            $card_payment->first_6digits = json_decode($data['data']['card']['first_6digits']);
            $card_payment->last_4digits = json_decode($data['data']['card']['last_4digits']);
            $card_payment->issuer = json_decode($data['data']['card']['issuer']);
            $card_payment->country = json_decode($data['data']['card']['country']);
            $card_payment->type = json_decode($data['data']['card']['type']);
            $card_payment->expiry = json_decode($data['data']['card']['expiry']);
            $card_payment->save();

           return redirect()->route('payment.details', json_decode($data['data']['meta']['order_id']))->with('add','Transaction has been Successfully');
         //     dd($data);
        }
        elseif ($status ==  'cancelled'){
            //Put desired action/code after transaction has been cancelled here

            return redirect()->route('pres')->with('add','transaction has been cancelled');
        }
        else{
            return redirect()->route('pres')->with('add','Payment Failed');
        }
        // Get the transaction from your DB using the transaction reference (txref)
        // Check if you have previously given value for the transaction. If you have, redirect to your successpage else, continue
        // Confirm that the currency on your db transaction is equal to the returned currency
        // Confirm that the db transaction amount is equal to the returned amount
        // Update the db transaction record (including parameters that didn't exist before the transaction is completed. for audit purpose)
        // Give value for the transaction
        // Update the transaction to note that you have given value for the transaction
        // You can also redirect to your success page from here

    }

    public function cashondelivery($id){
        $order = Order::where('id',$id)->first();
        $confirmed_order = ConfirmedOrder::where('user_id',auth()->user()->id)->where('order_id',$order->id)->first();
        $confirmed_order->payment = '0';
        $confirmed_order->due = $confirmed_order->amount;
        $confirmed_order->pay_by = 'Cash On Delivery';
        $confirmed_order->update();


        return redirect()->route('payment.details', $order->id)->with('add','Your Order has been Successfully');

    }


}
