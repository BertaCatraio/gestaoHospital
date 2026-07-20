@extends('layout.admin.main')
@section('title', 'Editar exame')
@section('content')

<div class="content">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Editar exame</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form action="{{ route('exam.update', $exam->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <!-- Paciente -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Paciente</label>
                            <select name="patientId" class="form-control">
                                @foreach($patients as $patient)
                                    <option value="{{ $patient->id }}"
                                        {{ $exam->patientId == $patient->id ? 'selected' : '' }}>
                                        {{ $patient->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- Médico -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Médico</label>
                            <select name="doctorId" class="form-control">
                                @foreach($doctors as $doctor)
                                    <option value="{{ $doctor->id }}"
                                        {{ $exam->doctorId == $doctor->id ? 'selected' : '' }}>
                                        {{ $doctor->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Tipo de Exame -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tipo de Exame</label>
                            <select name="examTypeId" class="form-control">
                                @foreach($examTypes as $type)
                                    <option value="{{ $type->id }}"
                                        {{ $exam->examTypeId == $type->id ? 'selected' : '' }}>
                                        {{ $type->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- Data do Exame -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Data do Exame</label>
                            <input type="date" name="exam_date" class="form-control" value="{{ $exam->exam_date }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Status -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Estado</label>
                            <select name="status" class="form-control">
                                <option value="pending" {{ $exam->status == 'pending' ? 'selected' : '' }}>
                                    Pendente
                                </option>
                                <option value="completed" {{ $exam->status == 'completed' ? 'selected' : '' }}>
                                    Concluído
                                </option>
                                <option value="cancelled" {{ $exam->status == 'cancelled' ? 'selected' : '' }}>
                                    Cancelado
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Resultado</label>
                    <textarea name="result" class="form-control" rows="3">{{ $exam->result }}</textarea>
                </div>
                <div class="text-center">
                    <button class="btn btn-primary">
                        Atualizar Exame
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
