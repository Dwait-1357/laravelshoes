<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'items',
    ];

    protected $casts = [
        'items' => 'array', // Cast items to an array
    ];
}
