<?php

defined('BASEPATH') or exit('No direct script access allowed');

class CipherPay extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Load necessary libraries or helpers here
        $this->load->helper('url');

        $this->mainurl = "https://uat-api.cipherpay.in/api/v3/";

        $this->key = "JDJ5JDEyJDIzZVZpa1RpZGIwZ0lHc2NOLndSZmVWYmFhWGZ6anlSSUtaazlqa09FOU04WDZRYWtTWWFPQ1AwMDQ3NQ==";         // authorised key
        $this->partnerid = "20221173";         // 2022XXXX

        $this->headerJson = '{"partnerId":"CP00475","headerToken":"qMnxzjZajR-motEEJ67XE-fE9sX-RfOkS-SMzhKGDzDM"}';
        $this->publicKey = "-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAoattCUfDgybLVqFpvEeZ
WatkoqGB3aUUnvijSQiXpwmBBrYm/wvyQG44DQeyuJ+Cb98/dv19WfIyHBBuWiGO
lr1uQ+aQzjLtTcRDLhPbpiZOssWnNA6KFokuRTBwJ3yAnyIRfhUkGL5NdKeJ/PGF
sMTYL/JzwamRqeaxSwAfnQNHP7PIVuFQPTgYJRewBwTJMHu939RHKx4OIo3rvYLP
Mal6ExyzI5ygersOhHDujtCLW6OJrHEp6OK/aAJoD0HCMJKIViopzXQaXhnNaB9P
f3tq23gJut4W5/j4sDYQgISEkjE3aoxDB/CMmG3MZJyii5o8t4xdDPPBqu7d+6ZA
AwIDAQAB
-----END PUBLIC KEY-----";     //body public key 
        $this->aesKey = '';
        $this->aesIv = '';
        $this->publicKeyHeader = '-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAzANn5M5ucMsQx1AdYxwB
