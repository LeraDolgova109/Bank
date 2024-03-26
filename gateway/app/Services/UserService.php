<?php

namespace App\Services;
use Illuminate\Http\Request;

class UserService extends ApiService
{
    public function __construct()
    {
        $this->endpoint = "https://auth/api/";
    }

    function get_users()
    {
        return $this->get('users');
    }

    function get_user($id)
    {
        return $this->get("users/$id");
    }


    function create_user(Request $request)
    {
        return $this->post('create', json_encode($request->all()));
    }

    function ban_user(Request $request)
    {
        return $this->post('ban', json_encode($request->all()));
    }

    function unban_user(Request $request, $id)
    {
        return $this->put("unban/$id", json_encode($request->all()));
    }

    function show_ban($id)
    {
        return $this->get("ban/$id");
    }
}