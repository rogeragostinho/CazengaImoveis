<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Imovel extends Model
{
    use HasFactory;

    protected $table = 'imoveis';

    protected $fillable = [
        //OUTRO
        'status',
        //DADOS IMOVEL
        'condicao',
        'contrato',
        'tipo',
        'bairro',
        'rua',
        'n_casa',
        'dimensao',
        'descricao',
        'n_quartos',
        'preco',
        //DADOS DONO
        'dono_nome',
        'dono_telefone',
        'dono_whatsapp',
        'dono_email',
        //COMISSÕES
        'comissao_imobiliaria',
        'comissao_corretor',
        // FOREIGN
        'user_id'
    ];

    protected $attributes = [
        'status' => 'pendente',
        //DADOS IMÓVEL
        'condicao' => null,
        'n_casa' => null,
        'dimensao' => null,
        'descricao' => null,
        'n_quartos' => null,
        //DADOS DONO
        'dono_whatsapp' => null,
        'dono_email' => null,
        'dono_morada' => null
    ];

    public function imagens(): HasMany
    {
        return $this->hasMany(Imagem::class, 'id_imovel');
    }
}
