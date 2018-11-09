<?php

if (!function_exists('doctorID')) {
    function doctorID()
    {
        $body = strtoupper(str_split(md5(openssl_random_pseudo_bytes(10)),8)[1]);
        return $id= 'DID-'.date('y').'-'.$body;
    }
}
