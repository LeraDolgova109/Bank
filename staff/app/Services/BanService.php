<?php

namespace App\Services;

use App\Models\Ban;
use App\Models\Staff;
use Illuminate\Http\Request;

class BanService
{
    function get_all()
    {

    }

    public function get($id)
    {
        
    }

    public function ban(Request $request)
    {
        $staff = Staff::find($request->staff_id);
        $ban = Ban::create([
            'staff_id' => $request->staff_id,
            'reason' => $request->reason,
            'end_time' => $request->end_time
        ]);
        $staff->update(['is_banned' => true]);
        return true;
    }

    function unban($id){
        $staff = Staff::find($id);
        $ban = Ban::where('staff_id', '=', $staff->id)->delete();
        $staff->update(['is_banned' => false]);
        return true;
    }
}