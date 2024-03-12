<?php

namespace App\Services;

use App\Models\Role;
use Illuminate\Http\Request;


class RoleService
{
    function get_all()
    {
        $roles = Role::all();
        return $roles;
    }

    public function get($id)
    {
        
    }

    public function create(Request $request)
    {

    }

    function delete() {
    }

    function update() {
    }
}