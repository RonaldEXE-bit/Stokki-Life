<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Venda - Stokki-Life</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        'stokki-green': { DEFAULT: '#38A169', dark: '#2F855A' },
                        'stokki-red': { DEFAULT: '#E53E3E' },
                        'stokki-gray': { light: '#F7FAFC', text: '#718096', border: '#E2E8F0' }
                    }
                }
            }
        }
    </script>
    <style>
        .fade-in { animation: fadeIn 0.5s ease-in-out; }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
    </style>
</head>
<body class="bg-stokki-gray-light font-sans antialiased">
    <main class="max-w-3xl mx-auto px-4 py-8 fade-in">
        <h2 class="text-3xl font-bold text-stokki-green-dark mb-2">Registrar Venda</h2>
        <p class="text-stokki-gray-text mb-6">Preencha os dados abaixo para registrar uma nova venda.</p>

        @if ($errors->any())
            <div class="bg-stokki-red text-white p-4 rounded mb-6">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('vendas.store') }}" class="bg-white p-6 rounded-lg shadow space-y-6">
            @csrf

            <div>
                <label for="cliente_id" class="block text-sm font-medium text-stokki-gray-text mb-1">Cliente</label>
                <select name="cliente_id" id="cliente_id" required class="w-full border rounded px-4 py-2">
                    <option value="">Selecione o cliente</option>
                    @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="produto_id" class="block text-sm font-medium text-stokki-gray-text mb-1">Produto</label>
                <select name="produto_id" id="produto_id" required class="w-full border rounded px-4 py-2">
                    @foreach ($produtos as $produto)
                        <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="tipo_venda" class="block text-sm font-medium text-stokki-gray-text mb-1">Tipo de Venda</label>
                <select name="tipo_venda" id="tipo_venda" required class="w-full border rounded px-4 py-2">
                    <option value="Produto Fechado">Produto Fechado</option>
                    <option value="Por Copo">Por Copo</option>
                </select>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="quantidade" class="block text-sm font-medium text-stokki-gray-text mb-1">Quantidade (Fechado)</label>
                    <input type="number" name="quantidade" id="quantidade" min="1" class="w-full border rounded px-4 py-2">
                </div>
                <div>
                    <label for="copos" class="block text-sm font-medium text-stokki-gray-text mb-1">Copos (Copo)</label>
                    <input type="number" name="copos" id="copos" min="1" class="w-full border rounded px-4 py-2">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="status_pagamento" class="block text-sm font-medium text-stokki-gray-text mb-1">Status do Pagamento</label>
                    <select name="status_pagamento" id="status_pagamento" required class="w-full border rounded px-4 py-2">
                        <option value="Pago">Pago</option>
                        <option value="Pendente">Pendente</option>
                        <option value="Parcialmente Pago">Parcialmente Pago</option>
                    </select>
                </div>
                <div>
                    <label for="valor_pago" class="block text-sm font-medium text-stokki-gray-text mb-1">Valor Pago</label>
                    <input type="number" step="0.01" name="valor_pago" id="valor_pago" class="w-full border rounded px-4 py-2">
                </div>
            </div>

            <div>
                <button type="submit" class="w-full bg-stokki-green text-white font-bold py-3 rounded hover:bg-stokki-green-dark transition">
                    Registrar Venda
                </button>
            </div>
        </form>
    </main>

    <script>lucide.createIcons();</script>
</body>
</html>