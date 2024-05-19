<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use App\Services\KeysService;

class RoleController extends Controller
{

    private KeysService $keysService;

    public function __construct(){
        $this->keysService = new KeysService();
    }
    public function create(Request $request)
    {
        try {
           $user = User::findOrFail($request->user_id);
            if (Role::where('user_id', '=', $request->user_id)
                    ->where('role', '=', $request->role)->first() != null)
            {
                try 
                {
                    $logsService = new \App\Services\LogsService();
                    $logsService->send('info', 'trace_id: ' . getallheaders()['trace-id'], 200);
                }
                catch (Exception $e)
                {

                }
                return response() -> json('User already has that role.', 400);
            }
            $role = Role::create([
                'user_id' => $request->user_id,
                'role' => $request->role
            ]);
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
