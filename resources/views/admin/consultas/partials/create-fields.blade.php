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
	<select class="form-control select2" id="id_tipoconsulta" name="id_tipoconsulta" title="Seleccione la Consulta" >
	<option value="">NINGUNA</option>
		@foreach($tipoconsultas as $tipo)
			@if($tipo->especialidades->especialidad!="LABORATORIO")
			<option value="{{$tipo->id_especialidad}}"> {{$tipo->especialidades->tipoconsultas[0]->consulta}} - Especialidad: {{$tipo->especialidades->especialidad}}</option>
			@endif
		@endforeach
	</select>
</div>
<div class="form-group">
	{!! Form::label('medico','* Médico')  !!}
	{!! Form::select('id_medico',['placeholder' => 'Seleccione el Médico'],null,['class' => 'form-control select2','required' => 'required', 'title' => 'Seleccione el Médico','id' => 'id_medico']) !!}
</div>
<div class="form-group">
	{!! Form::checkbox('laboratorio','Si',false,['title' => 'Seleccione si se realizará exámenes en laboratorios','id' => 'laboratorio']) !!}
	{!! Form::label('lab','¿Realizará exámen de Laboratorio?') !!}
</div>
<div class="form-group{{ $errors->has('id_laboratorio') ? ' has-error' : '' }}">
	{!! Form::label('consultalab','* Exámenes de Laboratorios') !!}
	<select class="form-control select2" name="id_laboratorio[]" id="id_laboratorio" title="Seleccione la Consulta" disabled="disabled" multiple="multiple" >
		@foreach($laboratorios as $key)
			@if($key->tipoconsulta->consulta!="LABORATORIO")
			<option value="{{$key->id_tipoconsulta}}"> {{$key->tipoconsulta->consulta}} </option>
			@endif
		@endforeach
	</select>
</div>