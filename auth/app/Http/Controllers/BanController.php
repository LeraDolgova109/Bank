<?php

namespace App\Http\Controllers;

use App\Models\Ban;
use App\Models\User;
use Illuminate\Http\Request;

class BanController extends Controller
{
    public function ban(Request $request)
    {
        $user = User::find($request->staff_id);
        $ban = Ban::create([
            'user_id' => $request->user_id,
            'reason' => $request->reason,
            'end_time' => $request->end_time,
            'role' => $request->role,
        ]);
        $user->update(['is_banned' => true]);
        return true;
    }

    function unban(Request $request, $id){
        $user = User::find($id);
        $ban = Ban::where('user_id', '=', $user->id)
                ->where('role', '=', $request['role'])
                ->delete();
        $user->update(['is_banned' => false]);
        return true;
    }
}
