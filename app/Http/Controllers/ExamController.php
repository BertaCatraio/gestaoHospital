<?php

namespace App\Http\Controllers;

use App\Model\Exam;
use App\Model\Patient;
use App\Model\Doctor;
use App\Model\Examtype;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index()
    {
        $exams = Exam::with(['patient', 'doctor', 'examType'])->orderBy('exam_date', 'desc')->get();

        return view('admin.exam.list.index', compact('exams'));
    }

    public function create()
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        $examTypes = ExamType::all();

        return view('admin.exam.create.index', compact('patients', 'doctors', 'examTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patientId'  => 'required|exists:patients,id',
            'doctorId'   => 'required|exists:doctors,id',
            'examTypeId' => 'required|exists:examtypes,id',
            'exam_date'  => 'required|date',
            'result'     => 'nullable|string',
            'status'     => 'required|string|in:pending,completed,cancelled',
        ]);

        Exam::create([
            'patientId'  => $request->patientId,
            'doctorId'   => $request->doctorId,
            'examTypeId' => $request->examTypeId,
            'exam_date'  => $request->exam_date,
            'result'     => $request->result,
            'status'     => $request->status,
        ]);

        return redirect()->route('exam.index')->with('success', 'Exame registado com sucesso!');
    }

    public function edit($id)
    {
        $exam = Exam::findOrFail($id);
        $patients = Patient::all();
        $doctors = Doctor::all();
        $examTypes = ExamType::all();

        return view('admin.exam.edit.index', compact('exam', 'patients', 'doctors', 'examTypes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'patientId'  => 'required|exists:patients,id',
            'doctorId'   => 'required|exists:doctors,id',
            'examTypeId' => 'required|exists:examtypes,id',
            'exam_date'  => 'required|date',
            'result'     => 'nullable|string',
            'status'     => 'required|string|in:pending,completed,cancelled',
        ]);

        $exam = Exam::findOrFail($id);

        $exam->update([
            'patientId'  => $request->patientId,
            'doctorId'   => $request->doctorId,
            'examTypeId' => $request->examTypeId,
            'exam_date'  => $request->exam_date,
            'result'     => $request->result,
            'status'     => $request->status,
        ]);

        return redirect()->route('exam.index')->with('success', 'Exame atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $exam = Exam::findOrFail($id);
        $exam->delete();

        return redirect()->route('exam.index')->with('success', 'Exame eliminado com sucesso!');
    }

    public function show($id)
    {
        $exam = Exam::with(['patient', 'doctor', 'examType'])->findOrFail($id);

        return view('admin.exam.show.index', compact('exam'));
    }
}
