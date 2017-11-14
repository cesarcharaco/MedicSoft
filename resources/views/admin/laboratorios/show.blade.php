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
              <h3 class="box-title">Cola de Laboratorio</h3>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nro</th>
                  <th>Paciente</th>
                  <th>Estado</th>
                  <th>Posición</th>
                  <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($consultalab as $key)
                
                <tr>
                    <td>{{$num=$num+1}}</td>
                    <td>{{$key->pacientesnt->nacionalidad}}-{{$key->pacientesnt->cedula}} {{$key->pacientesnt->apellidos}}, {{$key->pacientesnt->nombres}} </td>
                    <td>{{$key->estado}}</td>
                    <td>{{$key->posicion}}</td>
                    <td>
                        <div class="btn-group">
                          @if($key->estado=="En Cola")
                            <a href="{{ route('laboratorios.edit', [$key->id]) }}">
                            <button class="btn btn-default btn-flat" title="Presionando este botón puede editar el registro">
                              <i class="fa fa-pencil"></i>
                            </button></a>
                        
                          <a href="#" >
                            <button onclick="consulta({{ $key->id }})" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede eliminar el registro" >
                              <i class="fa fa-trash"></i>
                            </button>
                          </a>
                          <a href="#" >
                            <button onclick="verexamenes({{ $key->consultaslaboratorios }})" class="btn btn-info btn-flat"  title="Presionando este botón puede ver los exámenes a realizar en Laboratorio" >
                              <i class="fa fa-eye"></i>
                            </button>
                          </a>
                          @else
                          <a href="#" >
                            <button onclick="verexamenes({{ $key->consultaslaboratorios }})" class="btn btn-info btn-flat" data-toggle="modal" data-target="#myModal2" title="Presionando este botón puede ver los exámenes a realizar en Laboratorio" >
                              <i class="fa fa-eye"></i>
                            </button>
                          </a>

                          @endif
                            
                        
                        </div>
                      </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Nro</th>
                  <th>Paciente</th>
                  <th>Estado</th>
                  <th>Posición</th>
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
                    <h4 class="modal-title">Eliminar Consulta</h4>
                </div>
                <div class="modal-body">
                    ¿Esta seguro que desea eliminar esta consulta en específico?...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>

                    {!! Form::open(['route' => ['laboratorios.destroy',0133], 'method' => 'DELETE']) !!}
                        <input type="hidden" id="consulta" name="id">
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

<div id="myModal2" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Consulta Vista</h4>
                </div>
                <div class="modal-body">
                    ¿Esta seguro que desea marcar como vista esta consulta en específico?...
                </div>
                <div class="modal-footer">
                    

                    {!! Form::open(['route' => ['admin.consultas.vistas'], 'method' => 'POST']) !!}
                        <input type="hidden" id="consulta2" name="id">
                        

                        <div class="form-group">

                          <center>{!! Form::label('diagnostico','DIAGNÓSTICO') !!}</center>
                          <textarea class="textarea" placeholder="Ingrese el diagnóstico para poder guardar como vista la consulta" name="diagnostico" title="Ingrese el diagnóstico" required="required" id="diagnostico" cols="100" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" rows="3"  onkeyup="javascript:this.value=this.value.toUpperCase()"></textarea> 
                        </div>
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

<!-- editar diagnóstico -->

<div id="myModal3" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Consulta Vista - Editar Diagnóstico</h4>
                </div>
                <div class="modal-body">
                    ¿Esta seguro que desea editar el diagnóstico de esta consulta en específico?...
                </div>
                <div class="modal-footer">
                    

                    {!! Form::open(['route' => ['admin.consultas.editardiagnostico'], 'method' => 'POST']) !!}
                        <input type="hidden" id="consulta3" name="id_consulta">
                          <div class="form-group">
                          
                          <center>{!! Form::label('diagnostico','DIAGNÓSTICO ANTERIOR') !!}</center>
                          <strong><p id="anterior" align="left"><span></span></p></strong>
                          <center>{!! Form::label('diagnostico','DIAGNÓSTICO NUEVO') !!}</center>
                         <textarea id="nuevo" name="nuevo" required="required" class="textarea" rows="3" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" title="Ingrese el diagnóstico" placeholder="Ingrese el diagnóstico nuevo"></textarea>
                        </div>
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Editar</button>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

  
@endsection
@section('scripts')
 <script type="text/javascript">

        
        function consulta(consulta){

            $('#consulta').val(consulta);
        }
        function consultavista(consulta){

            $('#consulta2').val(consulta);
        }
        function verexamenes(examenes[]) {
          //for(i=0;i<examenes.length;i++){
            alert('asasas');
          //}
        }
    </script>

@endsection
