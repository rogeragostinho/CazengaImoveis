<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $usuarios = User::orderBy('created_at', 'desc')->get();
        $tipo = 'Todos';

        return view('admin.usuarios.index', compact('usuarios', 'tipo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.usuarios.create',);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->ValidarUsuario($request, 'cadastro');

        $usuario = User::create($request->all());

        //$this->DefinirPermissoesIniciais($usuario->id);

        return redirect()->route('admin.usuarios.index')->with('sucesso', 'Usuário cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $usuario = User::find($id);
        return view('admin.usuarios.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $usuario = User::find($id);
        if ($usuario == null) {
            return redirect()->route('usuarios.index')->with('erro', 'Usuário inexistente');
        }
        return view('admin.usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $this->ValidarUsuario($request, 'edicao');

        $usuario = $request->all();

        User::find($id)->update($usuario);

        return redirect()->route('admin.usuarios.index')->with('sucesso', 'Dados alterados com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        //
        $n = User::all()->count();
        if (isset($request->confirmation) && $n > 1) {
            if ($request->confirmation == 'on') {
                User::find($id)->delete();
                return redirect()->route('admin.usuarios.index');
            }
        } else {
            return back()->with('erro', 'Ocorreu um erro ao excluir a sua conta');
        }
    }

    //PAGINAS
    public function PaginaUsuariosAdministradores()
    {
        $usuarios = User::orderBy('created_at', 'desc')->where('tipo', 'admin')->get();
        ~$tipo = 'Administradores';

        return view('admin.usuarios.index', compact('usuarios', 'tipo'));
    }

    public function intermediarios(){
        $usuarios = User::orderBy('created_at', 'desc')->where('tipo', 'intermediario')->get();
        $tipo = 'Intermediários';

        return view('admin.usuarios.index', compact('usuarios', 'tipo'));
    }

    public function PaginaUsuariosNormais()
    {
        $usuarios = User::orderBy('created_at', 'desc')->where('tipo', 'normal')->get();
        $tipo = 'Normais';

        return view('admin.usuarios.index', compact('usuarios', 'tipo'));
    }

    public function PaginaPermissoesUsuario($id)
    {

        $usuario = User::find($id);
        if ($usuario == null) {
            return redirect()->route('admin.paginaUsuarios')->with('erro', 'Usuário inexistente');
        }
        return view('admin.usuarios.permissoes', compact('usuario'));
    }

    //OUTRAS FUNÇÕES

    public function ativar(Request $request)
    {
        User::find($request->id)->update(['estado' => 'ativo']);

        return redirect()->back()->with('sucesso', 'Conta ativada com sucesso');
    }

    public function desativar(Request $request)
    {
        User::find($request->id)->update(['estado' => 'pendente']);

        return redirect()->back()->with('sucesso', 'Conta desativada com sucesso');
    }
    //Validação
    private function ValidarUsuario($request, $tipo)
    {
        if ($tipo == 'edicao') {
            $request->validate([
                'primeiroNome' => 'required',
                'sobrenome' => 'required',
                'email' => 'email|required',
            ], [
                'primeiroNome.required' => 'O campo Primeiro nome é obrigatório',
                'sobrenome.required' => 'O campo Sobrenome é obrigatório',
                'email.email' => 'O email digitado não é um email válido',
                'email.required' => 'O campo email é obrigatório',
            ]);
        } else {
            $request->validate([
                'primeiroNome' => 'required',
                'sobrenome' => 'required',
                'email' => 'email|required',
                'password' => 'required'
            ], [
                'primeiroNome.required' => 'O campo Primeiro nome é obrigatório',
                'sobrenome.required' => 'O campo Sobrenome é obrigatório',
                'email.email' => 'O email digitado não é um email válido',
                'email.required' => 'O campo email é obrigatório',
                'password.required' => 'O campo senha é obrigatório',
            ]);
        }
    }
}
