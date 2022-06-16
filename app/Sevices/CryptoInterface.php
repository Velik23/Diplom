<?php

namespace App\Sevices;


interface CryptoInterface
{
    public function encrypt(string $data,string $secret_key, string $secret_iv): string ;

    public function decrypt(string $data,string $secret_key, string $secret_iv): string;
}