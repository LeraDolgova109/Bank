<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ban extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_id',
        'reason',
        'end_time',
    ];

    public function staff()
    {
        return $this->hasOne(Staff::class);
    }
}
