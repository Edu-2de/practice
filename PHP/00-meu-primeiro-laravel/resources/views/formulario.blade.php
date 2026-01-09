@extends('layout')

@section('conteudo')
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-xl font-bold mb-4 text-gray-700">Novo Orçamento</h2>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/calcular" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block mb-1 text-sm font-semibold">Nome do Cliente:</label>
                <input  type="text" name="cliente" class="w-full border p-2 rounded focus:ring-2 focus:ring-blue-500 outline-none" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1 text-sm font-semibold">Valor da Hora (R$):</label>
                <input type="number" name="valor_hora" class="w-full border p-2 rounded focus:ring-2 focus:ring-blue-500 outline-none">
            </div>

            <div class="mb-6">
                <label class="block mb-1 text-sm font-semibold">Total de Horas:</label>
                <input type="number" name="total_horas" class="w-full border p-2 rounded focus:ring-2 focus:ring-blue-500 outline-none">
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white font-bold py-2 rounded hover:bg-blue-700 transition">
                Calcular e Salvar
            </button>
        </form>
    </div>
@endsection
