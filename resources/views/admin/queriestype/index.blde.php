@extends('layout.admin.main')
@section('content')

    <div class="content">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title">Tipos de Consulta</h4>
            </div>
            <div class="col-sm-8 col-9 text-right m-b-20">
                <a href="{{ route('querytype.create') }}" class="btn btn btn-primary btn-rounded float-right">
                    <i class="fa fa-plus"></i> Adicionar Tipo de Consulta
                </a>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                {{ session('success') }}
            </div>
        @endif

        @if (session('success_delete'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                {{ session('success_delete') }}
            </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tipo de Consulta</th>
                                <td>Consulta de retorno</td>
                                <td>Cardiologia</td>
                                <td>Consulta geral</td>
                                <td>Pediatria</td>
                                <td>Obstretia</td>
                                <td>Ortopedia</td>
                                <td>Dermatologia</td>
                                <td>Psiquiatria</td>
                                <td>Ofitamologia</td>
                                <td>Neurologia</td>
                                <td>Uronologia</td>
                                <td>Emergencia</td>

                                <th class="text-right">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($querytypes as $querytype)
                                <tr>
                                    <td>{{ $querytype->id }}</td>
                                     <td>{{ $querytype->general_consultation }}</td>
                                       <td>{{ $querytype->routine_consultation }}</td>
                                       <td>{{ $queriestype->cardiology }}</td>
                                        <td>{{ $querytype->pediatrecs }}</td>
                                         <td>{{ $queriestype->obstetrecs}}</td>
                                         <td>{{ $queriestype->gynecology}}</td>
                                        <td>{{ $queriestype->orthopidecs }}</td>
                                        <td>{{ $queriestype->dermatology }}</td>
                                        <td>{{ $queriestype->psychiatry }}</td>
                                         <td>{{ $queriestype->ophthalmology }}</td>
                                         <td>{{ $queriestype->neurology }}</td>
                                         <td>{{ $queriestype->emergency }}</td>

                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="{{ route('querytype.edit', $querytype->id) }}">
                                                    <i class="fa fa-pencil m-r-5"></i> Editar
                                                </a>
                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                    data-target="#delete_queries_type_{{ $querytype->id }}">
                                                    <i class="fa fa-trash-o m-r-5"></i> Apagar
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Modal de confirmação de eliminação (um por linha, id único) -->
                                <div id="delete_queries_type_{{ $querytype->id }}" class="modal fade delete-modal" role="dialog">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body text-center">
                                                <h3>Tens a certeza que queres apagar este tipo de consulta?</h3>
                                                <div class="m-t-20">
                                                    <a href="#" class="btn btn-white" data-dismiss="modal">Fechar</a>
                                                    <form action="{{ route('querytype.delete', $querytype->id) }}"
                                                        method="POST" style="display:inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Apagar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">Nenhum tipo de consulta cadastrado.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
