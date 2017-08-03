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
              <h3 class="box-title">Horarios</h3>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nro</th>
                  <th>Especialidad</th>
                  <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($horarios as $horario)
                <tr>
                    <td>{{$num=$num+1}}</td>
                    <td>{{$horario->especialidades->especialidad}}</td> 
                    <td>
                        <div class="btn-group">
                          <a href="{{ route('horarios.edit', [$horario->id_especialidad]) }}">
                            <button class="btn btn-default btn-flat" title="Presionando este botón puede editar el horario">
                              <i class="fa fa-pencil"></i>
                            </button></a>

                          <a href="#" >
                            <button onclick="especialidad({{ $horario->id_especialidad }})" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede eliminar el horario" >
                              <i class="fa fa-trash"></i>
                            </button>
                          </a>
                           <a href="{{ route('admin.horarios.show2', [$horario->id_especialidad]) }}">
                            <button class="btn btn-default btn-flat" title="Presionando este botón puede ver el horario">
                              <i class="fa fa-eye"></i>
                            </button></a>

                        <br><br>
                        </div>
                      </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Nro</th>
                  <th>Especialidad</th>
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
                    <h4 class="modal-title">Eliminar Horario de Especialidad</h4>
                </div>
                <div class="modal-body">
                    ¿Esta seguro que desea eliminar el horario de esta especialidad en específico?...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>

                    {!! Form::open(['route' => ['horarios.destroy',0133], 'method' => 'DELETE']) !!}
                        <input type="hidden" id="especialidad" name="id">
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

   <script type="text/javascript">

        function especialidad(especialidad){

            $('#especialidad').val(especialidad);
        }

    </script>

@endsection

