<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Orçamentos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans">

    <div class="bg-blue-600 p-4 text-white font-bold text-center mb-6 shadow-md">
        SISTEMA DE ORÇAMENTOS
    </div>

    <div class="container mx-auto px-4">

        @if(session('sucesso'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 shadow-sm" role="alert">
                <p class="font-bold">Sucesso!</p>
                <p>{{ session('sucesso') }}</p>
            </div>
        @endif

        @yield('conteudo')
    </div>

    <footer class="text-center text-gray-500 text-xs mt-10 mb-4">
        Desenvolvido com Laravel
    </footer>

</body>
</html>
