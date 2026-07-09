@extends('layout.admin.main')

@section('content')

<div class="content">

    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Editar Consulta</h4>
        </div>
    </div>
    <div class="row">

        <div class="col-lg-8 offset-lg-2">

            <form action="{{ route('queries.update', $queries->id) }}" method="POST">

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
                                    {{ $queries->patientId == $patient->id ? 'selected' : '' }}>

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
                                    {{ $queries->doctorId == $doctor->id ? 'selected' : '' }}>

                                        {{ $doctor->name }}

                                    </option>
                                @endforeach

                            </select>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Tipo de consulta -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tipo de Consulta</label>
                            <select name="queriestypeId" class="form-control">
                                @foreach($queriesTypes as $type)

                                    <option value="{{ $type->id }}"
                                    {{ $queries->queriestypeId == $type->id ? 'selected' : '' }}>

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

                            <input type="date"
                            name="date"
                            class="form-control"
                            value="{{ $queries->date }}">

                        </div>

                    </div>
                </div>
                <div class="row">
                    <!-- Hora -->
                    <div class="col-md-6">

                        <div class="form-group">

                            <label>Hora</label>

                            <input type="time"
                            name="time"
                            class="form-control"
                            value="{{ $queries->time }}">

                        </div>

                    </div>

                    <!-- Status -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="agendada"
                                {{ $queries->status == 'agendada' ? 'selected' : '' }}>
                                    Agendada
                                </option>
                                <option value="concluida"
                                {{ $queries->status == 'concluida' ? 'selected' : '' }}>
                                    Concluída
                                </option>
                                <option value="cancelada"
                                {{ $queries->status == 'cancelada' ? 'selected' : '' }}>
                                    Cancelada
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">

                    <label>Motivo</label>

                    <textarea name="reason"
                    class="form-control">{{ $queries->reason }}</textarea>

                </div>
                <div class="form-group">

                    <label>Observação</label>

                    <textarea name="observation"
                    class="form-control">{{ $queries->observation }}</textarea>

                </div>

                <div class="text-center">

                    <button class="btn btn-primary">
                        Atualizar Consulta
                    </button>
                </div>



            </form>


        </div>

    </div>

</div>


@endsection
