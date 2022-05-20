<?php

use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SolicitacaoController;
use App\Http\Controllers\SoliProdController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/layout', function () {
    return view('layout');
});

// Route::get('/fornecedores', function () {
//     return view('fornecedores.index');
// });

// Route::get('/fornecedores/create', function () {
//     return view('fornecedores.create');
// });

Route::resource('fornecedores', FornecedorController::class);
Route::resource('solicitacao', SolicitacaoController::class);
Route::resource('produtos', ProdutoController::class);
// Route::resource('soli_prod', SoliProdController::class);

Route::prefix('solicitacoes/{solicitacao}/soli_prod')
    ->name('soli_prod.')    
    ->group(function() {
    Route::get('create', [SoliProdController::class, 'create'])->name('create');
    Route::post('create', [SoliProdController::class, 'store'])->name('store');
    Route::delete('destroy', [SoliProdController::class, 'destroy'])->name('destroy');
});

// Route::resource('fornecedores', FornecedorController::class)->except('destroy');