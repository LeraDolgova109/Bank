<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AccountResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'open_date' => $this->open_date,
            'end_date' => $this->end_date,
            'close_date' => $this->close_date,
            'status' => $this->status,
            'type' => $this->type->slug,
            'currency' => $this->currency->slug,
            'balance' => bcdiv($this->balance / 100, 1, 2),
            'transactions' => TransactionResource::collection($this->transactions)
        ];
    }
}
