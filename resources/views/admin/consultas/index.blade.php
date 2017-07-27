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
              <h3 class="box-title">Consultas del día</h3>
              <div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
            <a href="{{ url('admin/consultas/create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                <i class="fa fa-pencil"></i> Registrar Consulta
            </a>
          </div>
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
                  <th>Estado</th>
                  <th>Posición</th>
                  <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($consultas as $consulta)
                @if($consulta->estado!="Eliminada")
                <tr>
                    <td>{{$num=$num+1}}</td>
                    <td>{{$consulta->pacientes->nacionalidad}}-{{$consulta->pacientes->cedula}} {{$consulta->pacientes->apellidos}}, {{$consulta->pacientes->nombres}} </td>
                    <td>{{$consulta->consultasmontos->tipoconsultas->especialidades->especialidad}}</td>
                    <td>{{$consulta->consultasmontos->tipoconsultas->consulta}}</td>
                    <td> {{$consulta->estado}} </td> 
                    <td> {{$consulta->posicion}} </td>
                    <td>
                        <div class="btn-group">
                          <a href="{{ route('consultas.edit', [$consulta->id]) }}">
                            <button class="btn btn-default btn-flat" title="Presionando este botón puede editar el registro">
                              <i class="fa fa-pencil"></i>
                            </button></a>

                          <a href="#" >
                            <button onclick="consulta({{ $consulta->id }})" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede eliminar el registro" >
                              <i class="fa fa-trash"></i>
                            </button>
                          </a>
                          <a href="#" >
                            <button onclick="consultavista({{ $consulta->id }})" class="btn btn-info btn-flat" data-toggle="modal" data-target="#myModal2" title="Presionando este botón puede marcar la consulta como ya vista" >
                              <i class="fa fa-eye"></i>
                            </button>
                          </a>
                        <br><br>
                        </div>
                      </td>
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
                  <th>Posición</th>
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
                    <h4 class="modal-title">Eliminar Consulta</h4>
                </div>
                <div class="modal-body">
                    ¿Esta seguro que desea eliminar esta consulta en especifico?...
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
<div id="myModal2" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Consulta Vista</h4>
                </div>
                <div class="modal-body">
                    ¿Esta seguro que desea marcar como vista esta consulta en especifico?...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>

                    {!! Form::open(['route' => ['admin.consultas.vistas'], 'method' => 'POST']) !!}
                        <input type="hidden" id="consulta2" name="id">
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

   <script type="text/javascript">

        function consultavista(consulta){

            $('#consulta2').val(consulta);
        }

    </script>

@endsection

