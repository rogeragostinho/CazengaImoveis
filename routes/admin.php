<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AgendamentoController as AdminAgendamentoController;
use App\Http\Controllers\Admin\CalendarioVisitaController as AdminCalendarioVisitaController;
use App\Http\Controllers\Admin\ConfiguracaoController as AdminConfiguracaoController;
use App\Http\Controllers\Admin\ImovelController as AdminImovelController;
use App\Http\Controllers\Admin\MensagemController as AdminMensagemController;
use App\Http\Controllers\Admin\MovimentoController as AdminMovimentoController;
use App\Http\Controllers\Admin\TipoImovelController as AdminTipoImovelController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Middleware\CheckAdmin;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin')->name('admin.')->middleware(['auth', CheckAdmin::class])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');

    /**
     * Imóveis
     */
    Route::post('/imoveis/{id}/comissao', [AdminImovelController::class, 'comissao'])->name('imoveis.comissao');
    Route::controller(AdminImovelController::class)->prefix('imoveis')->group(function () {
        Route::name('imoveis.', function () {
            Route::get('/ativos', 'ativos')->name('ativos');
            Route::get('/pendentes', 'pendentes')->name('pendentes');
            Route::post('/ativar', 'ativar')->name('ativar');
            Route::post('/desativar', 'desativar')->name('desativar');
        });

        // Tipos
        Route::resource('tipos', AdminTipoImovelController::class)->except(['show']);
    });
    Route::resource('imoveis', AdminImovelController::class);

    /**
     * Usuários
     */
    Route::controller(AdminUserController::class)->prefix('usuarios')->name('usuarios.')->group(function () {
        Route::post('/ativar', 'ativar')->name('ativar');
        Route::post('/desativar', 'desativar')->name('desativar');
    });
    Route::controller(AdminUserController::class)->prefix('usuarios')->name('usuarios.')->group(function () {
        Route::get('/intermediarios', 'intermediarios')->name('intermediarios');
    });
    Route::resource('usuarios', AdminUserController::class);

    /**
     * Agendamento visitas
     */
    Route::post('visitas/{id}/cliente', [AdminCalendarioVisitaController::class, 'cliente'])->name('visitas.cliente');
    Route::resource('visitas', AdminCalendarioVisitaController::class);
    Route::resource('agendamentos', AdminAgendamentoController::class);

    /**
     * Configurações
     */
    Route::resource('configuracoes', AdminConfiguracaoController::class)->only(['index', 'update']);

    /**
     * Mensagens
     */
    Route::resource('mensagens', AdminMensagemController::class)->only(['index', 'destroy', 'show', 'store']);

    /**
     * Movimentos
     */
    Route::resource('movimentos', AdminMovimentoController::class)->only(['index', 'destroy']);
});
