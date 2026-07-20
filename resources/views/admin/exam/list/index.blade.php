@extends('layout.admin.main')
@section('title', 'lista de exame')
@section('content')
<div class="content">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Exames</h3>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-end mb-3">
                        <a href="{{ route('exam.create') }}" class="btn btn-primary" style="border-radius: 20px;">
                            <i class="fa fa-plus"></i> Novo Exame
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-border table-striped custom-table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Paciente</th>
                                    <th>Médico</th>
                                    <th>Tipo de Exame</th>
                                    <th>Data</th>
                                    <th>Estado</th>
                                    <th class="text-right">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($exams as $exam)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $exam->patient->name ?? '-' }}</td>
                                    <td>{{ $exam->doctor->name ?? '-' }}</td>
                                    <td>{{ $exam->examtype->name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($exam->exam_date)->format('d/m/Y') }}</td>
                                    <td>
                                        @if($exam->status == 'pending')
                                            <span class="badge badge-warning">Pendente</span>
                                        @elseif($exam->status == 'completed')
                                            <span class="badge badge-success">Concluído</span>
                                        @else
                                            <span class="badge badge-danger">Cancelado</span>
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        <a href="{{ route('exam.edit', $exam->id) }}" class="btn btn-sm btn-info">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal{{ $exam->id }}">
                                            <i class="fa fa-trash"></i>
                                        </button>

                                        <div class="modal fade" id="deleteModal{{ $exam->id }}" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <p>Tem a certeza que deseja eliminar este exame?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                        <form action="{{ route('exam.destroy', $exam->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">Nenhum exame encontrado</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
