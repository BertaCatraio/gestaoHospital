@extends('layout.admin.main')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-lg-12 offset-lg-3">
                    <h4 class="page-title">Adicionar tipo de consulta</h4>
                </div>
            </div>
                  @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('queriestype.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Nome do Tipo de Consulta <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Ex: Cardiologia, Pediatria, Consulta Geral..."
                                        value="{{ old('name') }}">
                                </div>
                            </div>
                        </div>

                        <div class="m-t-20 text-center">
                            <a href="{{ route('queriestype.index') }}" class="btn btn-secondary m-r-10">Cancelar</a>
                            <button type="submit" class="btn btn-primary submit-btn">Criar Tipo de Consulta</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
