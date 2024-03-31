<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ban;
use App\Models\User;
use Illuminate\Http\Request;

class BanController extends Controller
{
    public function show($id)
    {
        $ban = Ban::where('user_id', '=', $id)->get();
        return response() -> json ($ban);
    }

    public function ban(Request $request)
    {
        $user = User::find($request->user_id);
        $ban = Ban::create([
            'user_id' => $request->user_id,
            'reason' => $request->reason,
            'end_time' => $request->end_time,
            'role' => $request->role
        ]);
        return true;
    }

    function unban(Request $request, $id){
        $ban = Ban::where('user_id', '=', $id)
            ->where('role','=', $request->role)
            ->delete();
        return true;
    }
}