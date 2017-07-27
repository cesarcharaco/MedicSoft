<div class="form-group">
	{!! Form::label('paciente','Paciente: ') !!}
	{!! Form::hidden('id_paciente',$paciente->id) !!}
		 {{$paciente->nacionalidad}} - {{$paciente->cedula}} : {{$paciente->apellidos}},{{$paciente->nombres}} 
	
</div>

<div class="form-group{{ $errors->has('id_tipoconsulta') ? ' has-error' : '' }}">
	{!! Form::label('consulta','* Consulta') !!}
	<select class="form-control" name="id_tipoconsulta" title="Seleccione la Consulta" required="required" >
		@foreach($tipoconsultas as $tipo)
			<option value="{{$tipo->id}}"
			@if($tipo->id==$consulta->consultasmontos->tipoconsultas->id) selected="selected" @endif 
			> {{$tipo->consulta}} - Especialidad: {{$tipo->especialidades->especialidad}} </option>
		@endforeach
	</select>
</div>