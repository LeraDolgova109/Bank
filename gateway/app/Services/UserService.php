<?php

namespace App\Services;
use Illuminate\Http\Request;

class UserService extends ApiService
{
    public function __construct()
    {
        $this->endpoint = "https://oauth/api/";
    }

    function get_users($token)
    {
        return $this->get('users', $token);
    }

    function get_user($token, $id)
    {
        return $this->get("users/$id", $token);
    }

    function create_user(Request $request)
    {
        $token = $request->bearerToken();
        return $this->post('create', json_encode($request->all()), $token);
    }

    function ban_user(Request $request)
    {
        $token = $request->bearerToken();
        return $this->post('ban', json_encode($request->all()), $token);
    }

    function unban_user(Request $request, $id)
    {
        $token = $request->bearerToken();
        return $this->put("unban/$id", json_encode($request->all()), $token);
    }

    function show_ban($token, $id)
    {
        return $this->get("ban/$id", $token);
    }
}