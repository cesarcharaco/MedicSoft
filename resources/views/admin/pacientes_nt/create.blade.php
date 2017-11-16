@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        Pacientes No Titulares(Beneficiarios)
        <small>Nuevo Ingreso</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Pacientes No Titulares(Beneficiarios)</a></li>
        <li class="active">Nuevo</li>
    </ol>
</section>
<div class="container">
    <div class="row">
        <div class="col-xs-11">
            @include('alerts.requests')
            @include('flash::message')
            <div class="panel panel-default">
                <div class="panel-heading">Registro de Paciente No Titular(Beneficiario)<br>
                Los campos con (<strong>*</strong>) son obligatorios</div>

                <div class="panel-body">
                    {!! Form::open(['route' => ['pacientes_nt.store'], 'method' => 'post']) !!}
    
                         @include('admin.pacientes_nt.partials.create-fields')
                        <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                        <a class="btn btn-danger pull-right btn-flat" href="{{ url('admin/pacientes_nt')}}"><i class="fa fa-times"></i> Cancelar</a>
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
    
    $("#parentesco").on('change',function(){
        var valor = $(this).val();
        if (valor=="Hijo(a)") {
            $("#edad").attr('max','23');
        } else {
            $("#edad").attr('max','100');
        }
    })

</script>
@endsection