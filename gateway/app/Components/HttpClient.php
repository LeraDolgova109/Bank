<?php

namespace App\Components;

use GuzzleHttp\Client;

class HttpClient
{
    public $client;
    public function __construct()
    {
        $this->client = new Client([
            'base_url' => env('CORE_APP_URL'),
            'verify' => false
        ]);
    }
}
