<div class="form-group{{ $errors->has('oficina') ? ' has-error' : '' }}">
	{!! Form::label('oficina','* Oficina') !!}
	{!! Form::text('oficina',null,['class' => 'form-control','required' => 'required','placeholder' => 'Ej: EMERGENCIAS', 'title' => 'Ingrese el Nombre de la Oficina', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('oficina') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>
