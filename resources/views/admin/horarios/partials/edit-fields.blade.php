<div class="form-group{{ $errors->has('id_especialidad') ? ' has-error' : '' }}">
	{!! Form::label('especialidad','Actualizando el Horario de la Especialidad: ') !!}
  {{$especialidad->especialidad}}
	{!! Form::hidden('id_especialidad',$id_especialidad) !!}
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
                      	<?php $cont=0; ?>
                      	@foreach($horario as $h)
              							@if($h->id_turno==$turno->id)
              								{!! Form::checkbox('id_turno[]',$turno->id,true,['title' => 'Seleccione si asignará al horario el día '.$turno->dias->dia]) !!}
              								<?php $cont++; ?>
              							@endif
                      	@endforeach
                      	@if($cont==0)
								            {!! Form::checkbox('id_turno[]',$turno->id,false,['title' => 'Seleccione si asignará al horario el día '.$turno->dias->dia]) !!}
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
                      	<?php $cont=0; ?>
                      	@foreach($horario as $h)
							@if($h->id_turno==$turno->id)
								{!! Form::checkbox('id_turno[]',$turno->id,true,['title' => 'Seleccione si asignará al horario el día '.$turno->dias->dia]) !!}
								<?php $cont++; ?>
							@endif
                      	@endforeach
                      	@if($cont==0)
								{!! Form::checkbox('id_turno[]',$turno->id,false,['title' => 'Seleccione si asignará al horario el día '.$turno->dias->dia]) !!}
						@endif
                      </td>
                    @endif
                  @endforeach
                </tr>
                
              </table>
            </div>
            <!-- /.box-body -->
