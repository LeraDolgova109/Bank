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
        'role',
        'is_banned',
    ];

    public function role()
    {
        return $this->belongsToMany(Role::class, 'staff_roles')->withTimestamps();;
    }

    public function ban()
    {
        return $this->belongsTo(Ban::class);
    }
}
