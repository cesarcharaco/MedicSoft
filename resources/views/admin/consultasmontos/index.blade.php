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
              <h3 class="box-title">Montos de las Consultas</h3>
              <div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
            <a href="{{ url('admin/consultasmontos/create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                <i class="fa fa-pencil"></i> Registrar Monto
            </a>
          </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nro</th>
                  <th>Tipo de Consulta</th>
                  <th>Especialidad</th>
                  <th>Monto</th>
                  <th>Fecha de Registro</th>
                  <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($consultasmontos as $consultasmonto)
                <tr>
                    <td>{{$num=$num+1}}</td>
                    <td>{{$consultasmonto->tipoconsultas->consulta}} </td>
                    <td>{{$consultasmonto->tipoconsultas->especialidades->especialidad}}</td> 
                    <td>{{$consultasmonto->monto}}</td>
                    <td>{{$consultasmonto->fecha}}</td>
                    <td>
                        <div class="btn-group">
                          <a href="{{ route('consultasmontos.edit', [$consultasmonto->id]) }}">
                            <button class="btn btn-default btn-flat" title="Presionando este botón puede editar el registro">
                              <i class="fa fa-pencil"></i>
                            </button></a>

                          <a href="#" >
                            <button onclick="consultasmonto({{ $consultasmonto->id }})" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede eliminar el registro" >
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
                  <th>Tipo de Consulta</th>
                  <th>Especialidad</th>
                  <th>Monto</th>
                  <th>Fecha de Registro</th>
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
                    <h4 class="modal-title">Eliminar Monto de Consulta</h4>
                </div>
                <div class="modal-body">
                    ¿Esta seguro que desea eliminar este monto de consulta en específico?...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>

                    {!! Form::open(['route' => ['consultasmontos.destroy',0133], 'method' => 'DELETE']) !!}
                        <input type="hidden" id="consultasmonto" name="id">
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

   <script type="text/javascript">

        function consultasmonto(consultasmonto){

            $('#consultasmonto').val(consultasmonto);
        }

    </script>

@endsection

