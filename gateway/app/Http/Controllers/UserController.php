<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $service = new UserService();
        $users = $service->get_users();
        return response() -> json($users);
    }

    public function create(Request $request)
    {
        $service = new UserService();
        $users = $service->create_user($request);
        return response() -> json($users);
    }

    public function show($id)
    {
        $service = new UserService();
        $result = $service->get_user($id);
        return response() -> json($result);
    }
    public function show_ban($id)
    {
        $service = new UserService();
        $result = $service->show_ban($id);
        return response() -> json($result);
    }

    public function ban(Request $request)
    {
        $service = new UserService();
        $result = $service->ban_user($request);
        return response() -> json($result);
    }

    public function unban(Request $request, $id)
    {
        $service = new UserService();
        $result = $service->unban_user($request, $id);
        return response() -> json($result);
    }
}

