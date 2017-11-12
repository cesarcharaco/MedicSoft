@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        Médicos
        <small>Actualización</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Médicos</a></li>
        <li class="active">Actualizando</li>
    </ol>
</section>
<div class="container">
    <div class="row">
        <div class="col-xs-11">
            @include('alerts.requests')
            @include('flash::message')
            <div class="panel panel-default">
                <div class="panel-heading">Actualización de datos del Médico<br>
                Los campos con (<strong>*</strong>) son obligatorios</div>

                <div class="panel-body">
                   {!! Form::open(['route' => ['medicos.update',$medico->id], 'method' => 'put', 'name' => 'medicos']) !!}
    
                         @include('admin.medicos.partials.edit-fields')
                        <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                        <a class="btn btn-danger pull-right btn-flat" href="{{ url('admin/medicos')}}"><i class="fa fa-times"></i> Cancelar</a>
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

    <script type="text/javascript" >
      
    $(document).ready ( function () {

        $("#desbloquear").change( function () {

            if($(this).is(":checked")) 
            {
                    $("#id_especialidad").prop('disabled',false);
                
            } else {

                    $("#id_especialidad").prop('disabled', true);
                    
            }
        });
    });

    /*function desbloquear(){

        if (document.form.medicos.desbloquear.checked==false) {
            document.form.medicos.id_especialidad.disabled=true;
            
        } else {
            document.form.medicos.id_especialidad.disabled=false;
            
        }
     }
    */
    </script>
@endsection