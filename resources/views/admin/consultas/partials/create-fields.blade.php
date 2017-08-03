<div class="form-group{{ $errors->has('id_pacientent') ? ' has-error' : '' }}">
	{!! Form::label('paciente','* Paciente') !!}
	<select class="form-control select2" name="id_pacientent" title="Seleccione la Consulta" required="required" >
		@foreach($pacientesnt as $paciente)
			<option value="{{$paciente->id}}"> {{$paciente->nacionalidad}} - {{$paciente->cedula}} : {{$paciente->apellidos}},{{$paciente->nombres}} </option>
		@endforeach
	</select>
</div>
<div class="form-group{{ $errors->has('id_tipoconsulta') ? ' has-error' : '' }}">
	{!! Form::label('consulta','* Consulta') !!}
	<select class="form-control select2" name="id_tipoconsulta" title="Seleccione la Consulta" required="required" >
		@foreach($tipoconsultas as $tipo)
			<option value="{{$tipo->id}}"> {{$tipo->consulta}} - Especialidad: {{$tipo->especialidades->especialidad}} </option>
		@endforeach
	</select>
</div>
