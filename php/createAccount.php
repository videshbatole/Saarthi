<?php

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.razorpay.com/v1/beta/accounts',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => '{
           "name":"Gaurav Kumar",
           "email":"videsh@example.com",
           "tnc_accepted":true,
           "account_details":{
              "business_name":"Acme Corporation",
              "business_type":"individual"
           },
           "bank_account":{
              "ifsc_code":"HDFC0CAGSBK",
              "beneficiary_name":"Gaurav Kumar",
              "account_type":"current",
              "account_number":304030434
           }
        }',
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Authorization: Basic cnpwX3Rlc3Rfb3Z1NnFoWVdDMEJqZVI6ZHdab0tNenh3VGpVQ2lmV0c5RE9NaTZn'
    ),
));

$response = curl_exec($curl);

curl_close($curl);
header('Content-Type: application/json; charset=utf-8');
echo json_encode($response);
 
?>