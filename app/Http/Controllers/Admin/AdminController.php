<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Imovel;
use App\Models\Mensagem;
use App\Models\User;
use App\Models\UsuarioImovel;
use Exception;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    protected $caminho = '';
    public function __construct()
    {
        //$this->middleware('checkadmin');
    }
    public function index()
    {
        $nomesMeses = array(
            1 => "'Janeiro'",
            2 => "'Fevereiro'",
            3 => "'Março'",
            4 => "'Abril'",
            5 => "'Maio'",
            6 => "'Junho'",
            7 => "'Julho'",
            8 => "'Agosto'",
            9 => "'Setembro'",
            10 => "'Outubro'",
            11 => "'Novembro'",
            12 => "'Dezembro'"
        );

        $totImoveis = Imovel::all()->count();
        $totUsuarios = User::all()->count();

        $usuarios_imoveis = UsuarioImovel::select('id_usuario')
        ->distinct()
        ->orderBy('id_usuario', 'asc')
        ->get();

        $feedback = Mensagem::all()->count();
        //dd($usuarios_imoveis);

        $links = [];
        foreach ($usuarios_imoveis as $ui) {
            $intermediario = User::select('name')->where('id', $ui->id_usuario)->first();
            $n =UsuarioImovel::select('id_imovel')->where('id_usuario', $ui->id_usuario)->get();
            $imoveis = UsuarioImovel::select('id_imovel')->where('id_usuario', $ui->id_usuario)->distinct()->get();
            $links[] = [
                'nome' => $intermediario->primeiroNome,
                'n' => count($n),
                'imoveis' => $imoveis
            ];
        }
        rsort($links);
//dd($links);
        try {
            //Usuario por mes
            $usuariosData = User::select([
                DB::raw('MONTH(created_at) as mes'),
                DB::raw('COUNT(*) as total')
            ])->groupBy('mes')
                ->orderBy('mes', 'asc')
                ->get();

            foreach ($usuariosData as $usuario) {
                $nMeses[] = $usuario->mes;
                $total[] = $usuario->total;
            }

            foreach ($nMeses as $nMes) {
                $nomeMes[] = $nomesMeses[$nMes];
            }
            $labelMes = implode(',', $nomeMes);
            $labelTotal = implode(',', $total);
            $max = max($total);

            //Imoveis por mes
            $imoveisPorMes = Imovel::select([
                DB::raw('MONTH(created_at) as mes'),
                DB::raw('COUNT(*) as total')
            ])->groupBy('mes')
                ->orderBy('mes', 'asc')
                ->get();

            foreach ($imoveisPorMes as $imovel) {
                $nImoveisMeses[] = $imovel->mes;
                $totalImoveis[] = $imovel->total;
            }
            foreach ($nImoveisMeses as $nMes) {
                $nomeImovelMes[] = $nomesMeses[$nMes];
            }

            $labelImovelMes = implode(',', $nomeImovelMes);
            $labelTotalImoveis = implode(',', $totalImoveis);
            $maxImovel = max($totalImoveis);

            //Imoveis por tipo/
            $imoveisData = Imovel::select([
                DB::raw('tipo as tipo'),
                DB::raw('COUNT(*) as total')
            ])->groupBy('tipo')
                ->orderBy('tipo', 'asc')
                ->get();

            foreach ($imoveisData as $imovel) {
                $tipos[] = "'" . $imovel->tipo . "'";
                $totalI[] = $imovel->total;
            }

            $labelTipo = implode(',', $tipos);
            $labelTotalI = implode(',', $totalI);
            $maxI = max($totalI);

            return view('admin.index', [
                'labelMes' => $labelMes,
                'labelTotal' => $labelTotal,
                'max' => $max,
                'labelTipo' => $labelTipo,
                'labelTotalI' => $labelTotalI,
                'maxI' => $maxI,
                'labelImovelMes' => $labelImovelMes,
                'labelTotalImoveis' => $labelTotalImoveis,
                'maxImovel' => $maxImovel,
                'totImoveis' => $totImoveis,
                'totUsuarios' => $totUsuarios,
                'links' => $links,
                'feedback' => $feedback
            ]);
        } catch (Exception $e) {
            return view('admin.index', [
                'labelMes' => ' ',
                'labelTotal' => '0',
                'max' => '0',
                'labelTipo' => ' ',
                'labelTotalI' => ' ',
                'maxI' => '0',
                'labelImovelMes' => ' ',
                'labelTotalImoveis' => ' ',
                'maxImovel' => '0',
                'totImoveis' => $totImoveis,
                'totUsuarios' => $totUsuarios,
                'links' => $links,
                'feedback' => $feedback
            ]);
        }
    }
}
