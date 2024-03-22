<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoanRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'amount' => (int)($this->amount*100),
        ]);
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'customer_id' => 'required|string',
            'rate_id' => 'required|exists:rates,id',
            'amount' => 'required|numeric',
            'status' => 'nullable|string',
            'issue_date' => 'nullable|date',
            'close_date' => 'nullable|date',
            'issuance_account' => 'nullable|string',
            'repayment_account' => 'nullable|string',
            'term' => 'required|integer'
        ];
    }
}
