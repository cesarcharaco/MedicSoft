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
              <h3 class="box-title">Consultas del día({{date('Y-m-d')}}) del Paciente: {{$paciente->nacionalidad}}-{{$paciente->cedula}}, {{$paciente->apellidos}},{{$paciente->nombres}}</h3>
              
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nro</th>
                  <th>Especialidad</th>
                  <th>Tipo</th>
                  <th>Estado</th>
                  <th>Monto de Consulta</th>
                </tr>
                </thead>
                <tbody>
                @foreach($consultas as $consulta)
                @if($consulta->estado!="Eliminada")
                <tr>
                    <td>{{$num=$num+1}}</td>
                    <td>{{$consulta->consultasmontos->tipoconsultas->especialidades->especialidad}}</td>
                    <td>{{$consulta->consultasmontos->tipoconsultas->consulta}}</td>
                    <td> {{$consulta->estado}} </td> 
                    <td> {{$consulta->consultasmontos->monto}} </td>
                </tr>
                <?php $total+=$consulta->consultasmontos->monto; ?>
                @endif
                @endforeach
                <tr><td colspan="4" align="right"><strong>Total:</strong></td><td>{{$total}} </td></tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>Nro</th>
                  <th>Especialidad</th>
                  <th>Tipo</th>
                  <th>Estado</th>
                  <th>Monto de Consulta</th>
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

