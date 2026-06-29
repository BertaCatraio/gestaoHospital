@extends('layout.admin.main')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h4 class="page-title">Nova Triagem</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 offset-lg-2">

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('screening.store') }}" method="POST">
                    @csrf

                    <div class="row">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Paciente <span class="text-danger">*</span></label>
                                <select name="patient_id" class="form-control">
                                    <option value="">Selecione o Paciente</option>
                                    @foreach ($screenings as $screening)
                                        <option value="{{ $patient->id }}"
                                            {{ old('patient_id') == $patient->id ? 'selected' : '' }}>
                                            {{ $patient->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Temperatura (Cº)<span class="text-danger">*</span></label>
                                <input type="number" step="0.1" name="temperature" class="form-control"
                                    placeholder="Temperatura" value="{{ old('temperature') }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Peso (Kg)<span class="text-danger">*</span></label>
                                <input type="number" step="0.1" name="weight" class="form-control"
                                    placeholder="Peso" value="{{ old('weight') }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Batimento Cardíaco (bpm)<span class="text-danger">*</span></label>
                                <input type="number" name="heartbeat" class="form-control" placeholder="Batimento Cardíaco"
                                    value="{{ old('heartbeat') }}">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Pressão Arterial (mmHg)<span class="text-danger">*</span></label>
                                <input type="text" name="blood_pressure" class="form-control" placeholder="Pressão Arterial"
                                    value="{{ old('blood_pressure') }}">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Observação</label>
                                <textarea name="observation" class="form-control" rows="3" placeholder="Obs:">{{ old('observation') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="m-t-20 text-center">
                        <a href="/screening" class="btn btn-secondary m-r-10">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Guardar Triagem</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
