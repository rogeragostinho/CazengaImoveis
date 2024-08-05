<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class IntermediarioController extends Controller
{
    //
    public function create()
    {
        return view('public.intermediarios.cadastro');
    }
    public function store(Request $request)
    {
        $this->ValidarUsuario($request, 'cadastro');

        $request['tipo'] = 'intermediario';
        $request['estado'] = 'pendente';
        User::create($request->all());

        return redirect()->route('index')->with('sucesso', 'As suas informações foram enviadas');
    }
    private function ValidarUsuario($request, $tipo)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'email|required',
            'telefone' => 'required',
            'password' => 'required'
        ], [
            'name.required' => 'O campo nome é obrigatório',
            'email.email' => 'O email digitado não é um email válido',
            'email.required' => 'O campo email é obrigatório',
            'email.required' => 'O campo telefone é obrigatório',
            'password.required' => 'O campo senha é obrigatório',
        ]);
    }
}
