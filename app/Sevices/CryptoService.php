<?php

namespace App\Sevices;

/**
 * Class CryptoService
 * @package App\Sevices
 */
class CryptoService
{
    public static function encrypt_decrypt(string $action, string $string, string $encrypt_method): string
    {
        $output = false;

        switch ($encrypt_method) {
            case 'BF-OFB': $length = 8; break;
            case 'AES-128-CBC': $length = 16; break;
            case 'AES-256-CBC': $length = 16; break;
            default: $length = 0;
        }


        $key = hash('sha256', config('app.crypt.key'));

        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', config('app.crypt.iv')), 0, $length);

        if ( $action == 'encrypt' ) {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        } else if( $action == 'decrypt' ) {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }

        return $output;
    }
}