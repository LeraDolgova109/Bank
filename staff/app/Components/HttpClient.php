<?php

namespace app\Components;

use GuzzleHttp\Client;

class HttpClient
{
    public $client;
    public function __construct()
    {
        $this->client = new Client([
            'base_url' => env('COMPONENT_APP_URL'),
            'verify' => false
        ]);
    }
}
