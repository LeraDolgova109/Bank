<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RateResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'rate' => $this->rate / 100,
            'start_date' => Carbon::create($this->start_date)->format('d.m.Y'),
            'end_date' => Carbon::create($this->end_date)->format('d.m.Y'),
            'status' => $this->status,
            'count_loans' => $this->loans()->count(),
        ];
    }
}
