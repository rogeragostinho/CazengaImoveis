<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'data',
        // INFORMAÇÕES CLIENTE
        'cliente_nome',
        'cliente_telefone',
        'cliente_email',
        'cliente_morada',
        // FOREIGN
        'imovel_id',
        'user_id',
    ];

    protected $attributes = [
        // INFORMAÇÕES CLIENTE
        'cliente_email' => null,
        'cliente_morada' => null,
        // FOREIGN
        'user_id' => null,
    ];
}
