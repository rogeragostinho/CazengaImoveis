<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\AgendamentoRequest;
use App\Models\Agendamento;

class AgendamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $agendamentos = Agendamento::all();
        return view('admin.agendamentos.index', compact('agendamentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.agendamentos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AgendamentoRequest $request)
    {
        //
        try {
            //code...
            Agendamento::create($request->all());
            return redirect()->route('admin.agendamentos.index')->with('sucesso', 'Agendamento criado');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('erro', 'Ocorreu um erro interno');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $agendamento = Agendamento::find($id);
        return view('admin.agendamentos.show', compact('agendamento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $agendamento = Agendamento::find($id);
        return view('admin.agendamentos.edit', compact('agendamento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AgendamentoRequest $request, string $id)
    {
        //
        Agendamento::find($id)->update($request->all());
        return redirect()->route('admin.agendamentos.show', $id)->with('sucesso', 'Agendamento atualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Agendamento::find($id)->delete();
        return redirect()->route('admin.agendamentos.index')->with('sucesso', 'Agendamento eliminado');
    }
}
