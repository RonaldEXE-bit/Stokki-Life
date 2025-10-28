<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Contas a Receber - Stokki-Life</title>
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
</head>
<body class="bg-stokki-gray-light font-sans antialiased">
    <main class="max-w-7xl mx-auto px-4 py-8 fade-in">
        <h2 class="text-3xl font-bold text-stokki-green-dark mb-2">Contas a Receber</h2>
        <p class="text-stokki-gray-text mb-8">Histórico de clientes e status de pagamento</p>

        @foreach ($clientes as $cliente)
            <div class="mb-10">
                <h3 class="text-xl font-bold text-stokki-green-dark">{{ $cliente->nome }}</h3>
                <p class="text-stokki-gray-text mb-2">Compras: {{ $cliente->vendas->count() }}</p>

                <div class="bg-white rounded-lg shadow-md p-4">
                    @foreach ($cliente->vendas as $venda)
                        <div class="mb-4 border-b border-stokki-gray-border pb-2">
                            <p><strong>Data:</strong> {{ $venda->created_at->format('d/m/Y') }}</p>
                            <p><strong>Status:</strong> 
                                <span class="{{ $venda->status === 'pago' ? 'text-stokki-green-dark' : 'text-stokki-red' }}">
                                    {{ ucfirst($venda->status) }}
                                </span>
                            </p>
                            <ul class="list-disc ml-6 mt-2">
                                @foreach ($venda->itens as $item)
                                    <li>{{ $item->produto->nome }} — {{ $item->quantidade }} un</li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </main>
    <script>lucide.createIcons();</script>
</body>
</html>