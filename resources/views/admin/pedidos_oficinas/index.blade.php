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
              <h3 class="box-title">Pedidos por Oficina</h3>
              <div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
            <a href="{{ url('admin/pedidos_oficinas/create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                <i class="fa fa-pencil"></i> Registrar Pedido de una Oficina
            </a>
          </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nro</th>
                  <th>Oficina</th>
                  <th>Fecha</th>
                  <th>Código</th>
                  <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pedidos_oficinas as $pedido)
                <tr>
                    <td>{{$num=$num+1}}</td>
                    <td>{{$pedido->oficinas->oficina}} </td>
                    <td>{{$pedido->fecha}}</td>
                    <td>{{$pedido->codigo}}</td>
                    <td>
                      <div class="btn-group">
                              <a href="{{ route('pedidos_oficinas.edit', [$pedido->id]) }}">
                                <button class="btn btn-default btn-flat" title="Presionando este botón puede editar el registro">
                                  <i class="fa fa-pencil"></i>
                                </button></a>

                              <a href="#" >
                                <button onclick="pedido({{ $pedido->id }})" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede eliminar el registro" >
                                  <i class="fa fa-trash"></i>
                                </button>
                              </a>
                            <br><br>
                            </div>
                    </td>
                    <table>
                        <tr>
                          <th>Tipo de Material</th>
                          <th>Descripción</th>
                          <th>Modelo/Marca</th>
                          <th>Cantidad</th>
                          <th>Opciones</th>
                        </tr>
                    @foreach($pedido->materiales as $material)
                      <tr>
                        <td>{{$pedido->materiales->tipo_material}}</td>
                        <td>{{$pedido->materiales->descripción}}</td>
                        <td>{{$pedido->materiales->modelo_marca}}</td>
                        <td>{{$pedido->materiales->pivot->cantidad}}</td>
                        <td>
                            <div class="btn-group">
                              <a href="#" >
                                <button onclick="material({{ $pedido->id }},{{$material->id}})" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#myModal2" title="Presionando este botón puede eliminar el registro" >
                                  <i class="fa fa-trash"></i>
                                </button>
                              </a>
                            <br><br>
                            </div>
                          </td>
                        </tr>
                        @endforeach
                      </table>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Nro</th>
                  <th>Oficina</th>
                  <th>Fecha</th>
                  <th>Código</th>
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
                    <h4 class="modal-title">Eliminar El Pedido de ésta Oficina
                <div class="modal-body">
                    ¿Esta seguro que desea eliminar este pedido en específico?...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>

                    {!! Form::open(['route' => ['pedidos_oficinas.destroy',0133], 'method' => 'DELETE']) !!}
                        <input type="hidden" id="pedido" name="id">
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

   <script type="text/javascript">

        function pedido(pedido){

            $('#pedido').val(pedido);
        }

    </script>
<div id="myModal2" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Eliminar Material del Pedido
                <div class="modal-body">
                    ¿Esta seguro que desea eliminar este material en específico?...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>

                    {!! Form::open(['route' => ['pedidos_oficinas.destroy',0133], 'method' => 'DELETE']) !!}
                        <input type="hidden" id="pedido" name="id_pedido">
                        <input type="hidden" name="id_material" id="material">
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

   <script type="text/javascript">

        function material(pedido,material){

            $('#material').val(material);
            $('#pedido').val(pedido)
        }

    </script>

@endsection


