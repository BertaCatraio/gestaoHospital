<?php

namespace App\Http\Controllers;

use App\Model\Patient;
use App\Model\Doctor;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::all();
        return view('admin.patient.list.index', compact('patients'));
    }

    public function create()
    {
        $doctors = Doctor::all();
        return view('admin.patient.create.index', compact('doctors'));
    }
        //metodo para adicionar botao de pesquisa na triagem
    public function search(Request $request)
    {
        $term = $request->get('term');

        $patients = Patient::where('name', 'LIKE', "%{$term}%")
            ->limit(10)
            ->get(['id', 'name']);

        return response()->json($patients);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'             => 'required|string',
            'phone'            => 'required|string',
            'address'          => 'required|string',
            'gender'           => 'required|string',
            'age'              => 'required|integer',
            'companion'        => 'required|string',
            'companion_phone'  => 'required|string',
            'registrationDate' => 'required|date',
        ]);

        Patient::create([
            'name'              => $data['name'],
            'phone'             => $data['phone'],
            'address'           => $data['address'],
            'gender'            => $data['gender'],
            'age'               => $data['age'],
            'companion_name'    => $data['companion'],
            'companion_phone'   => $data['companion_phone'],
            'registration_date' => $data['registrationDate'],
        ]);

        return redirect('/patient')->with('success', 'Paciente cadastrado com sucesso!');
    }

    public function show($id)
    {
        $patient = Patient::findOrFail($id);
        return view('admin.patient.show.index', compact('patient'));
    }

    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        $doctors = Doctor::all();
        return view('admin.patient.edit.index', compact('patient', 'doctors'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name'             => 'required|string',
            'phone'            => 'required|string',
            'address'          => 'required|string',
            'gender'           => 'required|string',
            'age'              => 'required|integer',
            'companion'        => 'required|string',
            'companion_phone'  => 'required|string',
            'registrationDate' => 'required|date',
        ]);

        $patient = Patient::findOrFail($id);
        $patient->update([
            'name'              => $data['name'],
            'phone'             => $data['phone'],
            'address'           => $data['address'],
            'gender'            => $data['gender'],
            'age'               => $data['age'],
            'companion_name'    => $data['companion'],
            'companion_phone'   => $data['companion_phone'],
            'registration_date' => $data['registrationDate'],
        ]);

        return redirect('/patient')->with('success', 'Paciente actualizado com sucesso!');
    }

    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();

        return redirect('/patient')->with('success_delete', 'Paciente eliminado com sucesso!');
    }
   //metodo para adicionar botao de pesquisa na triagem e no exame
   //public function search(Request $request)
  /* {
       $term = $request->get('term', $request->get('q'));

       $patients = Patient::where('name', 'LIKE', "%{$term}%")
           ->limit(10)
           ->get(['id', 'name']);

       return response()->json($patients);
   }*/
}
