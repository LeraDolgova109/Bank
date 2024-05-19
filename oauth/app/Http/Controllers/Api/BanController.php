<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ban;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use App\Services\KeysService;

class BanController extends Controller
{
    private KeysService $keysService;

    public function __construct(){
        $this->keysService = new KeysService();
    }
    public function show($id)
    {
        try {
            $ban = Ban::where('user_id', '=', $id)->get();
            try 
            {
                $logsService = new \App\Services\LogsService();
                $logsService->send('info', 'trace_id: ' . getallheaders()['trace-id'], 200);
            }
            catch (Exception $e)
            {

            }
            return response() -> json ($ban);
        } catch (Exception $e) {
            try 
            {
                $logsService = new \App\Services\LogsService();
                $logsService->send('error', 'trace_id: ' . getallheaders()['trace-id'], $e->getCode());
            }
            catch (Exception $e)
            {

            }
        }
    }

    public function ban(Request $request)
    {
        try {
            $user = User::find($request->user_id);
            $ban = Ban::create([
                'user_id' => $request->user_id,
                'reason' => $request->reason,
                'end_time' => $request->end_time,
                'role' => $request->role
            ]);
            $keysService = new KeysService();
            $keysService->write(getallheaders()['Idempotency-key'], true);
            try 
            {
                $logsService = new \App\Services\LogsService();
                $logsService->send('info', 'trace_id: ' . getallheaders()['trace-id'], 200);
            }
            catch (Exception $e)
            {

            }
            return true;
        } catch (Exception $e) {
            try 
            {
                $logsService = new \App\Services\LogsService();
                $logsService->send('error', 'trace_id: ' . getallheaders()['trace-id'], $e->getCode());
            }
            catch (Exception $e)
            {

            }
        }
    }

    function unban(Request $request, $id){
        try {
            $ban = Ban::where('user_id', '=', $id)
                ->where('role','=', $request->role)
                ->delete();
            $this->keysService->write(getallheaders()['Idempotency-key'], true);
            try 
            {
                $logsService = new \App\Services\LogsService();
                $logsService->send('info', 'trace_id: ' . getallheaders()['trace-id'], 200);
            }
            catch (Exception $e)
            {

            }
            return true;
        } catch (Exception $e) {
            try 
            {
                $logsService = new \App\Services\LogsService();
                $logsService->send('error', 'trace_id: ' . getallheaders()['trace-id'], $e->getCode());
            }
            catch (Exception $e)
            {

            }
        }
    }
}