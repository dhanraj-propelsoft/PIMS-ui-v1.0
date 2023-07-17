<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

if (!function_exists('apiHeaders')) {
    function apiHeaders()
    {
        $bearerToken = Session::get('token');
        $head =  Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $bearerToken
        ]);
        return $head;
    }
}

if (!function_exists('getBaseUrl')) {
    function getBaseUrl()
    {
        $url =  config('services.APIGATEWAYURI.base_uri');
        return $url;
    }
}
