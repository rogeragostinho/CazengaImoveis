<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movimento;
use App\Models\TipoImovel;
use Illuminate\Http\Request;

class TipoImovelController extends Controller
{
    private $tipo;
    private $movimento;
    public function __construct(TipoImovel $tipo, Movimento $movimento)
    {
        $this->tipo = $tipo;
        $this->movimento = $movimento;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipos = $this->tipo->select('id', 'nome')->orderBy('created_at', 'desc')->get();

        return view('admin.imoveis.tipos.index', compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.imoveis.tipos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->ValidarTipoImovel($request);

        $this->tipo->create($request->all());
        $this->movimento->create(['id_usuario' => auth()->user()->id, 'descricao' => ' adicionou um novo tipo de imóvel']);

        return redirect()->route('admin.tipos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tipo = $this->tipo->find($id);
        if ($tipo == null) {
            return redirect()->route('admin.tipos.index')->with('erro', 'Tipo de imóvel inexistente');
        }
        return view('admin.imoveis.tipos.edit', compact('tipo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->ValidarTipoImovel($request);

        $this->tipo->find($id)->update($request->all());
        $this->movimento->create(['id_usuario' => auth()->user()->id, 'descricao' => ' editou as informações de um tipo de imóvel']);

        return redirect()->route('admin.tipos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->tipo->find($id)->delete();
        $this->movimento->create(['id_usuario' => auth()->user()->id, 'descricao' => ' excluiu um tipo de imóvel']);

        return redirect()->route('admin.tipos.index');
    }

    // #########################
    private function ValidarTipoImovel(Request $request)
    {
        $request->validate([
            'nome' => 'required'
        ], [
            'nome.required' => 'O campo nome é obrigatório'
        ]);
    }
}


