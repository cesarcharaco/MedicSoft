<div class="form-group{{ $errors->has('especialidad') ? ' has-error' : '' }}">
	{!! Form::label('especialidad','* Especialidad') !!}
	{!! Form::text('especialidad',null,['class' => 'form-control','required' => 'required','placeholder' => 'Ej: MEDICINA GENERAL', 'title' => 'Ingrese la Especialidad', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('especialidad') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>