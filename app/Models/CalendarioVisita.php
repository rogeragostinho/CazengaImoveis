<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarioVisita extends Model
{
    use HasFactory;

    protected $fillable = [
        'data_inicio',
        'data_fim',
        'status',
    ];

    protected $attributes = [
        'status' => 'disponivel',
    ];
}
