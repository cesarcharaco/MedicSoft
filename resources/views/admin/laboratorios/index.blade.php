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
              <h3 class="box-title">Laboratorio</h3>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nro</th>
                  <th>Exámen</th>
                  <th>Disponibilidad</th>
                </tr>
                </thead>
                <tbody>
                @foreach($laboratorios as $key)
                @if($key->tipoconsulta->consulta!="LABORATORIO")
                <tr>
                    <td>{{$num=$num+1}}</td>
                    <td>{{$key->tipoconsulta->consulta}}</td>
                    <td>
                        <div class="btn-group">
                          
                            @if($key->disponibilidad=="Si")
                           <a href="#" id="cancelar" data-toggle="modal" onclick="cambiar({{$key->id}})" data-target="#myModal"><img src="../img/iconos/bien.png" style="border-radius: 50px; width: 26px; height: 26px"></a>
                            @else
							<a href="#" id="cancelar" data-toggle="modal" onclick="cambiar({{$key->id}})" data-target="#myModal"><img src="../img/iconos/cancelar.png" style="border-radius: 50px; width: 26px; height: 26px"></a>
                            @endif
                        
                        </div>
                      </td>
                </tr>
                @endif
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Nro</th>
                  <th>Exáme</th>
                  <th>Disponibilidad</th>
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
                    <h4 class="modal-title">Cambiar Disponibilidad</h4>
                </div>
                <div class="modal-body">
                    ¿Esta seguro que desea cambiar la disponibilidad de este exámen en específico?...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>

                    {!! Form::open(['route' => ['laboratorios.update',0], 'method' => 'PUT']) !!}
                        <input type="hidden" id="laboratorio" name="id_laboratorio">
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

   <script type="text/javascript">

        function cambiar(id){

            $('#laboratorio').val(id);
        }

    </script>

@endsection

