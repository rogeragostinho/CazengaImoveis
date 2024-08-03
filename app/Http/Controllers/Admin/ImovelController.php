<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Imagem;
use App\Models\Imovel;
use App\Models\Movimento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;

class ImovelController extends Controller
{
    protected $imovel;
    protected $movimento;
    protected $imagem;
    public function __construct(Imovel $imovel, Imagem $imagem, Movimento $movimento)
    {
        $this->imovel = $imovel;
        $this->movimento = $movimento;
        $this->imagem = $imagem;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $imoveis = $this->imovel->orderBy('created_at', 'desc')->paginate(9);
        $estado = 'Todos';
        return view('admin.imoveis.index', compact('imoveis', 'estado'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.imoveis.create', ['status' => 'ativo']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->ValidarImovel($request, 'cadastro');

        $imovel = $request->all();
        $imovel['preco'] = abs($imovel['preco']);
        $imovel['user_id'] = auth()->user()->id;
        $id = $this->imovel->create($imovel);

        for ($i = 1; $i < 6; $i++) {
            if ($request['imagem' . $i]) {
                $this->CadastrarImagem($id->id, $request['imagem' . $i]);
            }
        }

        if (auth()->check()) {
            Movimento::create(['id_usuario' => auth()->user()->id, 'descricao' => ' cadastrou um novo imóvel']);
        }


        return redirect()->route('admin.imoveis.index')->with('sucesso', 'Imóvel cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $imovel = $this->imovel->where('id', $id)->first();
        if ($imovel == null) {
            return redirect()->route('admin.imoveis.index')->with('erro', 'Imóvel inexistente');
        }
        return view('admin.imoveis.show', compact('imovel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $imovel = $this->imovel->find($id);
        if ($imovel == null) {
            return redirect()->route('admin.imoveis.index')->with('erro', 'Imóvel inexistente');
        }
        return view('admin.imoveis.edit', compact('imovel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $this->ValidarImovel($request, 'edicao');
        //$this->PreencherCamposVazios($request);

        for ($i = 1; $i < 6; $i++) {
            if ($request['imagem' . $i]) {
                if ($request['id_imagem' . $i]) {
                    $this->EditarImagem($request['id_imagem' . $i], $request['imagem' . $i]);
                } else {
                    $this->CadastrarImagem($id, $request['imagem' . $i]);
                }
            }
        }
        $request['preco'] = abs($request['preco']);
        $this->imovel->find($id)->update($request->all());
        Movimento::create(['id_usuario' => auth()->user()->id, 'descricao' => ' editou as informações de um imóvel']);

        return redirect()->route('admin.imoveis.show', $id)->with('sucesso', 'Imóvel editado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $this->imovel->find($id)->delete();
        $imagens = Imagem::where('id_imovel', $id)->get();

        foreach ($imagens as $imagem) {
            dd($imagem->url);
            Storage::disk('public')->delete($imagem->url);
            $imagem->delete();
        }

        Movimento::create(['id_usuario' => auth()->user()->id, 'descricao' => ' excluiu um imóvel']);

        return redirect()->route('admin.imoveis.index')->with('sucesso', 'Imóvel excluido com sucesso');
    }

    //Pagina
    public function ativos()
    {
        $imoveis = $this->imovel->orderBy('created_at', 'desc')->where('status', 'ativo')->paginate(12);
        $estado = 'Ativos';
        return view('admin.imoveis.index', compact('imoveis', 'estado'));
    }

    public function pendentes()
    {
        $imoveis = $this->imovel->orderBy('created_at', 'desc')->where('status', 'pendente')->paginate(12);
        $estado = 'Pendentes';
        return view('admin.imoveis.index', compact('imoveis', 'estado'));
    }

    //OUTRAS FUNÇÕES
    public function ativar(Request $request)
    {
        $this->imovel->find($request->id)->update(['status' => 'ativo']);

        return redirect()->back()->with('sucesso', 'Estado alterado para ativo com sucesso');
    }

    public function desativar(Request $request)
    {
        $this->imovel->find($request->id)->update(['status' => 'pendente']);

        return redirect()->back()->with('sucesso', 'Estado alterado para pendente com sucesso');
    }
    public function comissao(String $id, Request $request){
        Imovel::find($id)->update($request->all());

        return redirect()->route('admin.imoveis.show', $id)->with('sucesso', 'Comissão atualizada');
    }
    //Imagens
    private function CadastrarImagem($id, $imagem)
    {
        Imagem::create([
            'id_imovel' => $id,
            'url' => $imagem->store('imoveis')
        ]);
    }

    private function EditarImagem($id, $imagem)
    {
        Imagem::find($id)->update(['url' => $imagem->store('imoveis')]);
    }

    //Validação
    private function ValidarImovel(Request $request, $tipo)
    {
        if ($tipo == 'edicao') {
            $campos = [
                'contrato' => 'required',
                'tipo' => 'required',
                'bairro' => 'required',
                'rua' => 'required',
                'preco' => 'required',
                'dono_nome' => 'required',
                'dono_telefone' => 'required',
            ];
        } else {
            $campos = [
                'contrato' => 'required',
                'tipo' => 'required',
                'bairro' => 'required',
                'rua' => 'required',
                'preco' => 'required',
                'dono_nome' => 'required',
                'dono_telefone' => 'required',
                'imagem1' => ['required', File::image()],
                'imagem2' => File::image(),
                'imagem3' => File::image(),
                'imagem4' => File::image(),
                'imagem5' => File::image(),
            ];
        }
        $request->validate($campos, [
            'contrato.required' => 'O campo contrato é obrigatório',
            'tipo.required' => 'O campo tipo é obrigatório',
            'bairro.required' => 'O campo bairro é obrigatório',
            'rua.required' => 'O campo rua é obrigatório',
            'preco.required' => 'O campo preço é obrigatório',
            'dono_nome.required' => 'O campo Nome do dono é obrigatório',
            'dono_telefone.required' => 'O campo telefone é obrigatório',
            'imagem1.required' => 'A primeira imagem é obrigatória',
            'imagem1' => 'O ficheiro precisa ser uma imagem',
            'imagem2' => 'O ficheiro precisa ser uma imagem',
            'imagem3' => 'O ficheiro precisa ser uma imagem',
            'imagem4' => 'O ficheiro precisa ser uma imagem',
            'imagem5' => 'O ficheiro precisa ser uma imagem',
        ]);
    }
}
