<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\RedirectController;
use App\Http\Requests\LoginRequest;
use App\Models\Ban;
use App\Models\Passport;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    public function index()
    {
        try {
            $users = User::with(['passport', 'roles'])->get();
            try 
            {
                $logsService = new \App\Services\LogsService();
                $logsService->send('info', 'trace_id: ' . getallheaders()['trace-id'], 200);
            }
            catch (Exception $e)
            {

            }
            return $users;
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

    public function login(LoginRequest $request)
    {
        $data = $request->validated();
        $credentials = [
            'email' => $data['email'],
            'password' => $data['password']
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $ban = Ban::where([
                ['user_id', '=', $user->id], 
                ['role', '=', $request->client],        
            ])->first();
            if ($ban != null && $ban->end_time > Carbon::now()) 
            {
                return response()->json('User is banned due to ' . $ban->end_time 
                                . ', reason: ' . $ban->reason, 403);
            }
            else if ($ban != null)
            {
                $ban->delete();
            }
            $data['access_token'] = $user->createToken('access_token')->accessToken;
            $redirest = new RedirectController();
            return $redirest->redirect($request->client, $data['access_token']);
        }    
        return response() -> json("Wrong email or password.", 400);
    }

    public function register(Request $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($request['password']);
        $user = User::create($data);
        $data1 = $data['passport'];
        $data1['user_id'] = $user->id;
        $passport = Passport::create($data1);

        $credentials = [
            'email' => $data['email'],
            'password' => $data['password']
        ];

        $data['access_token'] = $user->createToken($request->client)->accessToken;
        $redirest = new RedirectController();
        return $redirest->redirect($request->client, $data['access_token']);
    }

    public function logout()
    {
        return auth()->user()->token()->revoke();
    }

    public function show($id)
    {
        try {
            $user = User::with(['passport', 'roles'])->where('id', '=', $id)->first();
            try 
            {
                $logsService = new \App\Services\LogsService();
                $logsService->send('info', 'trace_id: ' . getallheaders()['trace-id'], 200);
            }
            catch (Exception $e)
            {

            }
            return $user;
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
