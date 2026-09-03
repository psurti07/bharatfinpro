<?php
defined('BASEPATH') or exit('No direct script access allowed');
header('Content-Type: text/html; charset=utf-8');

function createMerchantToken()
{

  $auth = array(
    'mid' => PAYGIC_MID,
    'password' => PAYGIC_PASSWORD
  );

  $url = curl_init();
  curl_setopt_array($url, [
    CURLOPT_URL => "https://server.paygic.in/api/v2/createMerchantToken",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => json_encode($auth),
    CURLOPT_HTTPHEADER => [
      "accept: application/json",
      "content-type: application/json",
    ]
  ]);

  $response = curl_exec($url);
  $err = curl_error($url);
  curl_close($url);
  if ($err) {
    return "cURL Error #:" . $err;
  } else {
    return json_decode($response);
  }
}

function createPaymentPage($data, $token)
{

  $url = curl_init();
  curl_setopt_array($url, [
    CURLOPT_URL => "https://server.paygic.in/api/v2/createPaymentPage",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => json_encode($data),
    CURLOPT_HTTPHEADER => [
      "content-type: application/json",
      "token: $token",
    ]
  ]);

  $response = curl_exec($url);
  $err = curl_error($url);
  curl_close($url);
  return $response;
}

function checkPaymentStatus($orderid, $token)
{

  $data = array(
    'mid' => PAYGIC_MID,
    'merchantReferenceId' => $orderid
  );
  $url = curl_init();
  curl_setopt_array($url, [
    CURLOPT_URL => "https://server.paygic.in/api/v2/checkPaymentStatus",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => json_encode($data),
    CURLOPT_HTTPHEADER => [
      "content-type: application/json",
      "token: $token",
    ]
  ]);

  $response = curl_exec($url);
  $err = curl_error($url);
  curl_close($url);
  return $response;
}
