@extends('layout.admin.main')
@section('content')
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Editar tipo de exame</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                  <form action="{{ route('examtype.update', $examtype->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nome <span class="text-danger">*</span></label>
                                        <input type="text" name="name" value="{{ $examtype->name }}" class="form-control">
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
