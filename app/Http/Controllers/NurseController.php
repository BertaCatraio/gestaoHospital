<?php

namespace App\Http\Controllers;

use App\Model\Nurse;
use Illuminate\Http\Request;

class NurseController extends Controller
{
    public function index()
    {
        $nurses = Nurse::all();
        return view('admin.nurse.list.index', compact('nurses'));
    }

    public function create()
    {
        return view('admin.nurse.create.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|string',
            'specialty' => 'required|string',
            'address'   => 'required|string',
            'phone'     => 'required|string',
            'email'     => 'required|email',
            'gender'    => 'required|string'

        ]);
        Nurse::create([
            'name'      => $request->name,
            'specialty' => $request->specialty,
            'address'   => $request->address,
            'phone'     => $request->phone,
            'age'       => $request->age,
            'education' => $request->education,
            'email'     => $request->email,
            'gender'    => $request->gender
        ]);

        return redirect()->route('nurse.index')->with('success', 'Enfermeiro cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $nurse = Nurse::findOrFail($id);
        return view('admin.nurse.edit.index', compact('nurse'));
    }

    public function show($id)
    {
        $nurse = Nurse::findOrFail($id);
        return view('admin.nurse.show.index', compact('nurse'));
    }

    public function update(Request $request, $id)
    {
        $nurse = Nurse::findOrFail($id);

        $request->validate([
            'name'      => 'required|string',
            'specialty' => 'required|string',
            'address'   => 'required|string',
            'phone'     => 'required|string',
            'email'     => 'required|email',
            'age'       => 'required|age',
            'education' => 'required|education',
            'gender'    => 'required|string'
        ]);

        $nurse->update($data);

        return redirect()->route('nurse.index')->with('success', 'Enfermeiro actualizado com sucesso!');
    }

    public function destroy($id)
    {
        $nurse = Nurse::findOrFail($id);
        $nurse->delete();
        return redirect()->route('nurse.index')->with('success_delete', 'Enfermeiro apagado com sucesso!');
    }
}
