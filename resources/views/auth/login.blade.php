<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Stokki-Life</title>
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
                        'stokki-gray': { light: '#F7FAFC', text: '#718096' }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-stokki-gray-light font-sans antialiased">
    <div class="flex items-center justify-center min-h-screen login-gradient">
        <div class="w-full max-w-sm p-8 space-y-6 bg-white rounded-xl shadow-2xl">
            <div class="text-center">
                <div class="flex justify-center items-center mx-auto w-20 h-20 bg-stokki-green text-white rounded-full shadow-lg">
                    <i data-lucide="leaf" class="w-10 h-10"></i>
                </div>
                <h1 class="text-4xl font-bold text-stokki-green-dark mt-6">Stokki-Life</h1>
                <p class="mt-2 text-stokki-gray-text">Gestão para uma vida saudável.</p>
            </div>
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                <div>
                    <label class="text-sm font-medium text-stokki-gray-text block mb-1">Email</label>
                    <input type="email" name="email" class="w-full px-4 py-2 bg-gray-50 border rounded-md focus:ring-2 focus:ring-stokki-green" required>
                </div>
                <div>
                    <label class="text-sm font-medium text-stokki-gray-text block mb-1">Senha</label>
                    <input type="password" name="password" class="w-full px-4 py-2 bg-gray-50 border rounded-md focus:ring-2 focus:ring-stokki-green" required>
                </div>
                <div>
                    <button type="submit" class="w-full flex justify-center items-center gap-2 px-4 py-3 font-bold text-white bg-stokki-green rounded-md hover:bg-stokki-green-dark transition-transform transform hover:scale-105 shadow-md">
                        <i data-lucide="log-in" class="w-5 h-5"></i> Entrar
                    </button>
                </div>
            </form>
            <div class="text-center text-sm mt-6">
                <p class="text-stokki-gray-text">Não tem uma conta?
                    <a href="{{ route('register') }}" class="font-semibold text-stokki-green hover:underline">Crie uma aqui</a>
                </p>
            </div>
        </div>
    </div>
    <script>lucide.createIcons();</script>
</body>
</html>