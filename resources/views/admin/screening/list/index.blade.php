@extends('layout.admin.main')
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
                <h4 class="page-title">Triagem</h4>
            </div>
            <div class="col-sm-8 col-9 text-right m-b-20">
                <a href="/screening/create" class="btn btn-primary btn-rounded float-right">
                    <i class="fa fa-plus"></i>Nova Triagem
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-border table-striped custom-table datatable mb-0">
                        <thead>
                            <tr>
                                <th>Temperatura(C)</th>
                                <th>Peso(Kg)</th>
                                <th>Batimento Cardiaco(pbm)</th>
                                <th>Pressão Arterial(mmhg)</th>
                                <th>Observação</th>
                                <th>Acção</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($screening as $screening)
                            <tr>
                                <td>{{ $screening->temperature }}</td>
                                <td>{{ $screening->weight }}</td>
                               <td>{{ $screening->heartbeat }}</td>
                               <td>{{ $screening->bood_pressure }}</td>
                                <td>{{ $screening->observation }}</td>
                                <td>
                                    <a href="{{ route('screening.edit', $screening->id) }}" class="btn btn-sm btn-primary">
                                        <i class="fa fa-edit"></i> Editar
                                    </a>
                                    <form action="{{ route('screening.delete', $screening->id) }}" 
                                          method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Tem a certeza que quer apagar?')">
                                            <i class="fa fa-trash"></i> Apagar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">Nenhuma triagem encontrada</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection