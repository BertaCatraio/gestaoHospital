@extends('layout.admin.main')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title">Perfil do Paciente</h4>
            </div>
            <div class="col-sm-8 col-9 text-right m-b-20">
                <a href="/patient" class="btn btn-primary btn-rounded float-right">
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
                                <td>{{ $patient->name }}</td>
                            </tr>
                            <tr>
                                <th>Idade</th>
                                <td>{{ $patient->age }} anos</td>
                            </tr>
                            <tr>
                                <th>Telefone</th>
                                <td>{{ $patient->phone }}</td>
                            </tr>
                            <tr>
                                <th>Endereço</th>
                                <td>{{ $patient->address }}</td>
                            </tr>
                            <tr>
                                <th>Género</th>
                                <td>{{ $patient->gender }}</td>
                            </tr>
                            <tr>
                                <th>Diagnóstico</th>
                                <td>{{ $patient->diagonosis }}</td>
                            </tr>
                            <tr>
                                <th>Histórico Médico</th>
                                <td>{{ $patient->medicalHistory }}</td>
                            </tr>
                            <tr>
                                <th>Internado</th>
                                <td>{{ $patient->hospitalized }}</td>
                            </tr>
                            <tr>
                                <th>Médico Assistente</th>
                                <td>{{ $patient->attendingDoctor }}</td>
                            </tr>
                            <tr>
                                <th>Data de Registo</th>
                                <td>{{ $patient->registrationDate }}</td>
                            </tr>
                            <tr>
                                <th>Médico</th>
                                <td>{{ $patient->doctor->name ?? 'Não atribuído' }}</td>
                            </tr>
                        </table>

                        <div class="m-t-20">
                            <a href="{{ route('patient.edit', $patient->id) }}" class="btn btn-primary">
                                <i class="fa fa-edit"></i> Editar
                            </a>
                            <form action="{{ route('patient.delete', $patient->id) }}" 
                                  method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Tem a certeza que quer apagar {{ $patient->name }}?')">
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