<div class="form-group{{ $errors->has('monto') ? ' has-error' : '' }}">
	{!! Form::label('monto','* Monto (Bsf.)') !!}
	{!! Form::number('monto',null,['class' => 'form-control','required' => 'required','placeholder' => 'Ej: 10000','min' => '0', 'title' => 'Ingrese el Tipo de consulta', 'style'=>$errors->has('consulta') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>

<div class="form-group{{ $errors->has('id_tipoconsulta') ? ' has-error' : '' }}">
	{!! Form::label('consulta','* Consulta') !!}
	<select class="form-control" name="id_tipoconsulta" title="Seleccione la Consulta" required="required" >
		@foreach($tipoconsultas as $tipo)
			<option value="{{$tipo->id}}"> {{$tipo->consulta}} - Especialidad: {{$tipo->especialidades->especialidad}} </option>
		@endforeach
	</select>
</div>

