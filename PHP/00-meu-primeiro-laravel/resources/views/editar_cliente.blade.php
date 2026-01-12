@extends('layout')

@section('titulo', 'Editar Orçamento')

@section('conteudo')
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-xl font-bold mb-4 text-gray-700">Editar Orçamento</h2>

        @if ($errors->any()) ... @endif

        <form action="/clientes/{{ $cliente->id }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-1 text-sm font-semibold">Nome:</label>
                <input type="text" name="nome" value="{{ $cliente->nome }}" class="w-full border p-2 rounded..." required>
            </div>

            <div class="mb-6">
                <label class="block mb-1 text-sm font-semibold">Telefone:</label>
                <input type="text" name="telefone" value="{{ $cliente->telefone }}" class="w-full border p-2 rounded..." required>
            </div>

            <button type="submit" class="w-full bg-yellow-500 text-white font-bold py-2 rounded hover:bg-yellow-600 transition">
                Salvar Alterações
            </button>
        </form>
    </div>
@endsection
