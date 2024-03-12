<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = "staffs";
    protected $fillable = [
        'user_id',
        'role_id',
        'is_banned',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function ban()
    {
        return $this->hasOne(Ban::class);
    }
}
