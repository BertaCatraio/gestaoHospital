@extends('layout.admin.main')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title">Lista dos Enfermeiros</h4>
                @if (session('success'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert"
                        style="width: 900px; font-size: 12px;">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                    </div>
                @endif
            </div>
            <div class="col-sm-8 col-9 text-right m-b-20">
                <a href="/nurse/create" class="btn btn-primary btn-rounded float-right">
                    <i class="fa fa-plus"></i> Cadastrar Enfermeiro
                </a>
            </div>
        </div>
        <div class="row nurse-grid">
            @forelse ($nurses as $nurse)
                <div class="col-md-4 col-sm-4 col-lg-3">
                    <div class="profile-widget">
                        <div class="nurse-img">
                            <a class="avatar" href="#">
                                @if($nurse->photo)
                                    <img alt="" src="{{ asset($nurse->photo) }}">
                                @else
                                    <img alt="" src="{{ asset('img/default-avatar.png') }}">
                                @endif
                            </a>
                        </div>
                        <div class="dropdown profile-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fa fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ route('nurse.edit', $nurse->id) }}">
                                    <i class="fa fa-pencil m-r-5"></i> Editar
                                </a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_nurse"
                                    onclick="document.getElementById('delete-form').action='{{ route('nurse.delete', $nurse->id) }}'">
                                    <i class="fa fa-trash-o m-r-5"></i> Apagar
                                </a>
                                <a class="dropdown-item" href="{{ route('nurse.show', $nurse->id) }}">
                                    <i class="fa fa-eye m-r-5"></i> Detalhes
                                </a>
                            </div>
                        </div>
                        <h4 class="nurse-name text-ellipsis">{{ $nurse->name }}</h4>
                        <div class="nur-prof">{{ $nurse->specialty }}</div>
                        <div class="user-country">
                            <i class="fa fa-map-marker"></i> {{ $nurse->address }}
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p>Nenhum Enfermeiro encontrado</p>
                </div>
            @endforelse
        </div>
    </div>
    <div class="modal fade" id="delete_nurse" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmar Apagar</h5>
                </div>
                <div class="modal-body">
                    <p>Tens a certeza que queres apagar este enfermeiro?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <form id="delete-form" action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Apagar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection