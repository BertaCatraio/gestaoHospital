@extends('layout.admin.main')
@section('content')
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Adicionar consulta</h4>
                    </div>
                </div>
                @if(session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ session('success') }}
                </div>
                @endif

                @if($errors->any())
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="{{ route('queries.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Paciente</label>
                                        <select name="patient_id" class="form-control select">
                                            <option value="">Selecione</option>
                                            @foreach($patients as $patient)
                                                <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tipo de Consulta</label>
                                        <select name="queriestypeId" class="form-control select">
                                            <option value="">Selecione</option>
                                            @foreach($queriestypes as $queriestype)
                                                <option value="{{ $queriestype->id }}">{{ $queriestype->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Médico</label>
                                        <select name="doctor_id" class="form-control select">
                                            <option value="">Selecione</option>
                                            @foreach($doctors as $doctor)
                                                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Estado da Consulta</label>
                                        <select name="status" class="form-control select">
                                            <option value="agendada" selected>Agendada</option>
                                            <option value="concluida">Concluída</option>
                                            <option value="cancelada">Cancelada</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Data</label>
                                        <div class="cal-icon">
                                            <input type="date" name="date" class="form-control datetimepicker">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Horário</label>
                                        <div class="time-icon">
                                            <input type="time" name="time" class="form-control" id="datetimepicker3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Motivo da consulta</label>
                                <textarea name="reason" cols="30" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Observação</label>
                                <textarea name="observation" cols="30" rows="4" class="form-control"></textarea>
                            </div>
                            <div class="m-t-20 text-center">
                                <button type="submit" class="btn btn-primary submit-btn">Cadastrar nova Consulta</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
