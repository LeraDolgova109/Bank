<?php

namespace App\Services;

use App\Models\Role;
use App\Services\ServiceInterface;

class RoleService implements ServiceInterface
{
    function get_all()
    {
        $roles = Role::all();
        return $roles;
    }

    public function get($id)
    {
        
    }

    public function create()
    {

    }

    function delete() {
    }

    function update() {
    }
}