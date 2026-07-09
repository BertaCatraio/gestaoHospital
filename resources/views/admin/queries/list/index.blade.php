@extends('layout.admin.main')
@section('content')
        <div class="page-wrapper">
            <div class="content">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title mb-0">Consultas</h4>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="{{ route('queries.create') }}" class="btn btn-primary btn-rounded">
                            <i class="fa fa-plus"></i> Nova Consulta
                        </a>
                    </div>
                </div>

                @if(session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ session('success') }}
                </div>
                @endif

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-table">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Paciente</th>
                                                <th>Médico</th>
                                                <th>Tipo</th>
                                                <th>Data</th>
                                                <th>Hora</th>
                                                <th>Estado</th>
                                                <th class="text-right">Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($queries as $query)
                                            <tr>
                                                <td>{{ $query->id }}</td>
                                                <td>{{ $query->patient->name ?? '-' }}</td>
                                                <td>{{ $query->doctor->name ?? '-' }}</td>
                                                <td>{{ $query->queriesType->name ?? '-' }}</td>
                                                <td>{{ $query->date }}</td>
                                                <td>{{ $query->time }}</td>
                                                <td>{{ ucfirst($query->status) }}</td>
                                                <td class="text-right">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown">
                                                            <i class="fa fa-ellipsis-v"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="{{ route('queries.edit', $query->id) }}">
                                                                <i class="fa fa-pencil m-r-5"></i> Editar
                                                            </a>
                                                            <form action="{{ route('queries.destroy', $query->id) }}" method="POST" onsubmit="return confirm('Tem a certeza que deseja eliminar esta consulta?');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="dropdown-item">
                                                                    <i class="fa fa-trash-o m-r-5"></i> Eliminar
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="8" class="text-center">Nenhuma consulta registada.</td>
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
        </div>
@endsection
