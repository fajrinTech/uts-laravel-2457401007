<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'price',
        'cook_minutes',
        'added_at',
        'is_spicy',
        'is_best_seller',
        'description',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'cook_minutes' => 'integer',
        'added_at' => 'date',
        'is_spicy' => 'boolean',
        'is_best_seller' => 'boolean',
    ];
}
