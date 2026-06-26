@extends('layout.admin.main')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h4 class="page-title">Cadastrar Paciente</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 offset-lg-2">

                @if($errors->any())
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('patient.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nome <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Idade <span class="text-danger">*</span></label>
                                <input type="number" name="age" class="form-control" value="{{ old('age') }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Telefone <span class="text-danger">*</span></label>
                                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Endereço <span class="text-danger">*</span></label>
                                <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <!--option tag para opcao ou selação-->
                                <label>Género <span class="text-danger">*</span></label>
                                <select name="gender" class="form-control">
                                    <option value="">Seleccione</option>
                                    <option value="Masculino" {{ old('gender') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                                    <option value="Feminino" {{ old('gender') == 'Feminino' ? 'selected' : '' }}>Feminino</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Acompanhate <span class="text-danger">*</span></label>
                                <input type="text" name="companion" class="form-control" value="{{ old('companion') }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Telefone acompanhante <span class="text-danger">*</span></label>
                                <input type="number" name="companion_phone" class="form-control" value="{{ old('companion_phone') }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Data de Registo</label>
                                <input type="date" name="registrationDate" class="form-control" value="{{ old('registrationDate') }}">
                            </div>
                        </div>
                        <!--
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Médico Responsável <span class="text-danger">*</span></label>
                                <select name="doctor_id" class="form-control">
                                    <option value="">Seleccione o Médico</option>
                                    @foreach($doctors as $doctor)
                                        <option value="{{ $doctor->id }}" {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>
                                            {{ $doctor->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Médico Assistente</label>
                                <input type="text" name="attendingDoctor" class="form-control" value="{{ old('attendingDoctor') }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Data de Registo</label>
                                <input type="date" name="registrationDate" class="form-control" value="{{ old('registrationDate') }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Internado</label>
                                <select name="hospitalized" class="form-control">
                                    <option value="Não" {{ old('hospitalized') == 'Não' ? 'selected' : '' }}>Não</option>
                                    <option value="Sim" {{ old('hospitalized') == 'Sim' ? 'selected' : '' }}>Sim</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Diagnóstico</label>
                                <textarea name="diagonosis" class="form-control" rows="3">{{ old('diagonosis') }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Histórico Médico</label>
                                <textarea name="medicalHistory" class="form-control" rows="3">{{ old('medicalHistory') }}</textarea>
                            </div>
                        </div>
                        -->
                    </div>

                    <div class="m-t-20 text-center">
                        <a href="/patient" class="btn btn-secondary m-r-10">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Cadastrar Paciente</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
