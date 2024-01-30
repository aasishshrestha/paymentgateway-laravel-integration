<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{

    public function khaltiPayment(Request $request)
    {

    //     $curl = curl_init();
    //     curl_setopt_array($curl, array(
    //         CURLOPT_URL => 'https://a.khalti.com/api/v2/epayment/initiate/',
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_ENCODING => '',
    //         CURLOPT_MAXREDIRS => 10,
    //         CURLOPT_TIMEOUT => 0,
    //         CURLOPT_FOLLOWLOCATION => true,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => 'POST',
    //         CURLOPT_POSTFIELDS => '{
    // "return_url": "http://example.com/",
    // "website_url": "https://example.com/",
    // "amount": "1000",
    // "purchase_order_id": "Order01",
    //     "purchase_order_name": "test",

    // "customer_info": {
    //     "name": "Test Bahadur",
    //     "email": "test@khalti.com",
    //     "phone": "9800000001"
    // }
    // }

    // ',
    //         CURLOPT_HTTPHEADER => array(
    //             'Authorization: key bba77349f1814301a97167471b241aea',
    //             'Content-Type: application/json',
    //         ),
    //     ));

    //     $response = curl_exec($curl);

    //     curl_close($curl);
    //     echo $response;

        $return_url = "http://127.0.0.1:8000/epayment/verify";
        $website_url = "http://127.0.0.1:8000";
        $khalti = env('KHALTI');
        $order_id = $request->purchase_order_id;


        $data = ([
            "return_url"=> $return_url,
            "website_url"=> "https://example.com/",
            "amount"=> 1300,
            "purchase_order_id"=> $order_id,
            "purchase_order_name"=> "test",
            ]);

            $response = Http::withHeaders([
                'Authorization' => 'key bba77349f1814301a97167471b241aea',
                'Content-Type'=> 'application/json',
            ])->post($khalti."epayment/initiate/", $data);

            $payment = Payment::where('ulid',$order_id)->first();
            // return $payment;
            $payment->ref_id = $response['pidx'];
            $payment->request_date = Carbon::now();
            $payment->save();





        return redirect($response['payment_url']);
    }

    public function verifyPayment(Request $request){

        $khalti = env('KHALTI');

        $pidx = $request->pidx;

        $data = ([
            "pidx"=> $pidx,
            ]);

            $response = Http::withHeaders([
                'Authorization' => 'key bba77349f1814301a97167471b241aea',
                'Content-Type'=> 'application/json',
            ])->post($khalti."epayment/lookup/", $data);

            $payment = Payment::where('ref_id',$pidx)->get()->first();
            $payment->txn_id = $response['transaction_id'];
            $payment->payment_mode= "khalti";
            $payment->payment_status= $response['status'];
            $payment->response_date = Carbon::now();

            $payment->save();




            //https://test-pay.khalti.com/wallet?pidx=tdcUrw3ZJVxYEXRtG74K3S
        //  return $response;

        // if()

        // return "djd";

        return view('khaltiPayment.success');
    }
}
