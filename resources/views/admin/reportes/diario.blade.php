<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MedicSoft</title>

    @include('layouts.partials.html-header')
</head>
<body >

            <div class="row">
<div class="col-xs-12">
@include('alerts.requests')
@include('flash::message')
</div>
<div style="margin: 15px 0px 15px 15px;">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Reporte diario de Consultas</h3>
              <div class="btn-group pull-left" style="margin: 15px 0px 15px 15px;">
            <a href="{{ url('admin/reportediario') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                <i class="fa fa-file-excel-o"></i> Excel
            </a>
          </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
                <table id="example1" class="table table-bordered table-hover">
                  <tr>
                    <td colspan="6" style="text-align:center">
                      <img src="{{ asset('logoclinica.png') }}" class="user-image" alt="User Image">
                    </td>
                    @foreach($tipoconsultas as $tipo)
                      <td rowspan="2">
                        <div class="vertical">
                          {{$tipo->consulta}}
                        </div>
                      </td>
                    @endforeach
                  </tr>
                  <tr>
                    <td>Nro</td>
                    <td style="text-align:center" >Nombre y Apelido</td>
                    <td style="text-align:center">C.I. Beneficiario</td>
                    <td style="text-align:center">Edad</td>
                    <td style="text-align:center">C.I. Titular</td>
                    <td style="text-align:center">Titular</td>
                    
                  </tr>
                  <?php $num=0; ?>
                  @foreach($consultas as $consulta)
                    <tr>
                      <td>
                        {{$num=$num+1}}
                      </td>
                      <td>
                        {{$consulta->pacientesnt->nombres}} {{$consulta->pacientesnt->apellidos}}
                      </td>
                      <td>
                        {{ $consulta->pacientesnt->nacionalidad }}-{{ $consulta->pacientesnt->cedula }}
                      </td>
                      <td>
                        {{$consulta->pacientesnt->edad}}
                      </td>
                      <td>
                        {{ $consulta->pacientesnt->pacientes->nacionalidad }}-{{ $consulta->pacientesnt->pacientes->cedula }}
                      </td>
                      <td>
                        {{$consulta->pacientesnt->pacientes->nombres}} {{$consulta->pacientesnt->pacientes->apellidos}}
                      </td>
                      @foreach($tipoconsultas as $tipo)
                      <?php $cont=0; ?>
                        @foreach($vistas as $vista)
                          @if($tipo->id == $vista->consultasmontos->id_tipoconsulta AND $vista->id_pacientent==$consulta->id_pacientent)
                            <td>
                            <button id="diagnostico" value="{{$vista->diagnostico }}" class="btn btn-info btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede ver el diagnóstico de la consulta" >
                              <i class="fa fa-eye"></i>
                            </button>
                          
                          @endif
                        @endforeach
                        @if($cont==0)
                          <td></td>
                        @endif
                      @endforeach
                    </tr>
                  @endforeach

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
                    <h4 class="modal-title">Diagnóstico de la Consulta</h4>
                </div>
                
                <div class="modal-footer">
                    

                    {!! Form::open(['route' => ['admin.consultas.vistas'], 'method' => 'POST']) !!}
                        
                        <div class="form-group">
                          <textarea class="textarea" placeholder="Diagnóstico de la consulta" name="diagnosticos" id="diagnosticos" cols="100" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" rows="3"  ></textarea> 
                        </div>
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                        
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

   <script type="text/javascript">

        $(document).ready ( function () {

          $("#diagnostico").change( function () {

            $('#diagnosticos').val($("#diagnostico").val());

          });

        });

    </script>


    
    @include('layouts.partials.footer')
</div>

@include('layouts.partials.scripts')
</body>
</html>

