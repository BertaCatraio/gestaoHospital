<?php

namespace App\Http\Controllers;

use App\Model\Screening;
use Illuminate\Http\Request;

class ScreeningController extends Controller
{

    public function index()
    {
        $screening = Screening::all();
        return view('admin.screening.list.index', compact('screening'));
    }

    public function create()
    {
        $screenings = Screening::all();
        return view('admin.screening.create.index', compact('screenings'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'patient_id'     => 'required|integer',
            'temperature'    => 'required|numeric',
            'weight'         => 'required|numeric',
            'heartbeat'      => 'required|string',
            'bood_pressure' => 'required|string',
            'observation'    => 'nullable|string',
        ]);

        Screening::create([
            'patient_id'     => $request->patient_id,
            'temperature'    => $request->temperature,
            'weight'         => $request->weight,
            'heartbeat'      => $request->heartbeat,
            'bood_pressure' => $request->blood_pressure,
            'observation'    => $request->observation,
        ]);

        return redirect('/screening')->with('success', 'Triagem cadastrado com sucesso!');
    }

    public function show($id)
    {
        $screening = Screening::findOrFail($id);
        return view('admin.screening.show.index', compact('screening'));
    }

    public function edit($id)
    {
        $screening = Screening::findOrFail($id);
        return view('admin.screening.edit.index', compact('screening'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'patient_id'     => 'required|integer',
            'temperature'    => 'required|numeric',
            'weight'         => 'required|numeric',
            'heartbeat'      => 'required|string',
            'bood_pressure' => 'required|string',
            'observation'    => 'nullable|string',
        ]);

        $screening = Screening::findOrFail($id);
        $screening->update([
            'patient_id'     => $request->patient_id,
            'temperature'    => $request->temperature,
            'weight'         => $request->weight,
            'heartbeat'      => $request->heartbeat,
            'bood_pressure' => $request->blood_pressure,
            'observation'    => $request->observation,
        ]);

        return redirect('/screening')->with('success', 'Triagem actualizado com sucesso!');
    }

    public function destroy($id)
    {
        $screening = Screening::findOrFail($id);
        $screening->delete();

        return redirect('/screening')->with('success_delete', 'Triagem eliminado com sucesso!');
    }
}
