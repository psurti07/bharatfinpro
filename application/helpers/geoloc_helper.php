<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('getGeolocation')) {

    function getGeolocation($pincode)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://geoloc.in/api/pincode',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS =>  json_encode([
                'pincode' => (string) $pincode
            ]),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer ' . GEOLOC_API_KEY,
            ),
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
        ));

        $response = curl_exec($curl);

        if ($response === false) {
            $error = curl_error($curl);
            curl_close($curl);
            throw new \Exception('Curl error: ' . $error);
        }

        curl_close($curl);

        $result = json_decode($response, true);

        if (
            !isset($result['data']) ||
            empty($result['data'][0])
        ) {
            throw new \Exception('Invalid API response');
        }

        return $result['data'][0];
    }
}
