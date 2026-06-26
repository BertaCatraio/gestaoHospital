@extends('layout.admin.main')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Editar Enfermeiro</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">

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

            <form action="{{ route('nurse.update', $nurse->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nome <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="name" value="{{ $nurse->name }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Especialidade</label>
                            <input type="text" class="form-control" name="specialty" value="{{ $nurse->specialty }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Telefone</label>
                            <input class="form-control" type="text" name="phone" value="{{ $nurse->phone }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Endereço</label>
                            <input type="text" class="form-control" name="address" value="{{ $nurse->address }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $nurse->email }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Género</label>
                            <select name="gender" class="form-control">
                                <option value="Masculino" {{ $nurse->gender == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                                <option value="Feminino" {{ $nurse->gender == 'Feminino' ? 'selected' : '' }}>Feminino</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Foto</label>
                            <div class="profile-upload">
                                <div class="upload-img">
                                    @if($nurse->photo)
                                        <img alt="" src="{{ asset('storage/' . $nurse->photo) }}" width="80" height="80" style="border-radius:50%; object-fit:cover;">
                                    @else
                                        <img alt="" src="{{ asset('img/default-avatar.png') }}" width="80">
                                    @endif
                                </div>
                                <div class="upload-input">
                                    <input type="file" class="form-control" name="photo" accept="image/*">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-t-20 text-center">
                    <a href="/nurse" class="btn btn-secondary m-r-10">Cancelar</a>
                    <button class="btn btn-primary submit-btn">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection