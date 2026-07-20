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
                                <label>Paciente <span class="text-danger">*</span></label>
                                <input type="text" id="patient_search" class="form-control" placeholder="Pesquisar paciente..." autocomplete="off" value="{{ old('patient_name') }}">
                                <input type="hidden" name="patientId" id="patient_id" value="{{ old('patientId') }}">
                                <div id="patient_results" class="list-group position-absolute w-100" style="z-index:1000;"></div>
                            </div>

                            <div class="form-group position-relative">
                                <label>Tipo de Exame <span class="text-danger">*</span></label>
                                <input type="text" id="examtype_search" class="form-control" placeholder="Pesquisar tipo de exame..." autocomplete="off" value="{{ old('examtype_name') }}">
                                <input type="hidden" name="examTypeId" id="examtype_id" value="{{ old('examTypeId') }}">
                                <div id="examtype_results" class="list-group position-absolute w-100" style="z-index:1000;"></div>
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
                            <div class="form-group position-relative">
                                <label>Médico <span class="text-danger">*</span></label>
                                <input type="text" id="doctor_search" class="form-control" placeholder="Pesquisar médico..." autocomplete="off" value="{{ old('doctor_name') }}">
                                <input type="hidden" name="doctorId" id="doctor_id" value="{{ old('doctorId') }}">
                                <div id="doctor_results" class="list-group position-absolute w-100" style="z-index:1000;"></div>
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

    function setupSearch(inputId, resultsId, hiddenId, routeUrl) {
        $('#' + inputId).on('keyup', function() {
            var term = $(this).val();
            $('#' + hiddenId).val('');

            if (term.length < 2) {
                $('#' + resultsId).empty();
                return;
            }

            $.ajax({
                url: routeUrl,
                type: "GET",
                data: { term: term },
                success: function(data) {
                    $('#' + resultsId).empty();
                    if (data.length === 0) {
                        $('#' + resultsId).append('<span class="list-group-item text-muted">Nenhum resultado encontrado</span>');
                        return;
                    }
                    $.each(data, function(i, item) {
                        $('#' + resultsId).append(
                            '<a href="#" class="list-group-item list-group-item-action search-item" data-target-input="' + inputId + '" data-target-hidden="' + hiddenId + '" data-target-results="' + resultsId + '" data-id="' + item.id + '" data-name="' + item.name + '">' + item.name + '</a>'
                        );
                    });
                },
                error: function(xhr) {
                    console.log('Erro na pesquisa (' + inputId + '):', xhr.status, xhr.responseText);
                }
            });
        });
    }

    setupSearch('patient_search', 'patient_results', 'patient_id', "{{ route('patient.search') }}");
    setupSearch('doctor_search', 'doctor_results', 'doctor_id', "{{ route('doctor.search') }}");
    setupSearch('examtype_search', 'examtype_results', 'examtype_id', "{{ route('examtype.search') }}");

    $(document).on('click', '.search-item', function(e) {
        e.preventDefault();
        var inputId = $(this).data('target-input');
        var hiddenId = $(this).data('target-hidden');
        var resultsId = $(this).data('target-results');

        $('#' + inputId).val($(this).data('name'));
        $('#' + hiddenId).val($(this).data('id'));
        $('#' + resultsId).empty();
    });

    $(document).on('click', function(e) {
        if (!$(e.target).closest('.position-relative').length) {
            $('.list-group.position-absolute').empty();
        }
    });
});
</script>
@endsection
