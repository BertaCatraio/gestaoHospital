@extends('layout.admin.main')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Editar Doctor</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form action="/doctor/update/{{ $doctor->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nome<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="name" value="{{ $doctor->name }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Telefone</label>
                            <input class="form-control" type="text" name="phone" value="{{ $doctor->phone }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Genero</label>
                            <input class="form-control" type="text" name="gender" value="{{ $doctor->gender }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Endereço</label>
                            <input type="text" class="form-control" name="address" value="{{ $doctor->address }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Especialidade</label>
                            <input type="text" class="form-control" name="specialty" value="{{ $doctor->specialty }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Formação</label>
                            <input type="text" class="form-control" name="education" value="{{ $doctor->education }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Experiência</label>
                            <input type="text" class="form-control" name="experience" value="{{ $doctor->experience }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $doctor->email }}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Biografia</label>
                    <textarea class="form-control" rows="3" name="biography">{{ $doctor->biography }}</textarea>
                </div>
                <div class="m-t-20 text-center">
                    <button class="btn btn-primary submit-btn">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
