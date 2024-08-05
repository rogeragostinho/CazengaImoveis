<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Agendamento;
use App\Models\CalendarioVisita;
use Illuminate\Http\Request;

class AgendamentoController extends Controller
{
    //
    public function calendario(Request $request){
        $request->validate([
            'imovel_id' => 'required',
        ]);

        $user_id = $request->user_id;

        $imovel_id = $request->imovel_id;
        $visitas = CalendarioVisita::where('status','disponivel')->get();
        $eventos = [];

        foreach($visitas as $visita){
            $eventos[] = [
                'chave' => $visita->id,
                'title' => 'Data disponível',
                'start' => $visita->data_inicio,
                'end' => $visita->data_fim
            ];
        }

        return view('public.agendamento.calendario', compact('eventos','imovel_id', 'user_id'));
    }

    public function dados(Request $request){
        $data = $request->data;
        return view('public.agendamento.dados', compact('data'));
    }

    public function agendar(Request $request){
        /*$request->validate([
            'imovel_id' => 'required',
            'data' => 'required',
            'cliente_nome' => 'required',
            'cliente_telefone' => 'required',
        ],[
            'cliente_nome' => 'Um nome é obrigatório',
            'cliente_telefone' => 'Um telefone é obrigatório'
        ]);*/
        Agendamento::create($request->all());
        return redirect()->route('imoveis.show',$request->imovel_id)->with('sucesso','Agendamento feito para '.$request->data);
    }
}
