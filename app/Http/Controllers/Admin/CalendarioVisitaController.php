<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\CalendarioVisitaRequest;
use App\Models\CalendarioVisita;
use Illuminate\Http\Request;

class CalendarioVisitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $visitas = CalendarioVisita::all();
        return view('admin.visitas.index', compact('visitas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.visitas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CalendarioVisitaRequest $request)
    {
        //
        CalendarioVisita::create($request->all());
        return redirect()->route('admin.visitas.index')->with('sucesso', 'horário criado');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $visita = CalendarioVisita::find($id);
        return view('admin.visitas.show', compact('visita'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $visita = CalendarioVisita::find($id);
        return view('admin.visitas.edit', compact('visita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CalendarioVisitaRequest $request, string $id)
    {
        //
        CalendarioVisita::find($id)->update($request->all());
        return redirect()->route('admin.visitas.index')->with('sucesso', 'horário atualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        CalendarioVisita::find($id)->delete();
        return redirect()->route('admin.visitas.index')->with('sucesso', 'horário eliminado');
    }

    // OUTRAS FUNÇÕES

    public function cliente($id, Request $request)
    {
        $request->validate([
            'cliente_nome' => 'required',
            'cliente_telefone' => 'required'
        ], [
            'cliente_nome.required' => 'Um nome do cliente é obrigatório',
            'cliente_telefone.required' => 'Um telefone do cliente é obrigatório',
        ]);
        CalendarioVisita::find($id)->update($request->all());
        return redirect()->back()->with('sucesso', 'horário atualizado');
    }
}
