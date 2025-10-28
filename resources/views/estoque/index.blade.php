<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque - Stokki-Life</title>
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
    <header class="bg-white border-b border-stokki-gray-border shadow-sm sticky top-0 z-10">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-stokki-green-dark">Stokki-Life</h1>
            <a href="{{ route('dashboard') }}" class="text-stokki-gray-text hover:text-stokki-green-dark">← Voltar ao Dashboard</a>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 py-8 fade-in">
        <h2 class="text-3xl font-bold text-stokki-green-dark mb-2">Estoque</h2>
        <p class="text-stokki-gray-text mb-8">Gerencie suas categorias e produtos</p>

        @if (session('success'))
            <div class="bg-stokki-green text-white px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        {{-- Formulário de criação --}}
        <form method="POST" action="{{ route('estoque.store') }}" class="bg-white rounded-lg shadow-md p-6 mb-10">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-stokki-gray-text mb-1">Tipo de Cadastro</label>
                    <select name="tipo" class="w-full border border-stokki-gray-border rounded px-4 py-2">
                        <option value="categoria">Criar Pasta (Categoria)</option>
                        <option value="produto">Adicionar Produto</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-stokki-gray-text mb-1">Nome</label>
                    <input type="text" name="nome" class="w-full border border-stokki-gray-border rounded px-4 py-2" placeholder="Nome da pasta ou produto">
                </div>

                <div>
                    <label class="block text-sm font-medium text-stokki-gray-text mb-1">Quantidade (se for produto)</label>
                    <input type="number" name="quantidade" class="w-full border border-stokki-gray-border rounded px-4 py-2" min="1">
                </div>

                <div>
                    <label class="block text-sm font-medium text-stokki-gray-text mb-1">Categoria (se for produto)</label>
                    <select name="categoria_id" class="w-full border border-stokki-gray-border rounded px-4 py-2">
                        <option value="">Selecione uma pasta</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-stokki-green text-white px-6 py-2 rounded hover:bg-stokki-green-dark transition">
                    Salvar
                </button>
            </div>
        </form>

        {{-- Lista de categorias e produtos --}}
        @foreach ($categorias as $categoria)
            <div class="mb-10">
                <h3 class="text-xl font-bold text-stokki-green-dark mb-4">{{ $categoria->nome }}</h3>
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <table class="min-w-full divide-y divide-stokki-gray-border">
                        <thead class="bg-stokki-gray-light text-stokki-gray-text text-sm">
                            <tr>
                                <th class="px-4 py-2 text-left">Produto</th>
                                <th class="px-4 py-2 text-left">Quantidade</th>
                                <th class="px-4 py-2 text-left">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm text-stokki-gray-text divide-y divide-stokki-gray-border">
                            @forelse ($categoria->produtos as $produto)
                                <tr>
                                    <td class="px-4 py-2">{{ $produto->nome }}</td>
                                    <td class="px-4 py-2">{{ $produto->quantidade }}</td>
                                    <td class="px-4 py-2">
                                        <form method="POST" action="{{ route('estoque.update', $produto) }}" class="flex items-center gap-2">
                                            @csrf
                                            @method('PUT')
                                            <input type="number" name="quantidade" min="1" class="w-20 border border-stokki-gray-border rounded px-2 py-1" placeholder="+">
                                            <button type="submit" class="bg-stokki-green text-white px-3 py-1 rounded hover:bg-stokki-green-dark">
                                                Atualizar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-4 py-4 text-center text-stokki-gray-text">Nenhum produto nesta pasta.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
    </main>

    <script>lucide.createIcons();</script>
</body>
</html>