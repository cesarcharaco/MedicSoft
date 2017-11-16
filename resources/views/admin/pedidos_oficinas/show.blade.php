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
              <h3 class="box-title">Pedidos por Materiales</h3>
              
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
                  <th>Tipo de Material</th>
	              <th>Descripción</th>
	              <th>Modelo/Marca</th>
	              <th>Cantidad</th>
                  
                </tr>
                </thead>
                <tbody>
                @foreach($pedidos_oficinas as $pedido)
                
                	@foreach($pedido->materiales as $material)
		                <tr>
		                    <td>{{$num=$num+1}}</td>
		                    <td>{{$pedido->oficinas->oficina}} </td>
		                    <td>{{$pedido->fecha}}</td>
		                    <td>{{$pedido->codigo}}</td>
		                    <td>{{$material->tipo_material}}</td>
		                    <td>{{$material->descripcion}}</td>
			                <td>{{$material->modelo_marca}}</td>
			                <td>{{$material->pivot->cantidad}}</td>
		                    
		                </tr>
                	@endforeach
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Nro</th>
                  <th>Oficina</th>
                  <th>Fecha</th>
                  <th>Código</th>
                  <th>Tipo de Material</th>
	              <th>Descripción</th>
	              <th>Modelo/Marca</th>
	              <th>Cantidad</th>
                  
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

<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Eliminar Material del Pedido</h4>
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
</div>
   <script type="text/javascript">

        function material(pedido,material){

            $('#material').val(material);
            $('#pedido').val(pedido)
        }

    </script>

@endsection


