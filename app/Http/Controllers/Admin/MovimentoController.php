<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movimento;
use Illuminate\Http\Request;

class MovimentoController extends Controller
{
    protected $movimento;
    public function __construct(Movimento $movimento)
    {
        $this->movimento = $movimento;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movimentos = $this->movimento->orderBy('created_at', 'desc')->get();

        return view('admin.movimentos.index', compact('movimentos'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->movimento->find($id)->delete();

        return back()->with('sucesso', 'Movimento excluído com sucesso');
    }
}
