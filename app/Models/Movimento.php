<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimento extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_usuario',
        'descricao'
    ];

    public function Usuario(){
        return $this->belongsTo(User::class, 'id_usuario', 'id');
    }
}
