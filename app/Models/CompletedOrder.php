<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompletedOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'service_type',
        'size',
        'color',
        'paper_type',
        'paper_density',
        'fabric_type',
        'print_type',
        'quantity',
        'price',
        'status',
    ];

    // Связь с пользователем
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
