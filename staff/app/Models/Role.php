<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_id',
        'role_id',
    ];

    public function staff()
    {
        return $this->hasMany(Staff::class);
    }

}
