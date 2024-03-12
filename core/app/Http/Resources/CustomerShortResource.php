<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerShortResource extends JsonResource
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
            'user_id' => $this->user_id,
            'is_banned' => $this->is_banned,
            'accounts_count' => [
                'debit' => $this->accounts()->whereHas('type', function($q){
                    $q->where('slug', 'debit');
                })->count(),
                'credit' => $this->accounts()->whereHas('type', function($q){
                    $q->where('slug', 'credit');
                })->count(),
                'all' => $this->accounts()->count(),
            ],
            'created_at' => $this->created_at,
        ];
    }
}
