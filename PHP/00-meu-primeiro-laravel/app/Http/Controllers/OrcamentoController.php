<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orcamento;
use App\Models\Cliente;

class OrcamentoController extends Controller
{
    public function calcular(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'valor_hora' => 'required|numeric|min:1',
            'total_horas' => 'required|integer|min:1'
        ]);

        $valor = $request->input('valor_hora');
        $horas = $request->input('total_horas');
        $resultado = $valor * $horas;

        Orcamento::create([
            'cliente_id' => $request->input('cliente_id'),
            'valor_hora' => $valor,
            'total_horas' => $horas,
            'valor_final' => $resultado
        ]);

        return redirect('/')->with('sucesso', 'Orçamento criado com sucesso!');
    }

    public function index()
    {
        $orcamentos = Orcamento::all();
        return view('lista', [
            'orcamentos' => $orcamentos
        ]);
    }


    public function excluir($id)
    {
        $orcamento = Orcamento::findOrFail($id);

        $orcamento->delete();

        return redirect('/')->with('sucesso', 'Orçamento excluido com sucesso!');
    }

    public function editar($id)
    {
        $orcamento = Orcamento::findOrFail($id);
        return view('editar', [
            'orcamento' => $orcamento
        ]);
    }

    public function update(Request $request, $id)
    {
        $orcamento = Orcamento::findOrFail($id);

        $request->validate(
            [
                'cliente' => 'required',
                'valor_hora' => 'required|numeric|min:1',
                'total_horas' => 'required|integer|min:1'
            ]
        );

        $novoValorFinal = $request->input('valor_hora') * $request->input('total_horas');

        $orcamento->update([
            'cliente' => $request->input('cliente'),
            'valor_hora' => $request->input('valor_hora'),
            'total_horas' => $request->input('total_horas'),
            'valor_final' => $novoValorFinal
        ]);

        return redirect('/')->with('sucesso', 'Orçamento atualizado com sucesso!');
    }

    public function mostrarFormulario()
    {
        $clientes = Cliente::all();

        return view('formulario', [
            'clientes' => $clientes
        ]);
    }
}
