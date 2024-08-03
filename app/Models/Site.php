<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    protected $table = 'site';

    protected $fillable = [
        'nome',
        'sobre',
        'telefone1',
        'telefone2',
        'whatsapp',
        'facebook',
        'instagram',
        'servicos',
        'objetivo',
        'valores',
        'visao',
        'missao'
    ];
}
