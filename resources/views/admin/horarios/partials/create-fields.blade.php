<div class="form-group{{ $errors->has('id_especialidad') ? ' has-error' : '' }}">
	{!! Form::label('especialidad','* Especialidad') !!}
	{!! Form::select('id_especialidad',$especialidades,null,['class' => 'form-control','required' => 'required', 'title' => 'Seleccione la Especialidad', 'style'=>$errors->has('consulta') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>

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
                       {!! Form::checkbox('id_turno[]',$turno->id,false,['title' => 'Seleccione si asignará al horario el día '.$turno->dias->dia]) !!}
                      </td>
                    @endif
                  @endforeach
                </tr>
                <tr>
                  <td><strong>TARDE</strong></td>
                  @foreach($turnos as $turno)
                    @if($turno->momento=="Tarde")
                      <td>
                      	{!! Form::checkbox('id_turno[]',$turno->id,false,['title' => 'Seleccione si asignará al horario el día '.$turno->dias->dia]) !!}
                      </td>
                    @endif
                  @endforeach
                </tr>
                
              </table>
            </div>
            <!-- /.box-body -->
