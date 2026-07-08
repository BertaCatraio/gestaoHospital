@extends('layout.admin.main')

@section('content')

<div class="content">
    <div class="row">
        <div class="col-sm-4 col-3">
            <h4 class="page-title">Tipos de Consulta</h4>
        </div>

        <div class="col-sm-8 col-9 text-right m-b-20">
            <a href="{{ route('queriestype.create') }}" class="btn btn-primary btn-rounded float-right">
                <i class="fa fa-plus"></i> Adicionar Tipo de Consulta
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session('success') }}
        </div>
    @endif

    @if(session('success_delete'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session('success_delete') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">

                <table class="table table-striped custom-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th class="text-right">Ação</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($queriestypes as $queriestype)

                        <tr>

                            <td>{{ $queriestype->id }}</td>
                            <td>{{ $queriestype->name }}</td>
                            <td class="text-right">
                                <div class="dropdown dropdown-action">

                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right">

                                        <a class="dropdown-item"
                                            href="{{ route('queriestype.edit', $queriestype->id) }}">
                                            <i class="fa fa-pencil m-r-5"></i> Editar
                                        </a>

                                        <a class="dropdown-item"
                                            href="#"
                                            data-toggle="modal"
                                            data-target="#delete_{{ $queriestype->id }}">
                                            <i class="fa fa-trash-o m-r-5"></i> Apagar
                                        </a>

                                    </div>

                                </div>
                            </td>

                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="delete_{{ $queriestype->id }}">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">

                                    <div class="modal-body text-center">

                                        <h4>Tem certeza que deseja apagar este tipo de consulta?</h4>

                                        <div class="mt-3">

                                            <button class="btn btn-secondary" data-dismiss="modal">
                                                Cancelar
                                            </button>

                                            <form action="{{ route('queriestype.delete', $queriestype->id) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')

                                                <button class="btn btn-danger">
                                                    Apagar
                                                </button>

                                            </form>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                        @empty

                        <tr>
                            <td colspan="15" class="text-center">
                                Nenhum tipo de consulta encontrado.
                            </td>
                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>
        </div>
    </div>

</div>

@endsection
