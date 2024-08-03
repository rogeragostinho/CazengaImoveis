<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioImovel extends Model
{
    use HasFactory;

    protected $table = 'usuarios_imoveis';

    protected $fillable = [
        'id_usuario',
        'id_imovel'
    ];
}
