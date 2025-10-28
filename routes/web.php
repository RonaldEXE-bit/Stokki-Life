<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\AcessoController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\ContaReceberController;

Route::middleware(['auth'])->group(function () {
    Route::get('/contas', [ContaReceberController::class, 'index'])->name('contas.index');
});
Route::middleware('auth')->group(function () {
    Route::get('/estoque', [EstoqueController::class, 'index'])->name('estoque.index');
    Route::post('/estoque', [EstoqueController::class, 'store'])->name('estoque.store');
    Route::put('/estoque/{produto}', [EstoqueController::class, 'update'])->name('estoque.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/acessos', [AcessoController::class, 'index'])->name('acessos.index');

});
Route::get('/vendas/criar', [VendaController::class, 'create'])->middleware('auth')->name('vendas.create');
Route::post('/vendas', [VendaController::class, 'store'])->middleware('auth')->name('vendas.store');

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aqui é onde você registra as rotas web da sua aplicação.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Rotas de autenticação
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rota protegida do dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// CRUD de produtos
Route::resource('produtos', ProdutoController::class);