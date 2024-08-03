<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Mensagem;
use App\Models\Movimento;
use Illuminate\Http\Request;

class MensagemController extends Controller
{
    protected $mensagem;
    protected $movimento;
    public function __construct(Mensagem $mensagem, Movimento $movimento)
    {
        $this->mensagem = $mensagem;
        $this->movimento = $movimento;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mensagens = Mensagem::orderBy('created_at', 'desc')->get();

        return view('admin.mensagens.index', compact('mensagens'));
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
        $request->validate([
            'email' => 'required',
            'assunto' => 'required',
            'conteudo' => 'required'
        ],[
            'email.required' => 'Precisa informar o seu email',
            'assunto.required' => 'Precisa adicionar um assunto',
            'conteudo.required' => 'A mensagem deve ter um conteudo'
        ]);

        $this->mensagem->create($request->all());
        return redirect()->back()->with('sucesso', 'Mensagem enviada com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mensagem = $this->mensagem->find($id);
        if ($mensagem == null) {
            return redirect()->route('mensagens.index')->with('erro', 'Mensagem inexistente');
        }
        return view('admin.mensagens.show', compact('mensagem'));
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
        $this->mensagem->find($id)->delete();
        $this->movimento->create(['id_usuario' => auth()->user()->id,'descricao' => ' excluiu uma mensagem']);

        return redirect()->route('admin.mensagens.index')->with('sucesso', 'Mensagem excluída com sucesso');
    }
}
