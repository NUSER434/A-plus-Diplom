<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SearchItem extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'url']; // Разрешённые для массового присвоения поля
}
