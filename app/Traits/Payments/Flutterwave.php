<?php

namespace App\Traits\Payments;

class Flutterwave
{
	public static function verify($reference)
	{		
        $query = array(
            "SECKEY" => config('flutterwave.secret_key'),
            "txref" => $reference
        );

        $data_string = json_encode($query);
                
        $ch = curl_init('https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/verify');                                                                      
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                              
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        $response = curl_exec($ch);

        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);

        curl_close($ch);

        $resp = json_decode($response, true);

        // $orderNumber = $resp['data']['meta'];
        // $orderId = $orderNumber[0]['metavalue'];
        $paymentStatus = $resp['data']['status'];
        $chargeResponsecode = $resp['data']['chargecode'];
        $chargeAmount = $resp['data']['amount'];
        $payment_reference = $resp['data']['txref'];
        $payment_gateway_charge = $resp['data']['appfee'];

        if (($chargeResponsecode == "00" || $chargeResponsecode == "0")) {
            return [
                'success' => true,
                'payment_gateway' => 'Flutterwave',
                'payment_gateway_json_response' => json_encode($resp),
                'payment_reference' => $payment_reference,
                'payment_gateway_charge' => (float)$payment_gateway_charge,
                'payment_gateway_message' => $paymentStatus,
                'payment_gateway_method' => 'Card',
                'status' => 'Paid',
                'amount_paid' => $chargeAmount,
            ]; 
        } else {
    
            return [
                'success' => false,
                'payment_gateway' => 'Flutterwave',
                'payment_gateway_json_response' => json_encode($resp),
                'payment_reference' => $payment_reference,
                'payment_gateway_charge' => (float)$payment_gateway_charge,
                'payment_gateway_message' => 'transaction failed on gateway',
                'status' => 'Failed',
            ];
        }
	}
}

