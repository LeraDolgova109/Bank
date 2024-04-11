<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function create(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        if (Role::where('user_id', '=', $request->user_id)
                ->where('role', '=', $request->role)->first() != null)
        {
            return response() -> json('User already has that role.', 400);
        }
        $role = Role::create([
            'user_id' => $request->user_id,
            'role' => $request->role
        ]);
        return true;
    }
}
