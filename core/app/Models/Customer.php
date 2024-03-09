<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'is_banned'
    ];

    public function bans(): HasMany
    {
        return $this->hasMany(Ban::class);
    }

    public function accounts(): HasMany
    {
        return $this->hasMany(Account::class);
    }
}
