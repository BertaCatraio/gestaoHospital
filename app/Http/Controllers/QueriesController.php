<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Query;
use App\Model\Patient;
use App\Model\Doctor;
use App\Model\QueriesType;

class QueryController extends Controller
{
    public function index()
    {
        $queries = Queries::with(['patient', 'doctor', 'queriestype'])->get();
        return view('admin.queries.list.index', compact('queries'));
    }

    public function create()
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        $queriesTypes = QueriesType::all();
        return view('admin.queries.create.index', compact('patients', 'doctors', 'queriestypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patientId' => 'required',
            'doctorId' => 'required',
            'queriestypeId' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'status' => 'required|in:agendada,concluida,cancelada',
            'reason' => 'nullable|string',
            'observation' => 'nullable|string',
        ]);

        Query::create($request->all());

        return redirect()->route('queries.index')->with('success', 'Consulta registada com sucesso!');
    }

    public function edit($id)
    {
        $query = Queries::findOrFail($id);
        $patients = Patient::all();
        $doctors = Doctor::all();
        $queriesTypes = QueriesType::all();
        return view('admin.queries.edit.index', compact('queries', 'patients', 'doctors', 'queriestypes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'patientId' => 'required',
            'doctorId' => 'required',
            'queriestypeId' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'status' => 'required|in:agendada,concluida,cancelada',
            'reason' => 'nullable|string',
            'observation' => 'nullable|string',
        ]);

        $query = Query::findOrFail($id);
        $query->update($request->all());

        return redirect()->route('queries.index')->with('success', 'Consulta atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $query = Query::findOrFail($id);
        $query->delete();

        return redirect()->route('queries.index')->with('success', 'Consulta eliminada com sucesso!');
    }
}
