@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        Realizar Pedido
        <small>Nuevo Ingreso</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Realizar Pedido</a></li>
        <li class="active">Nuevo</li>
    </ol>
</section>
<div class="container">
    <div class="row">
        <div class="col-xs-11">
            @include('alerts.requests')
            @include('flash::message')
            <div class="panel panel-default">
                <div class="panel-heading">Solicitud de Material <br>
                Los campos con (<strong>*</strong>) son obligatorios</div>

                <div class="panel-body">
                    {!! Form::open(['route' => ['pedidos_oficinas.store'], 'method' => 'post']) !!}
    
                         @include('admin.pedidos_oficinas.partials.create-fields')
                        <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                        <a class="btn btn-danger pull-right btn-flat" href="{{ url('admin/pedidos_oficinas')}}"><i class="fa fa-times"></i> Cancelar</a>
                      </div>
                    {!! Form::close() !!} 
                        <!-- /.form-group -->
                </div>
            </div>
                
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script type="text/javascript">
 
$(function(){
    // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
    $("#agregar").on('click', function(){
        $("#tabla tbody tr:eq(0)").clone().removeClass('fila-base').appendTo("#tabla tbody");
        
        
    });
 
    // Evento que selecciona la fila y la elimina 
    $(document).on("click",".eliminar",function(){
        var parent = $(this).parents().get(0);
        $(parent).remove();
        
    });
});
 
</script>
@endsection