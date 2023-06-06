<?php

$amount = $_POST['amount']*100;
$account= $_POST['account'];
 $ifsc = $_POST['ifsc'];
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.razorpay.com/v1/orders',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => '{
  "amount":"'.$amount.'",
  "currency": "INR",
  "transfers": [
    {
      "account":"'.$account.'",
      "amount":"'.$amount.'",
      "currency":"INR",
      "notes": {
        "branch":"'.$ifsc.'",
        "name": "Saarthi"
      },
      "linked_account_notes": [
        "branch"
      ],
      "on_hold": 1,
      "on_hold_until": 1671222870
    }
   
  ]
}',
    CURLOPT_HTTPHEADER => array(
        'content-type: application/json',
        'Authorization: Basic cnpwX3Rlc3RfendVMEtleFkwMkJ4M1I6RDlWbElFOVBjWDJVcmtvWUtndjNRQ3Ew'
    ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
