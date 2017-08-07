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
              <h3 class="box-title">Materiales</h3>
              <div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
            <a href="{{ url('admin/materiales/create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                <i class="fa fa-pencil"></i> Registrar Material
            </a>
          </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nro</th>
                  <th>Tipo de Material</th>
                  <th>Descripción</th>
                  <th>Modelo/Marca</th>
                  <th>Serial</th>
                  <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($materiales as $material)
                <tr>
                    <td>{{$num=$num+1}}</td>
                    <td>{{$material->tipo_material}} </td>
                    <td>{{$material->descripcion}}</td>
                    <td>{{$material->modelo_marca}}</td>
                    <td>{{$material->serial}}</td>
                    <td>
                        <div class="btn-group">
                          <a href="{{ route('materiales.edit', [$material->id]) }}">
                            <button class="btn btn-default btn-flat" title="Presionando este botón puede editar el registro">
                              <i class="fa fa-pencil"></i>
                            </button></a>

                          <a href="#" >
                            <button onclick="material({{ $material->id }})" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede eliminar el registro" >
                              <i class="fa fa-trash"></i>
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
                  <th>Tipo de Material</th>
                  <th>Descripción</th>
                  <th>Modelo/Marca</th>
                  <th>Serial</th>
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
                    <h4 class="modal-title">Eliminar el Material
                <div class="modal-body">
                    ¿Esta seguro que desea eliminar este material en específico?...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>

                    {!! Form::open(['route' => ['materiales.destroy',0133], 'method' => 'DELETE']) !!}
                        <input type="hidden" id="material" name="id">
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

   <script type="text/javascript">

        function material(material){

            $('#material').val(material);
        }

    </script>

@endsection

