<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Venda;
use App\Models\Entrada;

class AcessoController extends Controller
{
    public function index()
    {
        $entradas = Entrada::with('produto')->latest()->get();
        $vendas = Venda::with('produto')->latest()->get();

        return view('acessos.index', compact('entradas', 'vendas'));
    }
}