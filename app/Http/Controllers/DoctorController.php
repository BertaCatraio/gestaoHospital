<?php

namespace App\Http\Controllers;

use App\Model\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();
        return view('admin.doctor.list.index', compact('doctors'));
    }

    public function create()
    {
        return view('admin.doctor.create.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|string',
            'specialty' => 'required|string',
            'biography' => 'required|string',
            'address'   => 'required|string',
            'phone'     => 'required|string',
            'age'       => 'required|integer',
            'experience' => 'required|string',
            'education'  => 'required|string',
            'email'      => 'required|email'
        ]);

        Doctor::create([
            'name'      => $request->name,
            'specialty' => $request->specialty,
            'biography' => $request->biography,
            'address'   => $request->address,
            'phone'     => $request->phone,
            'age'       => $request->age,
            'experience' => $request->experience,
            'education'  => $request->education,
            'email'      => $request->email,

        ]);

        return redirect()->route('doctor.index')->with('success', 'Doctor cadastrado');
    }

    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('admin.doctor.edit.index', compact('doctor'));
    }
    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('admin.doctor.show.index', compact('doctor'));
    }

    public function update(Request $request, $id)
    {
        $doctor = Doctor::findOrFail($id);

        $request->validate([
            'name'      => 'required|string',
            'specialty' => 'required|string',
            'biography' => 'required|string',
            'address'   => 'required|string',
            'phone'     => 'required|string',
            'age'       => 'required|string',
            'experience'=> 'required|string',
            'education' => 'required|string',
            'email'     => 'required|string',
        ]);
        $doctor->update($data);

        return redirect()->route('doctor.index')->with('success', 'Doctor atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();
        return redirect()->route('doctor.index')->with('success', 'Doctor apagado');
    }
}
