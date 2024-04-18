<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
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
            'account_id' => $this->account_id,
            'type' => $this->type,
            'status' => $this->status,
            'amount' => bcdiv($this->amount / 100, 1, 2),
            'add_info' => $this->add_info,
            'success_datetime' => $this->success_datetime,
            'created_at' => $this->created_at
        ];
    }
}
