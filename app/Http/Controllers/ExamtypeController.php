<?php

namespace App\Http\Controllers;

use App\Model\Examtype;
use Illuminate\Http\Request;

class ExamtypeController extends Controller
{
    public function index()
    {
        $examtypes = Examtype::all();
        return view('admin.examtype.list.index', compact('examtypes'));
    }

    public function create()
    {
        return view('admin.examtype.create.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:examtypes,name',
        ]);

        Examtype::create([
            'name' => $request->name,
        ]);

        return redirect()->route('examtype.index')
            ->with('success', 'Tipo de exame adicionado com sucesso!');
    }

    public function edit($id)
    {
        $examtype = Examtype::findOrFail($id);
        return view('admin.examtype.edit.index', compact('examtype'));
    }

    public function update(Request $request, $id)
    {
        $examtype = Examtype::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:examtypes,name,' . $id,
        ]);

        $examtype->update([
            'name' => $request->name,
        ]);

        return redirect()->route('examtype.index')
            ->with('success', 'Tipo de exame atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $examtype = Examtype::findOrFail($id);
        $examtype->delete();

        return redirect()->route('examtype.index')
            ->with('success_delete', 'Tipo de exame apagado com sucesso!');
    }
}
