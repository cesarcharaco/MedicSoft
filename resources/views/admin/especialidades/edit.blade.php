@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        Especialidades
        <small>Actualización</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Especialidades</a></li>
        <li class="active">Actualizando</li>
    </ol>
</section>
<div class="container">
    <div class="row">
        <div class="col-xs-11">
            @include('alerts.requests')
            @include('flash::message')
            <div class="panel panel-default">
                <div class="panel-heading">Actualización de datos de la Especialidad<br>
                Los campos con (<strong>*</strong>) son obligatorios</div>

                <div class="panel-body">
                   {!! Form::open(['route' => ['especialidades.update',$especialidad->id], 'method' => 'put']) !!}
    
                         @include('admin.especialidades.partials.edit-fields')
                        <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                        <a class="btn btn-danger pull-right btn-flat" href="{{ url('admin/especialidades')}}"><i class="fa fa-times"></i> Cancelar</a>
                      </div>
                    {!! Form::close() !!} 
                        <!-- /.form-group -->
                </div>
            </div>
                
        </div>
    </div>
</div>

@endsection