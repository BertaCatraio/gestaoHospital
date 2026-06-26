@extends('layout.admin.main')
@section('content')
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Editar Triagem</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                  <form action="{{ route('screening.update', $screening->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Temperatura<span class="text-danger">*</span></label>
                                        <input type="text" name="temperature" value="{{ $screening->temperature}}" class="form-control">
                                    </div>
                                </div>                            
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Peso</label>
                                        <div class="cal-icon">
                                            <input type="number" name="weight" value="{{ $screening->weight }}" class="form-control datetimepicker">
                                        </div>
                                    </div>
                                </div>	
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Batimento Cardico</label>
                                        <input class="form-control" value="{{ $screening->hearbeat }}" type="text" name="hearbeat">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Observação</label>
                                        <input class="form-control" value="{{ $screening->observation }}" type="text" name="observation">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Pressão Arterial</label>
                                        <input class="form-control" value="{{ $screening->blood_pressure }}" type="text" name="blood_pressure">
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