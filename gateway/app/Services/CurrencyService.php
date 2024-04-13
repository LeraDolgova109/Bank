<?php

namespace App\Services;
use Illuminate\Http\Request;

class CurrencyService extends ApiService
{
    public function __construct()
    {
        $this->endpoint = "https://core/api/";
    }

    function get_currency($token)
    {
        return $this->get("currency", $token);
    }
}