<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Http;

class Currency extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'name',
        'description',
    ];

    public function accounts(): HasMany
    {
        return $this->hasMany(Account::class);
    }

    public function rate()
    {
        $response = Http::get('https://cdn.jsdelivr.net/npm/@fawazahmed0/currency-api@latest/v1/currencies/' . $this->slug . '.json')->json();
        return $response[$this->slug][env('BASE_CURRENCY', 'rub')];
    }
}
