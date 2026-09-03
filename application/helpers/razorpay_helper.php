<?php
defined('BASEPATH') or exit('No direct script access allowed');
header('Content-Type: text/html; charset=utf-8');

function generateorder($data)
{
  $curl = curl_init();
  curl_setopt_array($curl, [
    CURLOPT_URL => "https://api.razorpay.com/v1/orders",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_USERPWD => RAZOR_KEY_ID . ':' . RAZOR_KEY_SECRET,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS =>  json_encode($data),
    CURLOPT_HTTPHEADER => [
      "Content-Type: application/json",
      "accept: application/json"
    ],
  ]);

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  return json_decode($response);
  /* if ($err) {
      return "cURL Error #:" . $err;
    } else {
      return json_decode($response);
    } */
}
