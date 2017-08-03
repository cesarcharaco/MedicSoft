@extends('layouts.app')

@section('content')
<div class="col-xs-12">
@include('alerts.requests')
@include('flash::message')
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-11">
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Consultas de fechas anteriores a hoy...</h3>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nro</th>
                  <th>Paciente</th>
                  <th>Especialidad</th>
                  <th>Tipo</th>	
                  <th>Monto</th>
                  <th>Fecha</th>
                  <th>Diagnóstico</th>
                  <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($consultas as $consulta)
                @if($consulta->estado!="Eliminada")
                <tr>
                    <td>{{$num=$num+1}}</td>
                    <td>{{$consulta->pacientesnt->nacionalidad}}-{{$consulta->pacientesnt->cedula}} {{$consulta->pacientesnt->apellidos}}, {{$consulta->pacientesnt->nombres}} </td>
                    <td>{{$consulta->consultasmontos->tipoconsultas->especialidades->especialidad}}</td>
                    <td>{{$consulta->consultasmontos->tipoconsultas->consulta}}</td>
                    <td> {{$consulta->consultasmontos->monto}} </td>
                    <td> {{ $consulta->fecha }} </td>
                    <td> {{ $consulta->diagnostico }} </td>
                    <td></td>
                </tr>
                @endif
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Nro</th>
                  <th>Paciente</th>
                  <th>Especialidad</th>
                  <th>Tipo</th>
                  <th>Estado</th>
                  <th>Fecha</th>
                  <th>Diagnóstico</th>
                  <th>Opciones</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
    </div>
</div>  

@endsection

