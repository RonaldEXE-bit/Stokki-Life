<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\AcessoController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\ContaReceberController;

/*
|--------------------------------------------------------------------------
| Rota de boas-vindas
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

/*
|--------------------------------------------------------------------------
| Rotas de autenticação
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Rota protegida do dashboard
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

/*
|--------------------------------------------------------------------------
| Rotas protegidas com middleware 'auth'
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    // Estoque
    Route::get('/estoque', [EstoqueController::class, 'index'])->name('estoque.index');
    Route::post('/estoque', [EstoqueController::class, 'store'])->name('estoque.store');
    Route::put('/estoque/{produto}', [EstoqueController::class, 'update'])->name('estoque.update');

    // Contas a receber
    Route::get('/contas', [ContaReceberController::class, 'index'])->name('contas.index');

    // Acessos
    Route::get('/acessos', [AcessoController::class, 'index'])->name('acessos.index');

    // Vendas
    Route::get('/vendas/criar', [VendaController::class, 'create'])->name('vendas.create');
    Route::post('/vendas', [VendaController::class, 'store'])->name('vendas.store');
});

/*
|--------------------------------------------------------------------------
| CRUD de produtos
|--------------------------------------------------------------------------
*/
Route::resource('produtos', ProdutoController::class)->middleware('auth');
