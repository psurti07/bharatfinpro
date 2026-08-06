<?php
defined('BASEPATH') or exit('No direct script access allowed');
header('Content-Type: text/html; charset=utf-8');

    function generateJwt($header, $payload, $secret)
    {
        $headerEncoded = base64UrlEncode(json_encode($header));
        $payloadEncoded = base64UrlEncode(json_encode($payload));
        $signature = hash_hmac('sha256', $headerEncoded . '.' . $payloadEncoded, $secret, true);
        $signatureEncoded = base64UrlEncode($signature);

        return $headerEncoded . '.' . $payloadEncoded . '.' . $signatureEncoded;
    }

    function base64UrlEncode($data)
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    function getjwttoken(){
        $reqId = rand(111111, 999999);
        $tokendata = array(
            "timestamp" => date('Y-m-d H:i:s'),
            "partnerId" => 20221173,
            "reqId" => $reqId,
        );
        
        $header = array(
            'alg' => 'HS256', // Algorithm used
            'typ' => 'JWT'    // Type of token
        );

        $secret='Q1AwMDQ3NTokMnkkMTIkMjNlVmlrVGlkYjBnSUdzY04ud1JmZVZiYWFYZnpqeVJJS1prOWprT0U5TThYNlFha1NZYU8='; //partnerToken

        // Generate JWT token
        $generatedToken = generateJwt($header, $tokendata, $secret);

        return $generatedToken;
    }

    function cipherPaymentStatus($status){
        switch($status){
            case 1:
                $msg = 'Transaction Successfull';
                break;
            case 2:
                $msg = 'Transaction Under Process';
                break;
            case 3:
                $msg = 'Transaction Under Process';
                break;
            case 4:
                $msg = 'Transaction Under Process';
                break;
            default:
                $msg = 'Transaction Failed';
                break;
        }
        return $msg;
    }