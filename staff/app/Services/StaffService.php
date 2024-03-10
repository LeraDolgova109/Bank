<?php

namespace App\Services;

use App\Models\Role;
use App\Models\Staff;
use Illuminate\Http\Request;


class StaffService
{
    function get_all()
    {
        $staffs = Staff::with(['role', 'ban'])->get();
        return $staffs;
    }

    public function get($id)
    {
        $staff = Staff::with(['role', 'ban'])->where(['id', '=', $id])->get();
        return $staff;
    }

    public function create(Request $request)
    {
        $staff = Staff::create([
            'user_id' => $request->user_id,
            'role_id' => $request->role_id,    
            'is_banned' => false,  
        ]);
        return $staff;
    }

    function delete($id) { 
        $staff = Staff::with('role')->find($id);
        $staff->role()->detach($staff->role->id);
        $staff->delete();
        return true;
    }

    function update() {
    }
}