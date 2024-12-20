<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_usuario',
        'telefone1',
        'telefone2',
        'whatsapp'
    ];
}
