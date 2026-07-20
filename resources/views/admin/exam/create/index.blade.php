@extends('layout.admin.main')
@section('title', 'cadastro de exames')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h4 class="page-title">Novo Exame</h4>
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
                <form action="{{ route('exam.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group position-relative">
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

                            <div class="form-group">

                               <div class="col-sm-6">
                                <label>Tipo de Exame</label>
                                <select name="examTypeId" class="form-control select">
                                    <option value="">
                                        Selecione o tipo
                                    </option>
                                    @foreach ($examTypes as $type)
                                        <option value="{{ $type->id }}">
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                                <label>Estado <span class="text-danger">*</span></label>
                                <select name="status" class="form-control select" required>
                                    <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pendente</option>
                                    <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Concluído</option>
                                    <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Cancelado</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Médico <span class="text-danger">*</span></label>
                                <select name="doctorId" class="form-control select" required>
                                    <option value="">Selecione o médico</option>
                                    @foreach($doctors as $doctor)
                                        <option value="{{ $doctor->id }}" {{ old('doctorId') == $doctor->id ? 'selected' : '' }}>
                                            {{ $doctor->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Data do Exame <span class="text-danger">*</span></label>
                                <input type="date" name="exam_date" class="form-control" value="{{ old('exam_date') }}" required>
                            </div>
                            <div class="form-group">
                                <label>Resultado</label>
                                <textarea name="result" id="result" class="form-control" rows="3" cols="30">{{ old('result') }}</textarea>
                            </div>
                            <div class="m-t-20 text-center">
                                <a href="{{ route('exam.index') }}" class="btn btn-secondary m-r-10">Cancelar</a>
                                <button type="submit" class="btn btn-primary">Cadastrar Exame</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    console.log('JS do Exame carregado.');

    $('#patient_search').on('keyup', function() {
        var query = $(this).val();
        console.log('Pesquisando:', query);

        if (query.length < 2) {
            $('#patient_results').empty();
            return;
        }

        $.ajax({
            url: "{{ route('patient.search') }}",
            type: "GET",
            data: { q: query },
            success: function(data) {
                console.log('Resultados:', data);
                $('#patient_results').empty();
                $.each(data, function(i, patient) {
                    $('#patient_results').append(
                        '<a href="#" class="list-group-item list-group-item-action patient-item" data-id="' + patient.id + '" data-name="' + patient.name + '">' + patient.name + '</a>'
                    );
                });
            },
            error: function(xhr) {
                console.log('Erro na pesquisa:', xhr.status, xhr.responseText);
            }
        });
    });

    $(document).on('click', '.patient-item', function(e) {
        e.preventDefault();
        console.log('Paciente clicado:', $(this).data('name'), $(this).data('id'));
        $('#patient_search').val($(this).data('name'));
        $('#patient_id').val($(this).data('id'));
        $('#patient_results').empty();
    });
});
</script>
@endsection
