<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class TransferRequest extends FormRequest
{
    protected function passedValidation()
    {
        $this->replace([
            'amount' => (int)($this->amount * 100),
            'add_info' => $this->add_info,
            'recipient_account' => $this->recipient_account,
        ]);
    }

    public function rules(): array
    {
        return [
            'amount' => 'required|numeric',
            'add_info' => 'nullable|string',
            'recipient_account' => 'required|exists:accounts,id',
        ];
    }
}
