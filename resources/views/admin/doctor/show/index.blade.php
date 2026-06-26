@extends('layout.admin.main')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title">Perfil do Doctores</h4>
            </div>
            <div class="col-sm-8 col-9 text-right m-b-20">
                <a href="/doctor" class="btn btn-primary btn-rounded float-right">
                    <i class="fa fa-arrow-left"></i> Voltar
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 220px;">Nome</th>
                                <td>{{ $doctor->name }}</td>
                            </tr>
                            <tr>
                                <th>Idade</th>
                                <td>{{ $doctor->age }} anos</td>
                            </tr>
                            <tr>
                                <th>Telefone</th>
                                <td>{{ $doctor->phone }}</td>
                            </tr>
                            <tr>
                                <th>Endereço</th>
                                <td>{{ $doctor->address }}</td>
                            </tr>
                            <tr>
                                <th>Género</th>
                                <td>{{ $doctor->gender }}</td>
                            </tr>
                            <tr>
                                <th>Formação academica</th>
                                <td>{{ $doctor->education }}</td>
                            </tr>
                            <tr>
                                <th>Esperiencia</th>
                                <td>{{ $doctor->experience}}</td>
                            </tr>
                        </table>

                        <div class="m-t-20">
                            <a href="{{ route('doctor.edit', $doctor->id) }}" class="btn btn-primary">
                                <i class="fa fa-edit"></i> Editar
                            </a>
                            <form action="{{ route('doctor.delete', $doctor->id) }}"
                                  method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Tem a certeza que quer apagar {{ $doctor->name }}?')">
                                    <i class="fa fa-trash"></i> Apagar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
