<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use Carbon\Carbon;
use App\Models\Mpesa;
use App\Models\MpesaCallback;
use App\Models\MpesaCallbackMetadata;
use App\Models\OnlinePayment;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use DB;
class MpesaController extends Controller
{
	public function newRequest(Request $request){

		$client = new Client(); //GuzzleHttp\Client

		$response1 = $client->request('GET', 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials', [
		    'auth' => [
		        'woK2E0j9fPwFXA507pcL5zlxLyGyApgU', 
		        'AUrUz4Lxd5WqMKC5'
		    ]
		]);

		/*echo $response->getStatusCode(); # 200
		echo $response->getHeaderLine('content-type'); # 'application/json; charset=utf8'*/
		//echo $response->getBody(); # '{"id": 1420053, "name": "guzzle", ...}'
		$token = json_decode($response1->getBody()->getContents());

		//echo $token->access_token;

		$headers = [
		    'Authorization' => 'Bearer ' . $token->access_token,        
		    'Accept'        => 'application/json',
		];

		/*$Shortcode = '174379';
	
		echo Carbon::now()->format('YmdHis');*/
		$response2 = $client->request('POST', 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest', [
	        'headers' => $headers,
	        'json' => 
		        [
		            "BusinessShortCode" => "174379",
		            "Password" => "MTc0Mzc5YmZiMjc5ZjlhYTliZGJjZjE1OGU5N2RkNzFhNDY3Y2QyZTBjODkzMDU5YjEwZjc4ZTZiNzJhZGExZWQyYzkxOTIwMTgwODE0MDg1NjIw",
		            "Timestamp" => "20180814085620",
		            "TransactionType" => "CustomerPayBillOnline",
		            "Amount"	=> $request->input('amount'),
		            "PartyA"	=> $request->input('mpesaPhoneNumber'),
		            "PartyB"	=> "174379",
		            "PhoneNumber" => $request->input('mpesaPhoneNumber'),
		            "CallBackURL" => "http://api.planetarena.co.ke/api/mpesa-callback",
		            "AccountReference" => "ilabAfica HIS",
		            "TransactionDesc"	=> "ilabAfica HIS"
		        ]
		    
	    ]);

	    //echo $response2->getBody()->getContents();

	    $mpesaData = json_decode($response2->getBody()->getContents());

	    $mpesa = new Mpesa;
	    $mpesa->MerchantRequestID = $mpesaData->MerchantRequestID;
	    $mpesa->CheckoutRequestID = $mpesaData->CheckoutRequestID;
	    $mpesa->ResponseCode = $mpesaData->ResponseCode;
	    $mpesa->ResponseDescription = $mpesaData->ResponseDescription;
	    $mpesa->CustomerMessage = $mpesaData->CustomerMessage;
	    $mpesa->field_reservation_id = $request->input('reservationId');

	    try {
	        $mpesa->save();
	    } catch (\Illuminate\Database\QueryException $e) {
	        return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
	    }

		return response()->json($mpesa);
	}


   public function Monthlyrevenue(Request $request)
    {
    $Monthlyrevenue = MpesaCallbackMetadata::select(
            DB::raw('sum(amount) as Total'), 
            DB::raw("DATE_FORMAT(created_at,'%M %Y') as months"),
            DB::raw("DATE_FORMAT(created_at,'%m') as monthKey")
  )->groupBy('months', 'monthKey')->orderBy('months', 'ASC')->get();


     return response()->json($Monthlyrevenue);
    }

     public function Dailyrevenue(Request $request)
    {
    $Dailyrevenue = MpesaCallbackMetadata::select(
        DB::raw('sum(amount) as Total'), 
            DB::raw("DATE_FORMAT(created_at,'%D %M %Y') as months"),
            DB::raw("DATE_FORMAT(created_at,'%m') as monthKey")
  )->groupBy('months', 'monthKey')->orderBy('months', 'ASC')->get();


     return response()->json($Dailyrevenue);
    }
    public function revenue(Request $request)
    {
        
            $revenue = MpesaCallbackMetadata::sum('amount');
      

        return response()->json($revenue);
    }


	public function callback(Request $request){

		$mpesaCallback = new MpesaCallback;
	    $mpesaCallback->MerchantRequestID = $request['Body']['stkCallback']['MerchantRequestID'];
	    $mpesaCallback->CheckoutRequestID = $request['Body']['stkCallback']['CheckoutRequestID'];
	    $mpesaCallback->ResultCode = $request['Body']['stkCallback']['ResultCode'];
	    $mpesaCallback->ResultDesc = $request['Body']['stkCallback']['ResultDesc'];


	    try {
	        $mpesaCallback->save();
	    } catch (\Illuminate\Database\QueryException $e) {
	        return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
	    }

	    $mpesaCallbackMetadata = new MpesaCallbackMetadata;
	    $mpesaCallbackMetadata->MerchantRequestID = $request['Body']['stkCallback']['MerchantRequestID'];
	    $mpesaCallbackMetadata->CheckoutRequestID = $request['Body']['stkCallback']['CheckoutRequestID'];
	    $mpesaCallbackMetadata->Amount = $request['Body']['stkCallback']['CallbackMetadata']['Item'][0]['Value'];
	    $mpesaCallbackMetadata->MpesaReceiptNumber = $request['Body']['stkCallback']['CallbackMetadata']['Item'][1]['Value'];
	    $mpesaCallbackMetadata->TransactionDate = $request['Body']['stkCallback']['CallbackMetadata']['Item'][3]['Value'];
	    $mpesaCallbackMetadata->PhoneNumber = $request['Body']['stkCallback']['CallbackMetadata']['Item'][4]['Value'];


	    try {
	        $mpesaCallbackMetadata->save();
	    } catch (\Illuminate\Database\QueryException $e) {
	        return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
	    }

	}

	public function confirmPayment(Request $request){

		$mpesa = Mpesa::whereField_reservation_id($request->input('reservationId'))->first();
		$mpesaCallbackMetadata = MpesaCallbackMetadata::whereMerchantrequestid($mpesa->MerchantRequestID)->first();

		if(isset($mpesaCallbackMetadata)){
			return response()->json(['status' => 'success', 'message' => $mpesaCallbackMetadata]);
		}else{
			return response()->json(['status' => 'error', 'message' => 'Record not found']);
		}

	}
}