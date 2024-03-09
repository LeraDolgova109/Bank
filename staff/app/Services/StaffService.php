<?php

namespace App\Services;

use App\Models\Staff;
use App\Services\ServiceInterface;

class StaffService implements ServiceInterface
{
    function get_all()
    {
        $staffs = Staff::with(['role'])->get();
        return $staffs;
    }

    public function get($id)
    {
        $staff = Staff::with(['role', 'active_ban'])->get();
        return $staff;
    }

    public function create()
    {

    }

    function delete() {
    }

    function update() {
    }
}