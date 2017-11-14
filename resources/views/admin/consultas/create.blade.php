@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        Consultas
        <small>Nueva</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Consultas</a></li>
        <li class="active">Nueva</li>
    </ol>
</section>
<div class="container">
    <div class="row">
        <div class="col-xs-11">
            @include('alerts.requests')
            @include('flash::message')
            <div class="panel panel-default">
                <div class="panel-heading">Registro de Consulta<br>
                Los campos con (<strong>*</strong>) son obligatorios</div>

                <div class="panel-body">
                    {!! Form::open(['route' => ['consultas.store'], 'method' => 'post']) !!}
    
                         @include('admin.consultas.partials.create-fields')
                        <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                        <a class="btn btn-danger pull-right btn-flat" href="{{ url('admin/consultas')}}"><i class="fa fa-times"></i> Cancelar</a>
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
$(document).ready( function(){
    $("#laboratorio").change( function () {

            if($(this).is(":checked")) 
            {
                    $("#id_laboratorio").removeAttr('disabled');
                
            } else {

                    $("#id_laboratorio").prop('disabled', true);
                    
            }
        });
});


$("#id_tipoconsulta").on("change", function (event) {
    var id = event.target.value;
    $.get("/admin/consultas/"+id+"/buscarmedicos",function (data) {
       

       $("#id_medico").empty();
       $("#id_medico").append('<option value="" selected disabled> Seleccione el Médico</option>');
        
        if(data.length > 0){

            for (var i = 0; i < data.length ; i++) 
            {  
                $("#id_medico").removeAttr('disabled');
                $("#id_medico").append('<option value="'+ data[i].id + '">' + data[i].apellidos +', '+ data[i].nombres +'</option>');
            }

        }else{
            
            $("#id_medico").attr('disabled', false);

        }
    });
});
</script>
@endsection