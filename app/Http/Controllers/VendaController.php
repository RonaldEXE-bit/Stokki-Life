<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Venda;
use App\Models\Cliente;

class VendaController extends Controller
{
    public function create()
    {
        $produtos = Produto::all();
        $clientes = Cliente::all();
        return view('vendas.create', compact('produtos', 'clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'produto_id' => 'required|exists:produtos,id',
            'tipo_venda' => 'required|in:Produto Fechado,Por Copo',
            'quantidade' => 'nullable|integer|min:1',
            'copos' => 'nullable|integer|min:1',
            'cliente_id' => 'nullable|exists:clientes,id',
            'status_pagamento' => 'required|in:Pago,Pendente,Parcialmente Pago',
            'valor_pago' => 'required|numeric|min:0',
        ]);

        $produto = Produto::findOrFail($request->produto_id);

        // Define quantidade vendida
        $quantidadeVendida = $request->tipo_venda === 'Produto Fechado'
            ? $request->quantidade
            : $request->copos;

        // Verifica estoque
        if ($produto->quantidade < $quantidadeVendida) {
            return back()->withErrors(['quantidade' => 'Estoque insuficiente']);
        }

        // Calcula valor total
        $valorTotal = $request->tipo_venda === 'Produto Fechado'
            ? $produto->preco_fechado * $request->quantidade
            : $produto->preco_copo * $request->copos;

        // Atualiza estoque
        $produto->quantidade -= $quantidadeVendida;
        $produto->save();

        // Cria cliente se não existir
        $cliente = $request->cliente_id
            ? Cliente::find($request->cliente_id)
            : Cliente::firstOrCreate(['nome' => 'Cliente Balcão']);

        // Registra venda
        Venda::create([
            'produto_id' => $produto->id,
            'tipo_venda' => $request->tipo_venda,
            'quantidade_fechado' => $request->quantidade,
            'quantidade_copos' => $request->copos,
            'cliente_id' => $cliente->id,
            'status_pagamento' => $request->status_pagamento,
            'valor_pago' => $request->valor_pago,
            'valor_total' => $valorTotal,
            'data_venda' => now()->toDateString(),
        ]);

        return redirect()->route('contas.index')->with('success', 'Venda registrada com sucesso!');
    }
}
