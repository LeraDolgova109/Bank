<?php

namespace App\Services;

use App\Models\Role;
use App\Models\Staff;
use Illuminate\Http\Request;


class StaffService
{
    function get_all()
    {
        $staffs = Staff::with(['role'])->get();
        return $staffs;
    }

    public function get($id)
    {
        $staff = Staff::with(['role', 'active_ban'])->where(['id', '=', $id])->get();
        return $staff;
    }

    public function create(Request $request)
    {
        $staff = Staff::create([
            'user_id' => $request->user_id,
            'is_banned' => false
        ]);
        $role = [
            'role_id' => $request->role_id  
        ];
        $staff->role()->attach($role);
        return $staff->with('role');
    }

    function delete($id) { 
        $staff = Staff::with('role')->find($id);
        $staff->role()->detach($staff->role[0]->id);
        $staff->delete();
        return true;
    }

    function update() {
    }
}