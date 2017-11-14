<div class="form-group">
	{!! Form::label('paciente','Paciente: ') !!}
	{!! Form::hidden('id_pacientent',$pacientent->id) !!}
		 {{$pacientent->nacionalidad}} - {{$pacientent->cedula}} : {{$pacientent->apellidos}},{{$pacientent->nombres}} 
	
</div>

<div class="form-group{{ $errors->has('id_tipoconsulta') ? ' has-error' : '' }}">
	{!! Form::label('consulta','* Consulta') !!}
	<select class="form-control select2" id="id_tipoconsulta" name="id_tipoconsulta" title="Seleccione la Consulta" required="required" >
		@foreach($tipoconsultas as $tipo)
			<option value="{{$tipo->id}}"
			@if($tipo->id==$consulta->consultasmontos->tipoconsultas->id) selected="selected" @endif 
			> {{$tipo->consulta}} - Especialidad: {{$tipo->especialidades->especialidad}} </option>
		@endforeach
	</select>
</div>
<div class="form-group">
	{!! Form::label('medico','* Médico')  !!}
	{!! Form::select('id_medico',['placeholder' => 'Seleccione el Médico'],null,['class' => 'form-control select2','required' => 'required', 'title' => 'Seleccione el Médico','id' => 'id_medico']) !!}
</div>