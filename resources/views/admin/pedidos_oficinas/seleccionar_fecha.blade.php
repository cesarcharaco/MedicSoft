@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        Seleccionando Pedidos de una fecha en específico
        <small>Reporte</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Reporte</a></li>
        <li class="active">Pedidos</li>
    </ol>
</section>
<div class="container">
    <div class="row">
        <div class="col-xs-11">
            @include('alerts.requests')
            @include('flash::message')
            <div class="panel panel-default">
                <div class="panel-heading">Selección de Pedidos para Reporte 

                <div class="panel-body">
                    {!! Form::open(['route' => ['admin.pedidos_oficinas.buscarpedidos'], 'method' => 'post']) !!}
                    <div class="form-group">
                        {!! Form::label('fecha','Seleccione la Fecha de cuando desea generar el Reporte') !!}
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="fecha" id="fecha" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                        </div>
                    </div>
                        <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                        <a class="btn btn-danger pull-right btn-flat" href="{{ url('admin/pedidos_oficinas')}}"><i class="fa fa-times"></i> Cancelar</a>
                      </div>
                        
                    {!! Form::close() !!} 
                        <!-- /.form-group -->
                </div>
            </div>
                
        </div>
    </div>
</div>

@endsection
