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
              <h3 class="box-title">Pacientes en Consulta Hoy</h3>
              
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nro</th>
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th>Cédula</th>
                  <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($consultas as $consulta)
                <tr>
                    <td>{{$num=$num+1}}</td>
                    <td>{{$consulta->pacientesnt->nombres}}</td>
                    <td>{{$consulta->pacientesnt->apellidos}}</td>
                    <td>{{$consulta->pacientesnt->nacionalidad}}-{{$consulta->pacientesnt->cedula}}</td> 
                    <td>
                        <div class="btn-group">
                          <a href="{{ route('admin.consultas.verconsultas', [$consulta->id_pacientent]) }}">
                            <button class="btn btn-info btn-flat" title="Presionando este botón puede ver las consultas que el paciente registró hoy">
                              <i class="fa fa-eye"></i>
                            </button></a>

                          <a href="#" >
                            <button onclick="consulta({{ $consulta->id_pacientent }})" class="btn btn-default btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede descargar en archivo excel el reporte por persona en formato excel" >
                              <i class="fa fa-file-excel-o"></i>
                            </button>
                          </a>
                        <br><br>
                        </div>
                      </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Nro</th>
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th>Cédula</th>
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
<div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Eliminar Paciente de la consulta</h4>
                </div>
                <div class="modal-body">
                    ¿Esta seguro que desea eliminar esta consulta en específico?...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>

                    {!! Form::open(['route' => ['consultas.destroy',0133], 'method' => 'DELETE']) !!}
                        <input type="hidden" id="consulta" name="id">
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

   <script type="text/javascript">

        function consulta(consulta){

            $('#consulta').val(consulta);
        }

    </script>

@endsection

