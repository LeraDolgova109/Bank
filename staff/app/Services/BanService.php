<?php

namespace App\Services;

use App\Models\Ban;
use App\Models\User;
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
        $user = User::find($request->user_id);
        $ban = Ban::create([
            'user_id' => $request->user_id,
            'reason' => $request->reason,
            'end_time' => $request->end_time
        ]);
        $user->update(['is_banned' => true]);
        return true;
    }

    function unban(Request $request){
        $user = User::find($request->user_id);
        $ban = Ban::where(['user_id', '=', $user->id])->delete();
        $user->update(['is_banned' => false]);
        return true;
    }
}