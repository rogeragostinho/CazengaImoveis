<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Movimento;
use App\Models\Site;
use Illuminate\Http\Request;

class ConfiguracaoController extends Controller
{
    private $site;
    private $movimento;
    public function __construct(Site $site, Movimento $movimento)
    {
        $this->site = $site;
        $this->movimento = $movimento;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $configuracao = $this->site::find(1);

        return view('admin.configuracoes.index', compact('configuracao'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->site->find($id)->update($request->all());
        
        $this->movimento->create([
            'id_usuario' => auth()->user()->id,
            'descricao' => ' alterou as configuurações do sistema'
        ]);

        return redirect()->route('admin.configuracoes.index')->with('sucesso', 'Configurações salvas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
