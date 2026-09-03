<?php
defined('BASEPATH') or exit('No direct script access allowed');
header('Content-Type: text/html; charset=utf-8');

function user_track($postdata)
{
  $curl = curl_init();

  curl_setopt_array($curl, [
    CURLOPT_URL => "https://api.interakt.ai/v1/public/track/users/",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => json_encode($postdata),
    CURLOPT_HTTPHEADER => [
      "Authorization: Basic " . INTERAKT_KEY,
      "Content-Type: application/json"
    ],
  ]);

  $response = curl_exec($curl);
  $err = curl_error($curl);
  curl_close($curl);

  $result = json_decode($response, true);
  return $result;
}

function event_track($postdata)
{
  $curl = curl_init();

  curl_setopt_array($curl, [
    CURLOPT_URL => "https://api.interakt.ai/v1/public/track/events/",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => json_encode($postdata),
    CURLOPT_HTTPHEADER => [
      "Authorization: Basic " . INTERAKT_KEY,
      "Content-Type: application/json"
    ],
  ]);

  $response = curl_exec($curl);
  $err = curl_error($curl);
  curl_close($curl);

  $result = json_decode($response, true);
  return $result;
}