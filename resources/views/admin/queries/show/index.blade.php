@extends('layout.admin.main')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title">Ver Consulta</h4>
            </div>
            <div class="col-sm-8 col-9 text-right m-b-20">
                <a href="/queries" class="btn btn-primary btn-rounded float-right">
                    <i class="fa fa-arrow-left"></i> Voltar
                </a>
            </div>
        </div>
        <table class="table table-bordered">

            <tr>
                <th>ID</th>
                <td>{{ $queries->id }}</td>
            </tr>
        
            <tr>
                <th>Paciente</th>
                <td>{{ $queries->patient->name ?? 'Sem paciente' }}</td>
            </tr>
        
            <tr>
                <th>Médico</th>
                <td>{{ $queries->doctor->name ?? 'Sem médico' }}</td>
            </tr>
        
            <tr>
                <th>Tipo de Consulta</th>
                <td>{{ $queries->queries_type }}</td>
            </tr>
        
            <tr>
                <th>Data</th>
                <td>{{ $queries->date }}</td>
            </tr>
        
            <tr>
                <th>Hora</th>
                <td>{{ $queries->time }}</td>
            </tr>
        
            <tr>
                <th>Estado</th>
                <td>{{ $queries->status }}</td>
            </tr>
        
            <tr>
                <th>Observações</th>
                <td>{{ $queries->observation }}</td>
            </tr>
        
        </table>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                     
                        <div class="m-t-20">
                            <a href="{{ route('queries.edit', $queries->id) }}" class="btn btn-primary">
                                <i class="fa fa-edit"></i> Editar
                            </a>
                            <form action="{{ route('queries.delete', $queries->id) }}" 
                                  method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Tem a certeza que quer apagar {{ $queries->name }}?')">
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















































<table class="table table-bordered">

    <tr>
        <th>ID</th>
        <td>{{ $queries->id }}</td>
    </tr>

    <tr>
        <th>Paciente</th>
        <td>{{ $queries->patient->name ?? 'Sem paciente' }}</td>
    </tr>

    <tr>
        <th>Médico</th>
        <td>{{ $queries->doctor->name ?? 'Sem médico' }}</td>
    </tr>

    <tr>
        <th>Tipo de Consulta</th>
        <td>{{ $queries->queries_type }}</td>
    </tr>

    <tr>
        <th>Data</th>
        <td>{{ $queries->date }}</td>
    </tr>

    <tr>
        <th>Hora</th>
        <td>{{ $queries->time }}</td>
    </tr>

    <tr>
        <th>Estado</th>
        <td>{{ $queries->status }}</td>
    </tr>

    <tr>
        <th>Observações</th>
        <td>{{ $queries->observation }}</td>
    </tr>

</table>