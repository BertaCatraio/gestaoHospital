@extends('layout.admin.main')
@section('content')
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Editar Paciente</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                  <form action="{{ route('patient.update', $patient->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nome <span class="text-danger">*</span></label>
                                        <input type="text" name="name" value="{{ $patient->name }}" class="form-control">
                                    </div>
                                </div>                            
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Idade</label>
                                        <div class="cal-icon">
                                            <input type="text" name="age" value="{{ $patient->age }}" class="form-control datetimepicker">
                                        </div>
                                    </div>
                                </div>	
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Endereço</label>
                                        <input class="form-control" value="{{ $patient->address }}" type="text" name="address">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Telefone</label>
                                        <input class="form-control" value="{{ $patient->phone }}" type="text" name="phone">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Genero</label>
                                        <input class="form-control" value="{{ $patient->gender }}" type="text" name="gender">
                                    </div>
                                </div>

                            <div class="m-t-20 text-center">
                               <input type="submit" class="btn btn-primary submit-btn" value="actualizar"> 																	
                            </div>
                        </form>
                    </div>
                </div>
            </div>
@endsection