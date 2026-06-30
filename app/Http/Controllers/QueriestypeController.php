<?php

namespace App\Http\Controllers;

use App\Model\QueriesType;
use Illuminate\Http\Request;

class QueriesTypeController extends Controller
{

    public function index()
    {
        $queriestypes = QueriesType::all();
        return view('admin.queriestype.list.index', compact('queriestypes'));
    }

    // Formulário de criação
    public function create()
    {
        return view('admin.queriestype.create.index');
    }

    // Guardar novo tipo de consulta
    public function store(Request $request)
    {
        $request->validate([
            'general_consultation'  => 'required|string',
            'routine_consultation'  => 'required|string',
            'cardiology'            => 'required|string',
            'pediatrecs'            => 'required|string',
            'obstetrecs'            => 'required|string',
            'gynecology'            => 'required|string',
            'orthopidecs'           => 'required|string',
            'dermatology'           => 'required|string',
            'psychiatry'            => 'required|string',
            'ophthalmology'         => 'required|string',
            'neurology'             => 'required|string',
            'emergency'             => 'required|string',
        ]);

        QueriesType::create($request->all());

        return redirect()->route('queriestype.index')
            ->with('success', 'Tipo de Consulta adicionado com sucesso!');
    }

    // Formulário de edição
    public function edit($id)
    {
        $queriestype = QueriesType::findOrFail($id);
        return view('admin.queriestype.edit', compact('queriestype'));
    }

    // Atualizar tipo de consulta
    public function update(Request $request, $id)
    {
        $queriestype = QueriesType::findOrFail($id);

        $request->validate([
            'general_consultation'  => 'required|string',
            'routine_consultation'  => 'required|string',
            'cardiology'            => 'required|string',
            'pediatrecs'            => 'required|string',
            'obstetrecs'            => 'required|string',
            'gynecology'            => 'required|string',
            'orthopidecs'           => 'required|string',
            'dermatology'           => 'required|string',
            'psychiatry'            => 'required|string',
            'ophthalmology'         => 'required|string',
            'neurology'             => 'required|string',
            'emergency'             => 'required|string',
        ]);

        $queriestype->update($request->all());

        return redirect()->route('queriestype.index')
            ->with('success', 'Tipo de Consulta atualizado com sucesso!');
    }

    // Apagar tipo de consulta
    public function destroy($id)
    {
        $queriestype = QueriesType::findOrFail($id);
        $queriestype->delete();

        return redirect()->route('queriestype.index')
            ->with('success_delete', 'Tipo de Consulta apagado com sucesso!');
    }
}
