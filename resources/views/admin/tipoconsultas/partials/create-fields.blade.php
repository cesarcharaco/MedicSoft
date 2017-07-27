<div class="form-group{{ $errors->has('consulta') ? ' has-error' : '' }}">
	{!! Form::label('consulta','* Consulta') !!}
	{!! Form::text('consulta',null,['class' => 'form-control','required' => 'required','placeholder' => 'Ej: ECOSONOGRAMA ABDOMINAL', 'title' => 'Ingrese el Tipo de consulta', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('consulta') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>

<div class="form-group{{ $errors->has('id_especialidad') ? ' has-error' : '' }}">
	{!! Form::label('especialidad','* Especialidad') !!}
	{!! Form::select('id_especialidad',$especialidades,null,['class' => 'form-control','required' => 'required', 'title' => 'Seleccione la Especialidad', 'style'=>$errors->has('consulta') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>