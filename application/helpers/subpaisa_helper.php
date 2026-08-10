<?php
defined('BASEPATH') or exit('No direct script access allowed');
header('Content-Type: text/html; charset=utf-8');

define('OPENSSL_CIPHER_NAME', 'aes-128-cbc');
define('CIPHER_KEY_LEN', '16');

function fixKey($key)
{
    if (strlen($key) < CIPHER_KEY_LEN) {

        return str_pad("$key", CIPHER_KEY_LEN, "0");
    }

    if (strlen($key) > CIPHER_KEY_LEN) {

        return substr($key, 0, CIPHER_KEY_LEN);
    }
    return $key;
}

function encrypt($key, $iv, $data)
{
    /*echo 'Data value is :' .$data;*/
    $encodedEncryptedData = base64_encode(openssl_encrypt($data, OPENSSL_CIPHER_NAME, fixKey($key), OPENSSL_RAW_DATA, $iv));
    $encodedIV = base64_encode($iv);
    $encryptedPayload = $encodedEncryptedData . ":" . $encodedIV;
    /*echo '$encryptedPayload value is :' .$encryptedPayload;*/
    return $encryptedPayload;
}

function decrypt($key, $iv, $data)
{
    $parts = explode(':', $data); //Separate Encrypted data from iv.
    $encrypted = $parts[0];
    $iv = $parts[1];
    $decryptedData = openssl_decrypt(base64_decode($encrypted), OPENSSL_CIPHER_NAME, fixKey($key), OPENSSL_RAW_DATA, base64_decode($iv));
    return $decryptedData;
}
