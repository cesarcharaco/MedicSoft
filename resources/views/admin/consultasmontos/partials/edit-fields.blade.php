<div class="form-group{{ $errors->has('monto') ? ' has-error' : '' }}">
	{!! Form::label('monto','* Monto (Bsf.)') !!}
	{!! Form::number('monto',$consultasmonto->monto,['class' => 'form-control','required' => 'required','placeholder' => 'Ej: 10000','min' => '0', 'title' => 'Ingrese el Tipo de consulta', 'style'=>$errors->has('consulta') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>

<div class="form-group{{ $errors->has('id_tipoconsulta') ? ' has-error' : '' }}">
	{!! Form::label('consulta','Consulta: ') !!}
	{{ $consultasmonto->tipoconsultas->consulta }} - Especialidad: {{ $consultasmonto->tipoconsultas->especialidades->especialidad }}
	<br>
	{!! Form::label('consulta','Información: Solo puede editar el monto de la consulta') !!}
</div>
