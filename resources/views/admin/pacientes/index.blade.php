@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-xs-11">
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Pacientes</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nro</th>
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th>Cédula</th>
                  <th>Teléfono</th>
                  <th>Dirección</th>
                  <th>Es titular?</th>
                  <th>MPPE/MPPES</th>
                  <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pacientes as $paciente)
                <tr>
                    <td>{{$num=$num+1}}</td>
                    <td>{{$paciente->nombres}}</td>
                    <td>{{$paciente->apellidos}}</td>
                    <td>{{$paciente->nacionalidad}}-{{$pacente->cedula}}</td>
                    <td>{{$paciente->codigo_telf}}-{{$paciente->telefono}} </td>
                    <td>{{$paciente->direccion}} </td>
                    <td>{{$paciente->titular}} </td>
                    <td>{{$paciente->instituion}} </td>  
                    <td></td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Nro</th>
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th>Cédula</th>
                  <th>Teléfono</th>
                  <th>Dirección</th>
                  <th>Es titular?</th>
                  <th>Gobernacion/MPPE</th>
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