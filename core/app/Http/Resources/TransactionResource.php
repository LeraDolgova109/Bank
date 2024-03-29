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
            'account_id' => $this->account_id,
            'type' => $this->type,
            'status' => $this->status,
            'amount' => $this->amount,
            'add_info' => $this->add_info,
            'success_datetime' => $this->success_datetime,
            'created_at' => $this->created_at
        ];
    }
}
