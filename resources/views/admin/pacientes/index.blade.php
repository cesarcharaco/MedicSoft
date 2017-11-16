@extends('layouts.app')

@section('content')
<div class="col-xs-12">
@include('alerts.requests')
@include('flash::message')
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Pacientes</h3>
              <div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
            <a href="{{ url('admin/pacientes/create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                <i class="fa fa-pencil"></i> Registrar Paciente
            </a>
          </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nro</th>
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th>Cédula</th>
                  <th>Teléfono</th>
                  <th>Dirección</th>
                  <th>Edad</th>
                  <th>Género</th>
                  <th>Aseguradora</th>
                  <th>Cant. Benefs.</th>
                  <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pacientes as $paciente)
                <tr>
                    <td>{{$num=$num+1}}</td>
                    <td>{{$paciente->nombres}}</td>
                    <td>{{$paciente->apellidos}}</td>
                    <td>{{$paciente->nacionalidad}}-{{$paciente->cedula}}</td>
                    <td>{{$paciente->codigo_telf}}-{{$paciente->telefono}} </td>
                    <td><?php echo $paciente->direccion; ?> </td>
                    <td>{{$paciente->edad}} </td>
                    <td>{{$paciente->genero}} </td>
                    <td>{{$paciente->institucion}} </td>
                    <td>{{count($paciente->pacientesnt)}}</td>
                    <td>
                      @if(Auth::user()->tipo_user=="Administrador")
                        <div class="btn-group">
                          <a href="{{ route('pacientes.edit', [$paciente->id]) }}">
                            <button class="btn btn-default btn-flat" title="Presionando este botón puede editar el registro">
                              <i class="fa fa-pencil"></i>
                            </button></a>

                          <a href="#" >
                            <button onclick="paciente({{ $paciente->id }})" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede eliminar el registro" >
                              <i class="fa fa-trash"></i>
                            </button>
                          </a>
                        <br><br>
                        </div>
                        @endif
                      </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Nro</th>
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th>Cédula</th>
                  <th>Teléfono</th>
                  <th>Dirección</th>
                  <th>Edad</th>
                  <th>Género</th>
                  <th>MPPE/MPPESCT</th>
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
                    <h4 class="modal-title">Eliminar Paciente</h4>
                </div>
                <div class="modal-body">
                    ¿Esta seguro que desea eliminar este paciente en específico?...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>

                    {!! Form::open(['route' => ['pacientes.destroy',0133], 'method' => 'DELETE']) !!}
                        <input type="hidden" id="paciente" name="id">
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

   <script type="text/javascript">

        function paciente(paciente){

            $('#paciente').val(paciente);
        }

    </script>

@endsection

