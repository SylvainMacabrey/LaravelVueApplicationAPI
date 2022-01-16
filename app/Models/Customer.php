<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $casts = [
        'isFavorite' => 'boolean'
    ];

    protected $fillable = ['name', 'telephone', 'isFavorite'];
}
