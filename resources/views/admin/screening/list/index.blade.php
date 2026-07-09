@extends('layout.admin.main')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="page-title">Lista de Triagens</h4>

            </div>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                        {{ session('error') }}
                    </div>
                @endif

                <div class="card rounded shadow-sm" style="border-radius: 12px;">
                    <div class="card-header">
                        <a href="{{ route('screening.create') }}" class="btn btn-primary float-right" title="Nova Triagem">
                            <i class="fa fa-plus"></i> Nova Triagem
                        </a>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-hover table-striped" id="tableScreening">
                                <thead>
                                    <tr>
                                        <th>Paciente</th>
                                        <th>Temperatura (Cº)</th>
                                        <th>Peso (Kg)</th>
                                        <th>Batimento (bpm)</th>
                                        <th>Pressão Arterial (mmHg)</th>
                                        <th>Observação</th>
                                        <th>Data</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($screening as $screening)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $screening->patient->name ?? 'N/D' }}</td>
                                            <td>{{ $screening->temperature }}</td>
                                            <td>{{ $screening->weight }}</td>
                                            <td>{{ $screening->heartbeat }}</td>
                                            <td>{{ $screening->blood_pressure }}</td>
                                            <td>{{ Str::limit($screening->observation, 30) }}</td>
                                            <td>{{ \Carbon\Carbon::parse($screening->created_at)->format('d/m/Y H:i') }}</td>
                                            <td>
                                                <a href="{{ route('screening.show', $screening->id) }}"
                                                    class="btn btn-sm btn-info" title="Ver">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="{{ route('screening.edit', $screening->id) }}"
                                                    class="btn btn-sm btn-warning" title="Editar">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <button type="button" class="btn btn-sm btn-danger"
                                                    data-toggle="modal" data-target="#deleteModal"
                                                    data-action="{{ route('screening.destroy', $screening->id) }}"
                                                    title="Eliminar">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9" class="text-center">Nenhuma triagem registada.</td>
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
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h5 class="modal-title">Confirmar Eliminação</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Tem a certeza que deseja eliminar esta triagem? Esta ação não pode ser revertida.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tableScreening').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Portuguese-Brasil.json'
                }
            });

            $('#deleteModal').on('show.bs.modal', function(e) {
                let action = $(e.relatedTarget).data('action');
                $('#deleteForm').attr('action', action);
            });
        });
    </script>
@endsection
