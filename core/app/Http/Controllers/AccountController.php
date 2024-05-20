<?php

namespace App\Http\Controllers;

use App\Http\Requests\Account\CreateRequest;
use App\Http\Requests\Account\DebitRequest;
use App\Http\Requests\Account\ReplenishRequest;
use App\Http\Requests\Account\TransferRequest;
use App\Http\Resources\AccountResource;
use App\Http\Resources\AccountShortResource;
use App\Http\Resources\TransactionResource;
use App\Models\Account;
use App\Models\AccountType;
use App\Models\Transaction;
use App\Services\FirebaseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Nette\Utils\Type;

class AccountController extends Controller
{
    public function open(CreateRequest $request)
    {
        try {
            $idempotency_key = $request->header('Idempotency-Key');
            if ($idempotency_key && Cache::get($idempotency_key)) {
                $response = Cache::get($idempotency_key);
            } else {
                Account::create($request->all());
                $response = ['message' => 'Success'];
            }
            if ($idempotency_key) {
                Cache::put($idempotency_key, $response);
            }
            $this->except();
        } catch (\Exception $e) {
            $this->logsService->send('error', $e->getMessage() . " path=" . $request->getRequestUri(), $e->getCode());
            return response(["message" => $e->getMessage()], $e->getCode() >= 200 && $e->getCode() <= 500 ? $e->getCode() : 400);
        }
        $this->logsService->send('info', "path=" . $request->getRequestUri(), 200);
        return response($response, 200);
    }

    public function close(Account $account, Request $request)
    {
        try {
            $idempotency_key = $request->header('Idempotency-Key');
            if ($idempotency_key && Cache::get($idempotency_key)) {
                $response = Cache::get($idempotency_key);
            } else {
                $account->close();
                $response = ['message' => 'Success'];
            }
            if ($idempotency_key) {
                Cache::put($idempotency_key, $response);
            }
            $this->except();
        } catch (\Exception $e) {
            $this->logsService->send('error', $e->getMessage() . " path=" . $request->getRequestUri(), $e->getCode());
            return response(["message" => $e->getMessage()], $e->getCode() >= 200 && $e->getCode() <= 500 ? $e->getCode() : 400);
        }

        $this->logsService->send('info', "path=" . $request->getRequestUri(), 200);
        return response($response, 200);
    }

    public function transaction_list(Account $account, Request $request)
    {
        try {
            $idempotency_key = $request->header('Idempotency-Key');
            $response = $idempotency_key && Cache::get($idempotency_key) ? Cache::get($idempotency_key) : AccountResource::make($account);
            if ($idempotency_key) {
                Cache::put($idempotency_key, $response);
            }
            $this->except();
        } catch (\Exception $e) {
            $this->logsService->send('error', $e->getMessage() . " path=" . $request->getRequestUri(), $e->getCode());
            return response(["message" => $e->getMessage()], $e->getCode() >= 200 && $e->getCode() <= 500 ? $e->getCode() : 400);
        }
        $this->logsService->send('info', "path=" . $request->getRequestUri(), 200);
        return response($response, 200);
    }

    public function transaction(Transaction $transaction, Request $request)
    {
        try {
            $idempotency_key = $request->header('Idempotency-Key');
            $response = $idempotency_key && Cache::get($idempotency_key) ? Cache::get($idempotency_key) : TransactionResource::make($transaction);
            if ($idempotency_key) {
                Cache::put($idempotency_key, $response);
            }
            $this->except();
        } catch (\Exception $e) {
            $this->logsService->send('error', $e->getMessage() . " path=" . $request->getRequestUri(), $e->getCode());
            return response(["message" => $e->getMessage()], $e->getCode() >= 200 && $e->getCode() <= 500 ? $e->getCode() : 400);
        }
        $this->logsService->send('info', "path=" . $request->getRequestUri(), 200);
        return response($response, 200);
    }

    public function replenish(ReplenishRequest $request, Account $account)
    {
        try {
            $idempotency_key = $request->header('Idempotency-Key');
            if ($idempotency_key && Cache::get($idempotency_key)) {
                $response = Cache::get($idempotency_key);
            } else {
                $data = $request->all();
                $account->replenish($data['amount'], $data['add_info']);
                $service = new FirebaseService();
                $service->sendNotification($request, $account->id);
                $response = ['message' => 'Success'];
            }
            if ($idempotency_key) {
                Cache::put($idempotency_key, $response);
            }
            $this->except();
        } catch (\Exception $e) {
            $this->logsService->send('error', $e->getMessage() . " path=" . $request->getRequestUri(), $e->getCode());
            return response(["message" => $e->getMessage()], $e->getCode() >= 200 && $e->getCode() <= 500 ? $e->getCode() : 400);
        }
        $this->logsService->send('info', "path=" . $request->getRequestUri(), 200);
        return response($response, 200);
    }

    public function debit(DebitRequest $request, Account $account)
    {
        try {
            $idempotency_key = $request->header('Idempotency-Key');
            if ($idempotency_key && Cache::get($idempotency_key)) {
                $response = Cache::get($idempotency_key);
            } else {
                $data = $request->all();
                $account->debit($data['amount'], $data['add_info']);
                $service = new FirebaseService();
                $service->sendNotification($request, $account->id);
                $response = ['message' => 'Success'];
            }
            if ($idempotency_key) {
                Cache::put($idempotency_key, $response);
            }
            $this->except();
        } catch (\Exception $e) {
            $this->logsService->send('error', $e->getMessage() . " path=" . $request->getRequestUri(), $e->getCode());
            return response(["message" => $e->getMessage()], $e->getCode() >= 200 && $e->getCode() <= 500 ? $e->getCode() : 400);
        }
        $this->logsService->send('info', "path=" . $request->getRequestUri(), 200);
        return response($response, 200);
    }

    public function transfer(TransferRequest $request, Account $account)
    {
        try {
            $idempotency_key = $request->header('Idempotency-Key');
            if ($idempotency_key && Cache::get($idempotency_key)) {
                $response = Cache::get($idempotency_key);
            } else {
                $data = $request->all();
                $account->transfer($data['amount'], $data['recipient_account'], $data['add_info']);
                $response = ['message' => 'Success'];
            }
            if ($idempotency_key) {
                Cache::put($idempotency_key, $response);
            }
            $this->except();
        } catch (\Exception $e) {
            $this->logsService->send('error', $e->getMessage() . " path=" . $request->getRequestUri(), $e->getCode());
            return response(["message" => $e->getMessage()], $e->getCode() >= 200 && $e->getCode() <= 500 ? $e->getCode() : 400);
        }
        $this->logsService->send('info', "path=" . $request->getRequestUri(), 200);
        return response($response, 200);
    }

    public function get_master(Request $request)
    {
        try {
            $idempotency_key = $request->header('Idempotency-Key');
            $type = AccountType::query()->where('slug', 'master')->first();
            $accounts = $type->accounts;
            $response = $idempotency_key && Cache::get($idempotency_key) ? Cache::get($idempotency_key) : AccountShortResource::collection($accounts);
            if ($idempotency_key) {
                Cache::put($idempotency_key, $response);
            }
            $this->except();
        } catch (\Exception $e) {
            $this->logsService->send('error', $e->getMessage() . " path=" . $request->getRequestUri(), $e->getCode());
            return response(["message" => $e->getMessage()], $e->getCode() >= 200 && $e->getCode() <= 500 ? $e->getCode() : 400);
        }
        $this->logsService->send('info', "path=" . $request->getRequestUri(), 200);
        return response($response, 200);
    }
}
