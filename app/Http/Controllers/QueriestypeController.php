<?php

namespace App\Http\Controllers;

use App\Model\Querytype;
use Illuminate\Http\Request;

class QuerytypeController extends Controller
{
    public function index()
    {
        $queries_types = queriestype::all();
        return view('admin.queriestype.list.index', compact('queriestypes'));
    }

    public function create()
    {
        return view('admin.queriestype.create.index');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
        ]);

        Queriestype::create([
            'name' => $data['name'],
        ]);

        return redirect('/queriestype')->with('success', 'Tipo de Consulta cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $queries_type = Queriestype::findOrFail($id);
        return view('admin.queries_type.edit.index', compact('queries_type'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
        ]);

        $queries_type = Queriestype::findOrFail($id);
        $queries_type->update([
            'name' => $data['name'],
        ]);

        return redirect('/queriestype')->with('success', 'Tipo de Consulta actualizado com sucesso!');
    }

    public function destroy($id)
    {
        $queries_Type = Queriestype::findOrFail($id);
        $queries_Type->delete();

        return redirect('/queriestype')->with('success_delete', 'Tipo de Consulta eliminado com sucesso!');
    }
}
