@extends('layout.admin.main')
@section('title', 'doctor')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h4 class="page-title">Cadastro de Doctores</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <form action ="{{ route('doctor.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nome <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="name" placeholder="Nome">
                            </div>

                            <div class="form-group">
                                <label>Espcialidade</label>
                                <input class="form-control" type="text" name="specialty" placeholder="Especialidade">
                            </div>
                                  <div class="form-group">
                                        <label>Endereço</label>
                                        <input type="text" class="form-control" name="address" placeholder="Endereço">
                                    </div>
                            <div class="form-group">
                                <label>Telefone</label>
                                <input class="form-control" type="text" name="phone" placeholder="Telefone">
                            </div>
                        <div class="form-group">
                            <label>Idade</label>
                            <input class="form-control" type="text" name="age" placeholder="Idade">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="email" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Educação</label>
                            <input class="form-control" type="text" name="education" placeholder="educacao">
                        </div>
                        <div class="form-group">
                            <label>Experiencia</label>
                            <input class="form-control" type="text" name="experience" placeholder="Experiencia">
                        </div>
                        <div class="form-group">
                            <label>Biografia</label>
                            <textarea name="biography" id="biography" class="form-control" rows="3" cols="30"></textarea>
                        </div>
                        <div class="m-t-20 text-center">
                            <a href="/doctor" class="btn btn-secondary m-r-10">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Cadastrar Doctor</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
