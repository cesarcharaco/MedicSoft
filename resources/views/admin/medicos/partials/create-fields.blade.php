<div class="form-group">
	{!! Form::label('especialidad','Especialidad') !!}
	<select name="id_especialidad" style="width:100% important!" title="Seleccione la Especialidad del Médico" required="required" class="form-control select2">
		@if(count($espec_listas)>0)
			@foreach($especialidades as $especialidad)
				<?php $cont=0; ?>
				@foreach($espec_listas as $esplist)
					@if($especialidad->id==$esplist->id_especialidad)
						<?php $cont++; ?>
					@endif
				@endforeach
				@if($cont<=3)
					<option value="{{$especialidad->id}}">{{$especialidad->especialidad}}</option>
				@endif
			@endforeach
		@else
			@foreach($especialidades as $especialidad)
				<option value="{{$especialidad->id}}">{{$especialidad->especialidad}}</option>
			@endforeach
		@endif
	</select>
</div>

<div class="form-group{{ $errors->has('nombres') ? ' has-error' : '' }}">
	{!! Form::label('nombres','* Nombres') !!}
	{!! Form::text('nombres',null,['class' => 'form-control','required' => 'required','placeholder' => 'Ej: Martin José', 'title' => 'Ingrese el/los Nombre(s) del Paciente', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('nombres') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>

<div class="form-group{{ $errors->has('apellidos') ? ' has-error' : '' }}">
	{!! Form::label('apellidos','* Apellidos') !!}
	{!! Form::text('apellidos',null,['class' => 'form-control','required' => 'required','placeholder' => 'Ej: Campos Ribas', 'title' => 'Ingrese el/los Apellido(s) del Paciente', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('apellidos') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>

<div class="form-group{{ $errors->has('cedula') ? ' has-error' : '' }}">
	{!! Form::label('cedula','* Cédula') !!}
	
	<select class="form-control select2" style="width: 70px;" name="nacionalidad" id="nacionalidad" title="Seleccione la nacionalidad del paciente" >
		<option value="V">V</option>
		<option value="E">E</option>
	</select>
	{!! Form::text('cedula', null, ['class' => 'form-control','placeholder' => 'Ej: 1234567','required' => 'required', 'title' => 'Ingrese la cédula del paciente sin separación por punto(.) o espacios','maxlength' => '8', 'style'=>$errors->has('cedula') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>

<div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
	{!! Form::label('telefono','* Teléfono') !!}
	<select name="codigo_telf" id="codigo_telf" style="width: 120px;" class="form-control select2" title="Seleccione el código del número telefónico">
		<option value="0244">0244</option>
		<option value="0412">0412</option>
		<option value="0414">0414</option>
		<option value="0424">0424</option>
		<option value="0416">0416</option>
		<option value="0426">0426</option>
	</select>
	{!! Form::text('telefono', null, ['class' => 'form-control','required' => 'required', 'maxlength' => '7','placeholder' => 'Ej: 1234567', 'style'=>$errors->has('telefono') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>

<div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
	{!! Form::label('direccion','* Dirección') !!}
	{!! Form::textarea('direccion', null, ['class' => 'textarea','required' => 'required', 'placeholder' => 'Ej: Calle Manhattan, casa nro. 4', 'title' => 'Ingrese la dirección del paciente','cols' => '100', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('direccion') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>