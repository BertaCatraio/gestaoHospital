@extends('layout.admin.main')
@section('title', 'Criar triagem')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h4 class="page-title">Nova Triagem</h4>

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
                            <div class="form-group position-relative">
                                <label>Paciente <span class="text-danger">*</span></label>
                                <input type="text" id="patient_search" class="form-control"
                                    placeholder="Digite o nome do paciente..." autocomplete="off"
                                    value="{{ old('patient_name') }}">
                                <input type="hidden" name="patient_id" id="patient_id"
                                    value="{{ old('patient_id') }}">
                                <div id="patient_results" class="list-group position-absolute w-100"
                                    style="z-index: 1000;"></div>
                            </div>

                            <div class="form-group">
                                <label>Temperatura (Cº) <span class="text-danger">*</span></label>
                                <input type="number" step="0.1" name="temperature" class="form-control"
                                    placeholder="Temperatura" value="{{ old('temperature') }}">
                            </div>

                            <div class="form-group">
                                <label>Peso (Kg) <span class="text-danger">*</span></label>
                                <input type="number" step="0.1" name="weight" class="form-control"
                                    placeholder="Peso" value="{{ old('weight') }}">
                            </div>

                            <div class="form-group">
                                <label>Data</label>
                                <input type="date" name="date" class="form-control" value="{{ old('date') }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Batimento Cardíaco (bpm) <span class="text-danger">*</span></label>
                                <input type="number" name="heartbeat" class="form-control"
                                    placeholder="Batimento Cardíaco" value="{{ old('heartbeat') }}">
                            </div>

                            <div class="form-group">
                                <label>Pressão Arterial (mmHg) <span class="text-danger">*</span></label>
                                <input type="text" name="blood_pressure" class="form-control"
                                    placeholder="Pressão Arterial" value="{{ old('blood_pressure') }}">
                            </div>

                            <div class="form-group">
                                <label>Observação</label>
                                <textarea name="observation" class="form-control" rows="3" placeholder="Obs:">{{ old('observation') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="m-t-20 text-center">
                        <a href="{{ route('screening.index') }}" class="btn btn-secondary m-r-10">Cancelar</a>
                        <button type="submit" class="btn btn-primary submit-btn">Cadastrar Triagem</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {

            $('#patient_search').on('keyup', function() {
                let term = $(this).val();
                $('#patient_id').val('');

                if (term.length < 2) {
                    $('#patient_results').empty();
                    return;
                }

                $.get("{{ route('patient.search') }}", { term: term }, function(data) {
                    let html = '';

                    if (data.length === 0) {
                        html = '<span class="list-group-item text-muted">Nenhum paciente encontrado</span>';
                    }

                    data.forEach(function(patient) {
                        html += `<a href="#" class="list-group-item patient-item" data-id="${patient.id}" data-name="${patient.name}">${patient.name}</a>`;
                    });

                    $('#patient_results').html(html);
                });
            });

            $(document).on('click', '.patient-item', function(e) {
                e.preventDefault();
                $('#patient_search').val($(this).data('name'));
                $('#patient_id').val($(this).data('id'));
                $('#patient_results').empty();
            });

            $(document).on('click', function(e) {
                if (!$(e.target).closest('#patient_search, #patient_results').length) {
                    $('#patient_results').empty();
                }
            });

        });
    </script>
@endsection
