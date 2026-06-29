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
            'temperature'       => 'required|string',
            'weight'            => 'required|decimal',
            'heartbeat'          => 'required|string',
            'bood_pressure'     => 'required|string',
            'observation'       => 'required|integer'
        ]);

            Screening::create([
                'temperature'  => $request->temperature,
                'weight'      => $request->weight,
                'heartbeat'   => $request->heatbeat,
                'bood_pressure' => $request->bood_pressure,
                'observation'   => $request->observation,
        ]);

        return redirect('/screening')->with('success', 'Triagem cadastrado com sucesso!');
    }

    public function show($id)
    {
        $screening = Screening::findOrFail($id);
        return view('admin.screening.show.index', compact('patient'));
    }

    public function edit($id)
    {
        $screening = Screening::findOrFail($id);
        return view('admin.screening.edit.index', compact('screening', 'screening'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'temperature'             => 'required|string',
            'weight'            => 'required|decimal',
            'heartbeat'   => 'required|string',
            'bood_pressure' => 'required|string',
            'observation' => 'required|string',
        ]);

        $screening = Screening::findOrFail($id);
        $screening->update([
            'temperature'  =>'requerid|string',
            'weight'       => 'requerid|string',
            'heartbeat'     => 'requirid|string',
            'bood_pressure'  => 'requirid|string',
            'observation'     => 'requirid|string',

        ]);

        return redirect('/screening')->with('success', 'triagem actualizado com sucesso!');
    }

    public function destroy($id)
    {
        $screening = Screening::findOrFail($id);
        $screening->delete();

        return redirect('/screening')->with('success_delete', 'triagem eliminado com sucesso!');
    }
}

