

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Bem-vindo ao Stokki-Life</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                    colors: {
                        'stokki-green': { DEFAULT: '#38A169', dark: '#2F855A' },
                        'stokki-gray': { light: '#F7FAFC', text: '#718096', border: '#E2E8F0' }
                    }
                }
            }
        }
    </script>
    <style>
        .fade-in { animation: fadeIn 0.6s ease-in-out; }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
    </style>
    <link rel="icon" type="image/jpeg" href="{{ asset('images/icon.png') }}">
</head>

<body class="bg-stokki-gray-light font-sans antialiased fade-in">

    <!-- Header -->
    <header class="bg-white shadow border-b border-stokki-gray-border">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <img src="{{ asset('images/LogoStokkiLife.png') }}" alt="Stokki-Life" class="h-10 w-10 rounded-full object-cover">
                <span class="font-bold text-stokki-green-dark text-lg">Stokki-Life</span>
            </div>
            <nav class="flex gap-4 text-stokki-gray-text">
                <a href="{{ route('login') }}" class="hover:text-stokki-green-dark">Entrar</a>
                <a href="{{ route('register') }}" class="hover:text-stokki-green-dark">Criar conta</a>
            </nav>
        </div>
    </header>

    <!-- Hero -->
    <section class="bg-gradient-to-r from-stokki-green to-stokki-green-dark text-white py-20 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Gestão para uma vida saudável</h1>
        <p class="text-lg md:text-xl max-w-2xl mx-auto">Controle vendas, estoque e contas a receber de forma simples, confiável e profissional.</p>
    </section>

    <!-- Conteúdo principal -->
    <main class="max-w-6xl mx-auto px-6 py-12">
        <div class="grid md:grid-cols-2 gap-8 mb-12">
            <!-- Quem somos -->
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                <h2 class="text-xl font-semibold text-stokki-green-dark mb-3 flex items-center gap-2">
                    <i data-lucide="info"></i> Quem somos
                </h2>
                <p class="text-stokki-gray-text">O Stokki-Life ajuda pequenos negócios e projetos pessoais a organizarem produtos, vendas e recebimentos, com foco em praticidade e clareza.</p>
            </div>
            <!-- Como usar -->
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                <h2 class="text-xl font-semibold text-stokki-green-dark mb-3 flex items-center gap-2">
                    <i data-lucide="play-circle"></i> Como usar
                </h2>
                <div class="aspect-w-16 aspect-h-9">
                    <iframe class="w-full h-64 rounded" src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="Tutorial Stokki-Life" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>

        <!-- Botões de ação -->
        <div class="flex items-center justify-center gap-6">
            <a href="{{ route('login') }}" class="px-8 py-3 bg-stokki-green text-white rounded-lg shadow hover:bg-stokki-green-dark transition">Entrar</a>
            <a href="{{ route('register') }}" class="px-8 py-3 bg-white border border-stokki-gray-border rounded-lg shadow hover:bg-stokki-gray-light transition">Criar conta</a>
        </div>
    </main>

    <!-- Rodapé -->
    <footer class="bg-white border-t border-stokki-gray-border py-6 text-center text-stokki-gray-text">
        <p>&copy; {{ date('Y') }} Stokki-Life. Todos os direitos reservados.</p>
    </footer>

    <script>lucide.createIcons();</script>
</body>
</html>
