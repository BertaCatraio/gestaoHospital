@extends('layout.admin.main')

@section('content')

<div class="content">

    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Adicionar Nova Consulta</h4>
        </div>
    </div>
    @if ($errors->any())
        <div class="row">
            <div class="col-lg-8 offset-lg-2">

                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('queries.store') }}" method="POST">

                        @csrf
                        <div class="row">
                            <!-- Paciente -->
                            <div class="col-md-6">
                                <div class="form-group">

                                    <label>Paciente</label>

                                    <select name="patientId" class="form-control select">
                                        <option value="">
                                            Selecione o paciente
                                        </option>
                                        @foreach ($patients as $patient)

                                            <option value="{{ $patient->id }}">
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

                                    <select name="doctorId" class="form-control select">

                                        <option value="">
                                            Selecione o médico
                                        </option>
                                        @foreach ($doctors as $doctor)

                                            <option value="{{ $doctor->id }}">
                                                {{ $doctor->name }}
                                            </option>

                                        @endforeach

                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- Tipo de Consulta -->
                            <div class="col-md-6">
                                <div class="form-group">

                                    <label>Tipo de Consulta</label>

                                    <select name="queriestypeId" class="form-control select">

                                        <option value="">
                                            Selecione o tipo
                                        </option>
                                        @foreach ($queriesTypes as $type)

                                            <option value="{{ $type->id }}">
                                                {{ $type->name }}
                                            </option>

                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <!-- Data -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Data</label>
                                    <input type="date" name="date"  class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- Hora -->
                            <div class="col-md-6">
                                <div class="form-group">

                                    <label>Hora</label>

                                    <input type="time"name="time" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">

                                    <label>Status</label>

                                    <select name="status" class="form-control">

                                        <option value="">Selecione o status</option>

                                        <option value="agendada">
                                            Agendada
                                        </option>

                                        <option value="concluida">
                                            Concluída
                                        </option>

                                        <option value="cancelada">
                                            Cancelada
                                        </option>

                                    </select>

                                </div>
                            </div>
                            <div style="text-align: center; width: 100%; margin-top: 20px;">

                                <button type="submit" class="btn btn-primary">
                                    Salvar Consulta
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
