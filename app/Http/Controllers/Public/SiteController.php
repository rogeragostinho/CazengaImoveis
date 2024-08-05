<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Imovel;
use App\Models\Site;
use App\Models\TipoImovel;

class SiteController extends Controller
{
    //
    public function index()
    {
        $imoveis = Imovel::where('status', 'ativo')
            ->select('id', 'tipo', 'contrato', 'preco')
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();
        $selected = "todos";
        $tipos = TipoImovel::all();
        return view('public.index', compact('imoveis', 'tipos', 'selected'));
    }

    public function sobre()
    {
        $config = Site::find(1);
        return view('public.paginas.sobre', compact('config'));
    }

    //Intermediarios
    public function PaginaIntermediarioDetalhesImovel($id_intermediario, $id_imovel)
    {
        $imovel = Imovel::find($id_imovel);
        /*UsuarioImovel::create([
            'id_usuario' => $id_intermediario,
            'id_imovel' => $id_imovel
        ]);*/

        return view('public.imoveis.show', compact('imovel', 'id_intermediario'));
    }
}
