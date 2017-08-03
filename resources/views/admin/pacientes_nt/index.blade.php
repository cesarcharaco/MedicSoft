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
              <h3 class="box-title">Pacientes No Titulares(Beneficiarios)</h3>
              <div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
            <a href="{{ url('admin/pacientes_nt/create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                <i class="fa fa-pencil"></i> Registrar Paciente No Titular
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
                  <th>Titular</th>
                  <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pacientes_nt as $paciente_nt)
                <tr>
                    <td>{{$num=$num+1}}</td>
                    <td>{{$paciente_nt->nombres}}</td>
                    <td>{{$paciente_nt->apellidos}}</td>
                    <td>{{$paciente_nt->nacionalidad}}-{{$paciente_nt->cedula}}</td>
                    <td>{{$paciente_nt->codigo_telf}}-{{$paciente_nt->telefono}} </td>
                    <td><?php echo $paciente_nt->direccion; ?> </td>
                    <td>{{$paciente_nt->edad}} </td>
                    <td>{{$paciente_nt->genero}} </td>
                    <td>{{$paciente_nt->pacientes->nacionalidad}}-{{$paciente_nt->pacientes->cedula}} {{$paciente_nt->pacientes->apellidos}}, {{$paciente_nt->pacientes->nombres}}</td>  
                    <td>
                        <div class="btn-group">
                          <a href="{{ route('pacientes_nt.edit', [$paciente_nt->id]) }}">
                            <button class="btn btn-default btn-flat" title="Presionando este botón puede editar el registro">
                              <i class="fa fa-pencil"></i>
                            </button></a>

                          <a href="#" >
                            <button onclick="paciente({{ $paciente_nt->id }})" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#myModal" title="Presionando este botón puede eliminar el registro" >
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
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th>Cédula</th>
                  <th>Teléfono</th>
                  <th>Dirección</th>
                  <th>Edad</th>
                  <th>Género</th>
                  <th>Titular</th>
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

                    {!! Form::open(['route' => ['pacientes_nt.destroy',0133], 'method' => 'DELETE']) !!}
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

