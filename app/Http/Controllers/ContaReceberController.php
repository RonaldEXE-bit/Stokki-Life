<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ContaReceberController extends Controller
{
    public function index()
    {
        $clientes = Cliente::with(['vendas.itens.produto'])->get();

        return view('contas.index', compact('clientes'));
    }
}