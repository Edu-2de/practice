@extends('layout')

@section('conteudo')

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-700">Meus Orçamentos</h2>
        <a href="/novo-orcamento" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
            + Novo Orçamento
        </a>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-200 text-gray-700">
                <tr>
                    <th class="p-3 text-left">Cliente</th>
                    <th class="p-3 text-left">Valor Hora</th>
                    <th class="p-3 text-left">Total Horas</th>
                    <th class="p-3 text-left">Valor Final</th>
                    <th class="p-3 text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orcamentos as $item)
                    <tr class="border-b hover:bg-gray-50 text-gray-800">
                        <td class="p-3">{{ $item->cliente }}</td>
                        <td class="p-3">R$ {{ $item->valor_hora }}</td>
                        <td class="p-3">{{ $item->total_horas }}h</td>
                        <td class="p-3 font-bold text-green-600">R$ {{ $item->valor_final }}</td>
                        <td class="p-3 text-center">
                            <a href="#" class="text-blue-600 hover:underline text-sm">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if($orcamentos->isEmpty())
        <div class="text-center p-10 text-gray-500">
            Nenhum orçamento cadastrado ainda.
        </div>
    @endif

@endsection
