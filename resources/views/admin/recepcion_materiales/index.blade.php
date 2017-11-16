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
              <h3 class="box-title">Recepción de Materiales</h3>
              <div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
            <a href="{{ url('admin/recepcion_materiales/create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                <i class="fa fa-pencil"></i> Registrar Materiales Recibidos
            </a>
          </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nro</th>
                  <th>Fecha de Solicitud</th>
                  <th>Fecha de Entrega</th>
                  <th>Responsable</th>
                  <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($recibidos as $key)
                <tr>
                    <td>{{$num=$num+1}}</td>
                    <td>{{$key->fecha_solicitud}} </td>
                    <td>{{$key->fecha_entrega}}</td>
                    <td>{{$key->responsable}}</td>
                    <td>
                      <div class="btn-group">
                              <a href="{{ route('recepcion_materiales.edit', [$key->id]) }}">
                                <button class="btn btn-default btn-flat" title="Presionando este botón puede editar el registro">
                                  <i class="fa fa-pencil"></i>
                                </button></a>

                              <a href="#" >
                                <button onclick="recepcion({{ $key->id }})" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede eliminar el registro" >
                                  <i class="fa fa-trash"></i>
                                </button>
                              </a>
                            
                            <a href="{{ route('admin.recepcion_materiales.vermateriales', [$key->id]) }}">
                                <button class="btn btn-info btn-flat" title="Presionando este botón puede ver los materiales que se solicitaron en este recepcion">
                                  <i class="fa fa-eye"></i>
                                </button></a>
                            </div>
                    </td>
                </tr>
                
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Nro</th>
                  <th>Fecha de Solicitud</th>
                  <th>Fecha de Entrega</th>
                  <th>Responsable</th>
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
          <h4 class="modal-title">Eliminar La Recepción de Materiales</h4>
            <div class="modal-body">
                ¿Esta seguro que desea eliminar esta recepción en específico?...<BR>
                recuerde que si elimina este registro no existirá constancia de que hubo dicha recepción
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>

                {!! Form::open(['route' => ['recepcion_materiales.destroy',0133], 'method' => 'DELETE']) !!}
                    <input type="hidden" id="recepcion" name="id">
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                {!! Form::close() !!}
            </div>
      </div>
    </div>
  </div>
</div>

   <script type="text/javascript">

        function recepcion(recepcion){

            $('#recepcion').val(recepcion);
        }

    </script>

@endsection


