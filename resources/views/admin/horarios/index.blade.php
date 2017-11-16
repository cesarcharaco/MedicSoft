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
              <h3 class="box-title">Horarios</h3>
              @if(Auth::user()->tipo_user=="Administrador")
              <div class="btn-group pull-right" style="margin: 30px 10px 15px 15px;">
            <a href="{{ url('admin/horarios/create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                <i class="fa fa-pencil"></i> Asignar Horario
            </a>
              </div>
              @endif
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>

            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                <td>
                @foreach($dias as $dia)
                  <th> {{$dia->dia}} </th>
                @endforeach
                </tr>
                <tr>
                  <td><strong>MAÑANA</strong></td>

                  @foreach($turnos as $turno)
                    @if($turno->momento=="Mañana")
                      <td>
                        @if(count($horarios)>0)
                          @foreach($horarios as $horario)
                            @if($horario->id_turno==$turno->id)
                              {{$horario->especialidades->especialidad}} <br>
                            @endif
                          @endforeach 
                        @else
                          Vacante
                        @endif
                      </td>
                    @endif
                  @endforeach
                </tr>
                <tr>
                  <td><strong>TARDE</strong></td>
                  @foreach($turnos as $turno)
                    @if($turno->momento=="Tarde")
                      <td>
                        @if(count($horarios)>0)
                          @foreach($horarios as $horario)
                            @if($horario->id_turno==$turno->id)
                              {{$horario->especialidades->especialidad}} <br>
                            @endif
                          @endforeach 
                        @else
                          Vacante
                        @endif
                      </td>
                    @endif
                  @endforeach
                </tr>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
    </div>
</div>  

@endsection

