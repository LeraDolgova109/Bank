<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'customer_id' => $this->customer_id,
            'amount' => $this->amount,
            'status' => $this->status,
            'issue_date' => $this->issue_date,
            'close_date' => $this->close_date,
            'issuance_account' => $this->issuance_account,
            'repayment_account' => $this->repayment_account,
            'term' => $this->term,
            'min_payment' => $this->min_payment,
            'debt_amount' => $this->amount,//ToDo fix
            'rate' => RateResource::make($this->rate),
            'payments' => [
                [
                    'transaction_id' => 123,
                    'amount' => 3450,
                    'status' => 'expired',
                    'date' => '2024-04-18'
                ],
                [
                    'transaction_id' => 148,
                    'amount' => 3450,
                    'status' => 'success',
                    'date' => '2024-04-18'
                ],
            ],
        ];
    }
}
