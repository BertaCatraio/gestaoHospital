@extends('layout.admin.main')
@section('title', 'enfermeiros')
@section('content')
    <div class="content">

        @if(session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
            {{ session('success') }}
        </div>
        @endif

        @if(session('success_delete'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
            {{ session('success_delete') }}
        </div>
        @endif

        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title">Enfermeiro</h4>
            </div>
            <div class="col-sm-8 col-9 text-right m-b-20">
                <a href="/nurse/create" class="btn btn-primary btn-rounded float-right">
                    <i class="fa fa-plus"></i> Cadastrar Paciente
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-border table-striped custom-table datatable mb-0">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Idade</th>
                                <th>Género</th>
                                <th>Telefone</th>
                                <th>Endereço</th>
                                <th>Formação</th>
                                <th>Experiencia</th>
                                <th>Especialidade</th>
                                <th>Biografia</th>
                                <th>Email</th>
                                <th>Acção</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($nurses as $nurse)
                            <tr>
                                <td>{{ $nurse->name }}</td>
                                <td>{{ $nurse->age }}</td>
                                <td>{{ $nurse->gender }}</td>
                                <td>{{ $nurse->phone }}</td>
                                <td>{{ $nurse->address}}</td>
                                <td>{{ $nurse->education }}</td>
                                <td>{{ $nurse->specialty}}</td>
                                <td>{{ $nurse->experience }}</td>
                                <td>{{ $nurse->biography }}</td>
                                <td>{{ $nurse->email}}</td>
                                <td>
                                    <a href="{{ route('nurse.edit', $nurse->id) }}" class="btn btn-sm btn-primary">
                                        <i class="fa fa-edit"></i> Editar
                                    </a>
                                    <a href="{{ route('nurse.show', $nurse->id) }}" class="btn btn-sm btn-info">
                                        <i class="fa fa-eye"></i> Detalhes
                                    </a>
                                    <form action="{{ route('nurse.delete', $nurse->id) }}"
                                          method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Tem a certeza que quer apagar {{ $nurse->name }}?')">
                                            <i class="fa fa-trash"></i> Apagar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">Nenhum enfermeiro encontrado</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
