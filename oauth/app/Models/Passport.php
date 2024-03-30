<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passport extends Model
{
    use HasFactory;
    protected $fillable = [
        'series',
        'number',
        'unitcode',
        'issue_date',
        'issue_place',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
