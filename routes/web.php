<?php

use App\Http\Controllers\Public\AgendamentoController;
use App\Http\Controllers\Public\ImovelController;
use App\Http\Controllers\Public\IntermediarioController;
use App\Http\Controllers\Public\MensagemController;
use App\Http\Controllers\Public\SiteController;
use App\Http\Controllers\Public\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::controller(SiteController::class)->group(function () {
    Route::get('/', 'index')->name('index');

    Route::name('site.')->group(function () {
        Route::get('/sobre', 'sobre')->name('sobre');
    });
});

Route::get('/user/imoveis', [UserController::class, 'imoveis'])->name('users.imoveis');
Route::get('/user/imoveis/{id}', [UserController::class, 'show'])->name('users.show');
Route::get('user/links', [UserController::class, 'links'])->name('users.links');

Route::get('/search/{contrato}/{tipo}/{nQuartos}/{vMin}/{vMax}', [ImovelController::class, 'search'])->name('search');
Route::resource('imoveis', ImovelController::class);

Route::middleware('auth')->group(function () {
    Route::resource('intermediarios', IntermediarioController::class);
});

Route::get('intermediario/{id_intermediario}/detalhes/{id_imovel}', [SiteController::class, 'PaginaIntermediarioDetalhesImovel'])->name('site.paginaIntermediarioDetalhesImovel');

Route::resource('mensagens', MensagemController::class)->only(['store']);

Route::controller(AgendamentoController::class)->group(function () {
    Route::post('/calendario', 'calendario')->name('calendario');
    Route::post('/dados', 'dados')->name('dados');
    Route::post('/agendar', 'agendar')->name('agendar');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/admin.php';
require __DIR__ . '/auth.php';
