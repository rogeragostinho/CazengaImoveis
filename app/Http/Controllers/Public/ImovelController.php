<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Imagem;
use App\Models\Imovel;
use App\Models\TipoImovel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;

class ImovelController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth')->only(['create']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $imoveis = Imovel::where('status', 'ativo')->select('id', 'tipo', 'contrato', 'preco')->paginate(6);
        $selected = "todos";
        $tipos = TipoImovel::all();
        return view('public.imoveis.index', compact('imoveis', 'tipos', 'selected'));
    }

    public function search($contrato, $tipo, $nQuartos, $vMin, $vMax)
    {
        $consulta = [];
        $consulta[] = ['status', 'ativo'];
        if (($contrato != null) && !(empty($contrato)) && ($contrato != 'all')) {
            $consulta[]  = ['contrato', $contrato];
        }
        if (($tipo != null) && !(empty($tipo)) && ($tipo != 'all')) {
            $consulta[]  = ['tipo', $tipo];
        }
        if (($nQuartos != null) && !(empty($nQuartos)) && ($nQuartos != 'all')) {
            $consulta[]  = ['n_quartos', $nQuartos];
        }

        if (($vMax != null) && !(empty($vMax))) {
            $consulta[]  = ['preco', '<=', $vMax];
        }

        if (($vMin != null) && !(empty($vMin))) {
            $consulta[]  = ['preco', '>=', $vMin];
        }

        $TnQuartos = [
            ['valor' => 1],
            ['valor' => 2],
            ['valor' => 3],
            ['valor' => 4],
            ['valor' => 5],
        ];

        if ($vMin > $vMax) {
            return back()->with('erro', 'O preço mínimo deve ser inferior ao preço máximo');
        }

        $imoveis = Imovel::where('status', 'ativo')->select('id', 'tipo', 'contrato', 'preco')->where($consulta)->paginate(6);
        $not = count($imoveis);;
        $tipos = TipoImovel::all();

        return view('public.imoveis.search', [
            'imoveis' => $imoveis,
            'Vcontrato' => $contrato,
            'Vtipo' => $tipo,
            'nQuartos' => $nQuartos,
            'vMin' => $vMin,
            'vMax' => $vMax,
            'TnQuartos' => $TnQuartos,
            'not' => $not,
            'tipos' => $tipos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipos = TipoImovel::all();
        return view('public.imoveis.create', compact('tipos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->ValidarImovel($request, 'cadastro');
        //$this->PreencherCamposVazios($request);

        $imovel = $request->all();
        $imovel['preco'] = abs($imovel['preco']);
        $imovel['user_id'] = auth()->user()->id;
        $id = Imovel::create($imovel);

        for ($i = 1; $i < 6; $i++) {
            if ($request['imagem' . $i]) {
                $this->CadastrarImagem($id->id, $request['imagem' . $i]);
            }
        }

        return redirect()->route('imoveis.index')->with('sucesso', 'Imóvel cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $imovel = Imovel::where('id', $id)->first();
        if ($imovel == null) {
            return redirect()->route('imoveis.index')->with('erro', 'Imóvel inexistente');
        }
        return view('public.imoveis.show', compact('imovel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $imovel = Imovel::find($id);
        $tiposImoveis = TipoImovel::all();
        if ($imovel == null) {
            return redirect()->route('imoveis.index')->with('erro', 'Imóvel inexistente');
        }
        return view('public.imoveis.edit', compact('imovel','tiposImoveis'));
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
        Imovel::find($id)->update($request->all());

        return redirect()->route('imoveis.show', $id)->with('sucesso', 'Imóvel editado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Imovel::find($id)->delete();
        $imagens = Imagem::where('id_imovel', $id)->get();

        foreach ($imagens as $imagem) {
            dd($imagem->url);
            Storage::disk('public')->delete($imagem->url);
            $imagem->delete();
        }

        return redirect()->route('imoveis.index')->with('sucesso', 'Imóvel excluido com sucesso');
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
