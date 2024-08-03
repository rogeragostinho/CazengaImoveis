<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permissao extends Model
{
    use HasFactory;
    protected $table = 'permissoes';

    protected $fillable = [
        'id_usuario',
        'tipo',
        'ler',
        'criar',
        'excluir',
        'atualizar',
        'exluir'
    ];

    protected $attributes = [
        'ler' => 'nao',
        'criar' => 'nao',
        'excluir' => 'nao',
        'atualizar' => 'nao',
        'excluir' => 'nao'
    ];
}
