<?php

namespace App\Http\Controllers;

use App\Models\Ban;
use App\Models\User;
use App\Services\BanService;
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