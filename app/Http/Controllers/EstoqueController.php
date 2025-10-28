<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;

class EstoqueController extends Controller
{
    public function index()
    {
        $categorias = Categoria::with('produtos')->get();
        return view('estoque.index', compact('categorias'));
    }

    public function store(Request $request)
    {
        if ($request->tipo === 'categoria') {
            $request->validate([
                'nome' => 'required|string'
            ]);

            Categoria::create([
                'nome' => $request->nome
            ]);
        } else {
            $request->validate([
                'nome' => 'required|string',
                'codigo' => 'required|string|unique:produtos,codigo',
                'preco_venda' => 'required|numeric|min:0',
                'quantidade' => 'required|integer|min:1',
                'categoria_id' => 'required|exists:categorias,id',
            ]);

            Produto::create([
                'nome' => $request->nome,
                'codigo' => $request->codigo,
                'preco_venda' => $request->preco_venda,
                'quantidade' => $request->quantidade,
                'categoria_id' => $request->categoria_id,
            ]);
        }

        return redirect()->route('estoque.index')->with('success', 'Cadastro realizado com sucesso!');
    }

    public function update(Request $request, Produto $produto)
    {
        $request->validate([
            'quantidade' => 'required|integer|min:1'
        ]);

        $produto->quantidade += $request->quantidade;
        $produto->save();

        return redirect()->route('estoque.index')->with('success', 'Estoque atualizado!');
    }
}