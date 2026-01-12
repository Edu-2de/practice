@extends('layout')

@section('titulo', 'Editar Orçamento')

@section('conteudo')
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-xl font-bold mb-4 text-gray-700">Editar Orçamento</h2>

        @if ($errors->any()) ... @endif

        <form action="/orcamento/{{ $orcamento->id }}" method="POST">
            @csrf
            @method('PUT')

            @foreach($cliente as $cliente)
                <option value="{{cliente -> id}}" {{$orcamento->cliente_id == $cliente->id? 'selected' : ''}}>{{$cliente->nome}}</option>
            @endforeach
            <div class="mb-4">
                <label class="block mb-1 text-sm font-semibold">Nome do Cliente:</label>
                <input type="text" name="cliente" value="{{ $orcamento->cliente->nome }}" class="w-full border p-2 rounded..." required>
            </div>

            <div class="mb-4">
                <label class="block mb-1 text-sm font-semibold">Valor da Hora:</label>
                <input type="number" name="valor_hora" value="{{ $orcamento->valor_hora }}" class="w-full border p-2 rounded..." required>
            </div>

            <div class="mb-6">
                <label class="block mb-1 text-sm font-semibold">Total de Horas:</label>
                <input type="number" name="total_horas" value="{{ $orcamento->total_horas }}" class="w-full border p-2 rounded..." required>
            </div>

            <button type="submit" class="w-full bg-yellow-500 text-white font-bold py-2 rounded hover:bg-yellow-600 transition">
                Salvar Alterações
            </button>
        </form>
    </div>
@endsection
