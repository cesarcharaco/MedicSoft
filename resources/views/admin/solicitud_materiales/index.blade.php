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
              <h3 class="box-title">Solicitudes de Materiales</h3>
              <div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
            <a href="{{ url('admin/solicitud_materiales/create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                <i class="fa fa-pencil"></i> Realizar Solicitud de Materiales
            </a>
          </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nro</th>
                  <th>Fecha</th>
                  <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($materiales as $key)
                <tr>
                    <td>{{$num=$num+1}}</td>
                    <td>{{$key->fecha}}</td>
                    <td>
                      <div class="btn-group">
                              <a href="{{ route('solicitud_materiales.edit', [$key->fecha]) }}">
                                <button class="btn btn-default btn-flat" title="Presionando este botón puede editar el registro">
                                  <i class="fa fa-pencil"></i>
                                </button></a>

                              <a href="#" >
                                <button onclick="solicitud('{{ $key->fecha }}')" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede eliminar el registro" >
                                  <i class="fa fa-trash"></i>
                                </button>
                              </a>
                            
                            <a href="{{ route('admin.solicitud_materiales.vermateriales', [$key->fecha]) }}">
                                <button class="btn btn-info btn-flat" title="Presionando este botón puede ver los materiales de la Solicitud">
                                  <i class="fa fa-eye"></i>
                                </button></a>
                            <a href="{{ route('admin.solicitud_materiales.buscarsolicitud', [$key->fecha]) }}">
                                <button class="btn btn-danger btn-flat" title="Presionando este botón puede descargar el formato PDF de la Solicitud">
                                  <i class="fa fa-file-pdf-o"></i>
                                </button></a>
                                <?php $cont=0; ?>
                            @foreach($recibidos as $key2)
                                @if($key2->fecha_solicitud==$key->fecha)    
                                  <?php $cont++; ?>
                                @endif
                            @endforeach
                            @if($cont==0)
                            <a href="{{ route('admin.recepcion_materiales.recibir', [$key->fecha]) }}">
                                <button class="btn btn-info btn-flat" title="Presionando este botón puede cargar los Materiales recibidos">
                                  <i class="fa fa-upload"></i>
                                </button></a> 
                            @endif
                            </div>
                    </td>
                </tr>
                
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Nro</th>
                  <th>Fecha</th>
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
          <h4 class="modal-title">Eliminar La Solicitud de Materiales</h4>
            <div class="modal-body">
                ¿Esta seguro que desea eliminar esta solicitud en específico?...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>

                {!! Form::open(['route' => ['solicitud_materiales.destroy',0133], 'method' => 'DELETE']) !!}
                    <input type="hidden" id="solicitud" name="id">
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                {!! Form::close() !!}
            </div>
      </div>
    </div>
  </div>
</div>

   <script type="text/javascript">

        function solicitud(solicitud){

            $('#solicitud').val(solicitud);
        }

    </script>

@endsection


