<?php


function encrypt($plainText) 
{

    $key = openssl_digest("passkey", 'SHA256', TRUE);

    $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
    $iv = openssl_random_pseudo_bytes($ivlen);
    // binary cipher
    $ciphertext_raw = openssl_encrypt($plainText, $cipher, $key, OPENSSL_RAW_DATA, $iv);
    // or replace OPENSSL_RAW_DATA & $iv with 0 & bin2hex($iv) for hex cipher (eg. for transmission over internet)

    // or increase security with hashed cipher; (hex or base64 printable eg. for transmission over internet)
    $hmac = hash_hmac('sha256', $ciphertext_raw, $key, true);
    return $ciphertext = base64_encode( $iv.$hmac.$ciphertext_raw );



}

function decrypt($cipherText)
{

    $key = openssl_digest("passkey", 'SHA256', TRUE);

    $c = base64_decode($cipherText);
    $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
    $iv = substr($c, 0, $ivlen);
    $hmac = substr($c, $ivlen, $sha2len=32);
    $ciphertext_raw = substr($c, $ivlen+$sha2len);
    $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, OPENSSL_RAW_DATA, $iv);
    $calcmac = hash_hmac('sha256', $ciphertext_raw, $key, true);
    if (hash_equals($hmac, $calcmac)){
        return $original_plaintext;
    }
}