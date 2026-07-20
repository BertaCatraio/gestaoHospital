@extends('layout.admin.main')
@section('title', 'Paciete')
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
                <h4 class="page-title">Paciente</h4>
            </div>
            <div class="col-sm-8 col-9 text-right m-b-20">
                <a href="/patient/create" class="btn btn-primary btn-rounded float-right">
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
                                <th>Telefone</th>
                                <th>Endereço</th>
                                <th>acompanhante</th>
                                <th>Telefone acompanhate</th>
                                <th>Data de inscrição</th>
                                <th>Género</th>
                                <th>Acção</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($patients as $patient)
                            <tr>
                                <td>{{ $patient->name }}</td>
                                <td>{{ $patient->age }}</td>
                                <td>{{ $patient->phone }}</td>
                                <td>{{ $patient->companion}}</td>
                                <td>{{ $patient->companion_phone }}</td>
                                <td>{{ $patient->registrationDate }}</td>
                                <td>{{ $patient->address }}</td>
                                <td>{{ $patient->gender }}</td>
                                <td>
                                    <a href="{{ route('patient.edit', $patient->id) }}" class="btn btn-sm btn-primary">
                                        <i class="fa fa-edit"></i> Editar
                                    </a>
                                    <a href="{{ route('patient.show', $patient->id) }}" class="btn btn-sm btn-info">
                                        <i class="fa fa-eye"></i> Detalhes
                                    </a>
                                    <form action="{{ route('patient.delete', $patient->id) }}"
                                          method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Tem a certeza que quer apagar {{ $patient->name }}?')">
                                            <i class="fa fa-trash"></i> Apagar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">Nenhum paciente encontrado</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
