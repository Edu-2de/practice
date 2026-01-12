<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function criar(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|min:1',
            'telefone' => 'required|string|min:1'
        ]);

        Cliente::create([
            'nome' => $request->input('nome'),
            'telefone' => $request->input('telefone'),
        ]);

        return redirect('/clientes')->with('sucesso', 'Cliente criado com sucesso!');
    }

    public function index()
    {
        $clientes = Cliente::all();

        return view('lista_clientes', [
            'clientes' => $clientes
        ]);
    }

    public function mostrarFormualirocliente()
    {
        return view('formulario_clientes');
    }

    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);

        return view('editar_cliente', [
            'cliente' => $cliente
        ]);
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);

        $request->validate([
            'nome' => 'required|string|min:1',
            'telefone' => 'required|string|min:1'
        ]);

        $cliente->update([
            'nome' => $request->input('nome'),
            'telefone' => $request->input('telefone')
        ]);

        return redirect('/clientes')->with('sucesso', 'Cliente atualizado com sucesso!');
    }

    public function excluir($id)
    {
        $cliente = Cliente::findOrFail($id);

        $cliente->delete();

        return redirect('/clientes')->with('sucesso', 'Orçamento excluido com sucesso!');
    }
}