KUgHEZAczocgf8DTw1aMhGmaUWAD97zctMNBeregouTpB1ORkw626c7hqGQPMFNT
MULBmClwqNAr1YfdZpu8BeW7/heihulhMuCtYXtc9eJJD6p8InF7RverOVcSzIDP
boHTc9pjUZ4kwGKwKnEGNBITtwKZNnJeLxXsWJqv3zY3e43Ax1dzqP0UuZau0gtY
kz135UL2T2FM+Tjz+ftYW52pKkJMwDsf6xUld5QFHS2oQ0Ilmkpmf4IwF6Xj01R7
Ff9cNFG7BQs4OYG6nk0XrvuiPrMcl+2RyUOiJkrfHVVpuBiKb60zKvI6daSRjPEA
vwIDAQAB
-----END PUBLIC KEY-----'; // header key';       //header key

        $this->partnerToken = 'Q1AwMDQ3NTokMnkkMTIkMjNlVmlrVGlkYjBnSUdzY04ud1JmZVZiYWFYZnpqeVJJS1prOWprT0U5TThYNlFha1NZYU8='; //partner Token

    }

    public function index()
    {
        echo "CipherPay API Controller Initialized.";
    }

    public function status($reqData)
    {
        $request = array(
            "method" => "POST",
            "url" => "pay/check-status",
            "parameter" => $reqData
        );
        $response = $this->finalResponse($this->hit($request));
        return $response;
    }

    private function finalResponse($response)
    {

        $responseData = $response['returnData'] ?? null;
        if (!$responseData) {
            return $response;
        }
        $encrypted = base64_decode($responseData);
        $decrypted = openssl_decrypt($encrypted, 'aes-128-cbc', $this->aesKey, OPENSSL_RAW_DATA, $this->aesIv);
        $decrypted = json_decode($decrypted, true);
        return $decrypted;
    }

    public function hit($reqData)
    {
        log_message('error', 'json reqData 1111-- ' . json_encode($reqData));

        $url = $this->mainurl . $reqData['url'];

        log_message('error', 'json url -- ' . json_encode($url));
        $num = time();
        $this->load->helper('cipherpay');
        $reqData['jwt'] = $this->getjwttoken();
        log_message('error', 'json  getjwttoken -- ' . json_encode($reqData['jwt']));
        if (!empty($reqData['parameter'])) {
            $parameter = json_encode($reqData['parameter']);
        } else {
            $parameter = "";
        }
        $info = $this->finalRequest($parameter);

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $reqData['method'],
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_POSTFIELDS => json_encode($info['payload']),
            CURLOPT_HTTPHEADER => array(
                "Token: " . $reqData['jwt'],
                "Auth: " . $info['Auth'],
                "Key:" . $info['Key'],
                "cache-control: no-cache",
                "content-type: application/json",
                "User-Agent: PostmanRuntime/7.29.2"
            ),
        ));
        $response = curl_exec($curl);

        //echo $response;
        if (curl_errno($curl)) {
            $resp = array(
                "errorCode" => "PAYSPRINT-001",
                "error_code" => curl_errno($curl),
                "message" => curl_error($curl),
                "errorMessage" => "Unable to get response please try again later"
            );
        } else {
            $resp = $this->response($response);
        }

        return $resp;
    }

    /**
     *  Returns encoded JWT token
     *
     * @return string
     *
     */


    private function getjwttoken()
    {
        $reqId = rand(1000, 9999);
        $tokendata = array(
            "timestamp" => date('Y-m-d H:i:s'),
            "partnerId" => $this->partnerid,
            "reqId" => $reqId,
        );
        $header = $header = array(
            'alg' => 'HS256',
            'typ' => 'JWT'
        );

        $secret = $this->partnerToken;

        return $this->generateJwt($header, $tokendata, $secret);
    }

    function generateJwt($header, $payload, $secret)
    {
        $headerEncoded = $this->base64UrlEncode(json_encode($header));
        $payloadEncoded = $this->base64UrlEncode(json_encode($payload));
        $signature = hash_hmac('sha256', $headerEncoded . '.' . $payloadEncoded, $secret, true);
        $signatureEncoded = $this->base64UrlEncode($signature);
        return $headerEncoded . '.' . $payloadEncoded . '.' . $signatureEncoded;
    }


    /**
     * base 64 url encode
     *
     * @param $data
     * @return string
     */
    function base64UrlEncode($data)
    {
        $urlSafeData = strtr(base64_encode($data), '+/', '-_');
        return rtrim($urlSafeData, '=');
    }

    public function finalRequest($parameters = "")
    {
        $salt = bin2hex(openssl_random_pseudo_bytes(8));
        $data = $this->generateAesKey($salt);
        $key = $data[0];
        $iv = $data[1];
        $cipher = 'aes-128-cbc';

        if ($parameters != "") {
            $encrypted = openssl_encrypt($parameters, $cipher, $key, OPENSSL_RAW_DATA, $iv);
            $encrypted = base64_encode($encrypted);
        }
        $encryptedSalt = $this->rsaEncrypt($salt, $this->publicKey);
        $encryptedHeader = $this->rsaEncrypt($this->headerJson, $this->publicKeyHeader);

        $request = [
            'Auth' => $encryptedHeader,
            'Key' => $encryptedSalt,
            'payload' => $parameters ? ['requestData' => $encrypted] : null,
        ];

        return $request;
    }

    public function generateAesKey($salt)
    {
        $salt = hex2bin($salt);
        $passphrase = 'CipherPay API Payout';
        $iterationCount = 10000;
        $keySize = 128;
        $hashAlgorithm = 'sha1';
        $key = openssl_pbkdf2($passphrase, $salt, $keySize / 8, $iterationCount, $hashAlgorithm);
        $this->aesKey = $key;
        $this->aesIv = bin2hex($salt);
        return [$key, bin2hex($salt)];
    }


    public function rsaEncrypt($data, $publicKey)
    {

        $publicKey = openssl_get_publickey($publicKey);
        openssl_public_encrypt($data, $encrypted, $publicKey);
        return base64_encode($encrypted);
    }

    /* Dynamic qr function call */
    public function DynamicQr()
    {
        $this->load->library('Qrcode'); // Load the QR code library
        $refId = rand(1000, 9999);
        $request_p = array(
            "parameter" => array(
                'receiver_vpa' => "#",
                'amount' => "299", // amount
                'remarks' => "Dynamic QR", // remarks
                'refid' => $refId, //refrence id
                'expiry' => "2", //in minutes
                'type' => "QR"
            )
        );

        //$this->session->set_userdata('refid', $refId);


        $url = $this->mainurl . 'payin/dynamic-qr';

        $num = time();
        $this->load->helper('cipherpay');
        $jwt = $this->getjwttoken();

        //$info = $this->finalRequest($parameter);

        $salt = bin2hex(openssl_random_pseudo_bytes(8));


        $data = $this->generateAesKey($salt);
        $key = $data[0];
        $iv = $data[1];
        $cipher = 'aes-128-cbc';


        if ($request_p['parameter'] != "") {
            $encrypted = openssl_encrypt(json_encode($request_p['parameter']), $cipher, $key, OPENSSL_RAW_DATA, $iv);
            $encrypted = base64_encode($encrypted);
        }
        $encryptedSalt = $this->rsaEncrypt($salt, $this->publicKey);
        $encryptedHeader = $this->rsaEncrypt($this->headerJson, $this->publicKeyHeader);

        $request = array(
            'Auth' => $encryptedHeader,
            'Key' => $encryptedSalt,
            'payload' =>  ['requestData' => $encrypted]
        );
        //print_r($request);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_POSTFIELDS => json_encode($request['payload']),
            CURLOPT_HTTPHEADER => array(
                "Token: " . $jwt,
                "Auth: " . $request['Auth'],
                "Key:" . $request['Key'],
                "cache-control: no-cache",
                "content-type: application/json",
                "User-Agent: PostmanRuntime/7.29.2"
            ),
        ));

        $response = curl_exec($curl);

        //echo $response;
        if (curl_errno($curl)) {
            $resp = array(
                "errorCode" => "PAYSPRINT-001",
                "error_code" => curl_errno($curl),
                "message" => curl_error($curl),
                "errorMessage" => "Unable to get response please try again later"
            );
        } else {
            $resp = $this->response($response);
        }


        //$response = $this->finalResponse($this->hit($request));die;
        $responses = $this->finalResponse($response);
        $result = json_decode($responses, true);
        //log_message('error','final hit - ' .json_encode($response));
        //return response(QrCode::size(200)->generate($response['qr']));

        $this->load->library('ciqrcode');

        $params['data'] = $result['returnData']; // URL or text
        $params['level'] = 'H'; // Error correction level: L, M, Q, H
        $params['size'] = 10;
        $params['savename'] = base_url() . 'assets/images/qrcode.png'; // Save to file

        $qr = $this->ciqrcode->generate($params);

        $this->load->view('cipherpay', ['result' => $params]);
        //return $responses;
    }

    public function create_qr()
    {
        $this->load->library('ciqrcode');

        $params['data'] = $_GET['data']; // URL or text
        $params['level'] = 'H'; // Error correction level: L, M, Q, H
        $params['size'] = 10;
        $params['savename'] = FCPATH . 'assets/images/qrcode.png'; // Save to file

        $this->ciqrcode->generate($params);

        echo '<img src="' . base_url('assets/images/qrcode.png') . '" />';
    }

    public function encryptData($data)
    {
        // Example encryption logic
        openssl_public_encrypt($data, $encryptedData, self::$publicKey);
        return base64_encode($encryptedData);
    }


    public function response($response)
    {

        $res = json_decode($response, TRUE);
        return $res;
    }

    /*public function payin_dqr($reqData)
    {
        $request = array(
            "method" => "POST",
            "url" => "payin/dynamic-qr",
            "parameter" => $reqData
        );
        $response = $this->finalResponse($this->hit($request));
        return $response;
    }*/


    public function payin_collect($reqData)
    {
        $request = array(
            "method" => "POST",
            "url" => "payin/initiate-collect",
            "parameter" => $reqData
        );
        $response = $this->finalResponse($this->hit($request));
        return $response;
    }
}
