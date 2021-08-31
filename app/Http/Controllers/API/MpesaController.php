<?php

namespace App\Http\Controllers\API;

use App\Enums\InboxMessageStatus;
use App\Http\Controllers\Controller;
use App\Mail\NewOrder;
use App\Mail\PaymentSuccessful;
use App\Models\InboxMessage;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MpesaController extends Controller
{
    public function generateAccessToken()
    {
        $url = env('MPESA_ENV') == 0
            ? 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials'
            : 'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
        $curl = curl_init($url);
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_HTTPHEADER => ['Content-Type: application/json; charset=utf8'],
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HEADER => false,
                CURLOPT_USERPWD => env('MPESA_CONSUMER_KEY') . ':' . env('MPESA_CONSUMER_SECRET')
            )
        );
        $response = json_decode(curl_exec($curl));
        curl_close($curl);

        return $response->access_token;
    }
    private function makeHTTP($url, $content)
    {
        $curl = curl_init();
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => $url,
                CURLOPT_HTTPHEADER => array('Content-Type:application/json', 'Authorization:Bearer ' . $this->generateAccessToken()),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => json_encode($content)

            )
        );
        $curl_response = curl_exec($curl);
        curl_close($curl);
        return $curl_response;
    }
    public function b2cRequest(Request $request)
    {
        $body = array(
            "InitiatorName" => env('MPESA_B2C_INITIATOR'),
            "SecurityCredential" => env('MPESA_B2C_PASSWORD'),
            "CommandID" => "SalaryPayment",
            "Amount" => $request->amount,
            "PartyA" => env('MPESA_SHORTCODE'),
            "PartyB" => $request->phone,
            "Remarks" => $request->remarks,
            "QueueTimeOutURL" => env('MPESA_TEST_URL') . '/api/b2ctimeout',
            "ResultURL" => env('MPESA_TEST_URL') . '/api/b2cresult',
            "Occassion" => $request->occassion
        );

        $url = "https://sandbox.safaricom.co.ke/mpesa/b2c/v1/paymentrequest";
        $response = $this->makeHTTP($url, $body);

        return $response;
    }
    /**
     * Register URL
     */
    public function registerURL()
    {
        $body = array(
            'ShortCode' => env('MPESA_SHORTCODE'),
            'ResponseType' => 'Completed',
            'ConfirmationURL' => env('MPESA_TEST_URL') . '/api/confirmation',
            'ValidationURL' => env('MPESA_TEST_URL') . '/api/validation'
        );
        $url = env('MPESA_ENV') == 0
            ? 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl'
            : 'https://api.safaricom.co.ke/mpesa/c2b/v1/registerurl';

        $response = $this->makeHTTP($url, $body);
        return $response;
    }

    public function stkPush(Request $request)
    {
        //echo $amount;
        $user = User::where('id', Auth::id())->first();
        $user_mpesa = "254" . $user->mpesa_no;
        $user_mpesa_no = (int)$user_mpesa;
        $timestamp = date('YmdHis');
        $password = base64_encode(env('MPESA_STK_SHORTCODE') . env('MPESA_PASSKEY') . $timestamp);
        $curl_post_data = array(
            'BusinessShortCode' => env('MPESA_STK_SHORTCODE'),
            'Password' => $password,
            'Timestamp' => $timestamp,
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => $request->amount,
            'PartyA' => env('MPESA_TEST_PHONENUMBER'),
            'PartyB' => env('MPESA_STK_SHORTCODE'),
            'PhoneNumber' => $user_mpesa_no,
            'CallBackURL' => env('MPESA_TEST_URL') . '/api/stkpush',
            'AccountReference' => 'MalighafiStore',
            'TransactionDesc' => 'Goods Payment'
        );
        $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';

        $response = $this->makeHTTP($url, $curl_post_data);
        //return $response;

        $request->validate([
            "description" => ''
        ]);
        $order = new Order;
        $order->user_id = Auth::id();
        $order->description = $request->description;
        $order->save();

        $cart_items = DB::table('carts')->where('user_id', Auth::id())->get();

        foreach ($cart_items as $item) {
            $product = Product::find($item->product_id);
            $order->products()->attach($product->id, ['price' => $product->price, 'quantity' => $item->quantity]);

            InboxMessage::create([
                'title' => "You have a New Order",
                'message' => "You have a new order awaiting to be processed.",
                'user_id' => $product->seller->id,
                'status' => InboxMessageStatus::Unread
            ]);

            Mail::to($product->seller->email)->send(new NewOrder($product->seller, $product));
        }
        DB::table('carts')->where('user_id', Auth::id())->delete();

        Mail::to(Auth::user()->email)->send(new PaymentSuccessful(Auth::user(), $order));


       return redirect()->route('shop')->with('success', 'Payment made successfully!');
    }

    /**
     * Simulate transaction
     */
    public function simulateTransaction(Request $request)
    {
        $response = array(
            'ShortCode' => env('MPESA_SHORTCODE'),
            'Msisdn' => env('MPESA_TEST_PHONENUMBER'),
            'Amount' => $request->amount,
            'BillRefNumber' => $request->account,
            'CommandID' => 'CustomerPayBillOnline'
        );
        $url = env('MPESA_ENV') == 0
            ? 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/simulate'
            : 'https://api.safaricom.co.ke/mpesa/c2b/v1/simulate';

        $response = $this->makeHTTP($url, $response);
        return $response;
    }
}
