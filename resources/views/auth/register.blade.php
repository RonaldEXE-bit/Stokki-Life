<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Stokki-Life</title>
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
                    <i data-lucide="user-plus" class="w-10 h-10"></i>
                </div>
                <h1 class="text-4xl font-bold text-stokki-green-dark mt-6">Criar Conta</h1>
                <p class="mt-2 text-stokki-gray-text">Junte-se ao Stokki-Life.</p>
            </div>

            <form method="POST" action="{{ route('register.store') }}" class="space-y-4">
                @csrf

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="text-sm font-medium text-stokki-gray-text block mb-1">Nome</label>
                        <input type="text" name="name" class="w-full px-4 py-2 bg-gray-50 border rounded-md focus:ring-2 focus:ring-stokki-green" required>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-stokki-gray-text block mb-1">Sobrenome</label>
                        <input type="text" name="surname" class="w-full px-4 py-2 bg-gray-50 border rounded-md focus:ring-2 focus:ring-stokki-green">
                    </div>
                </div>

                <div>
                    <label class="text-sm font-medium text-stokki-gray-text block mb-1">Email</label>
                    <input type="email" name="email" class="w-full px-4 py-2 bg-gray-50 border rounded-md focus:ring-2 focus:ring-stokki-green" required>
                </div>

                <div>
                    <label class="text-sm font-medium text-stokki-gray-text block mb-1">Número de WhatsApp</label>
                    <input type="text" name="whatsapp" placeholder="+55 11 91234-5678" class="w-full px-4 py-2 bg-gray-50 border rounded-md focus:ring-2 focus:ring-stokki-green">
                </div>

                <div>
                    <label class="text-sm font-medium text-stokki-gray-text block mb-1">Senha</label>
                    <input type="password" name="password" class="w-full px-4 py-2 bg-gray-50 border rounded-md focus:ring-2 focus:ring-stokki-green" required>
                </div>

                <div>
                    <label class="text-sm font-medium text-stokki-gray-text block mb-1">Confirmar Senha</label>
                    <input type="password" name="password_confirmation" class="w-full px-4 py-2 bg-gray-50 border rounded-md focus:ring-2 focus:ring-stokki-green" required>
                </div>

                <div>
                    <button type="submit" class="w-full flex justify-center items-center gap-2 px-4 py-3 font-bold text-white bg-stokki-green rounded-md hover:bg-stokki-green-dark transition-transform transform hover:scale-105 shadow-md">
                        <i data-lucide="check-circle" class="w-5 h-5"></i> Criar Conta
                    </button>
                </div>
            </form>

            <div class="text-center text-sm mt-4">
                <p class="text-stokki-gray-text">Já tem uma conta?
                    <a href="{{ route('login') }}" class="font-semibold text-stokki-green hover:underline">Faça login</a>
                </p>
            </div>
        </div>
    </div>

    <script>lucide.createIcons();</script>
</body>
</html>
