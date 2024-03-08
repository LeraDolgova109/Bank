<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'roles',
        'is_banned',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles')->withTimestamps();;
    }

    public function active_ban()
    {
        return Ban::query()->where('user_id', $this->id)
            ->where(function ($query) {
                $query->whereDate('end_time', '>=', Carbon::now())
                    ->orWhere('end_time', null);
            })->first();
    }
}
