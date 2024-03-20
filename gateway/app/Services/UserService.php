<?php

namespace App\Services;
use Illuminate\Http\Request;

class UserService extends ApiService
{
    public function __construct()
    {
        $this->endpoint = env('AUTH_APP_URL');
    }

    function get_users()
    {
        return $this->get('users');
    }
}