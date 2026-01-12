@extends('layout')

@section('conteudo')

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-700">Clientes</h2>
        <a href="/novo-cliente" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
            + Novo Cliente
        </a>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-200 text-gray-700">
                <tr>
                    <th class="p-3 text-left">Nome</th>
                    <th class="p-3 text-left">Telefone</th>
                    <th class="p-3 text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $cliente)
                    <tr class="border-b hover:bg-gray-50 text-gray-800">
                        <td class="p-3">{{ $cliente->nome }}</td>
                        <td class="p-3">{{ $cliente->telefone }}</td>
                        <td class="p-3 text-center">
                            <a href="/clientes/{{$cliente->id}}/editar_cliente" class="text-blue-600 hover:underline text-sm">Editar</a>
                            <form action="/clientes/{{ $cliente->id }}" method="POST" onsubmit="return confirm('Tem certeza?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="text-red-600 hover:underline text-sm font-semibold">
                                    Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if($clientes->isEmpty())
        <div class="text-center p-10 text-gray-500">
            Nenhum cliente cadastrado ainda.
        </div>
    @endif

@endsection
