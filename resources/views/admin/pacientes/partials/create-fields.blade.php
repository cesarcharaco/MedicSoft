<div class="form-group">
	
	{!! Form::hidden('titular','Si') !!}
</div>

<div class="form-group">
	{!! Form::label('titular','* ¿Institución Aseguradora?') !!}
</div>
<div class="form-group">
	{!! Form::label('MPPESCT','MPPESCT') !!}
	{!! Form::radio('institucion','MPPESCT',true,[ 'title' => 'Seleccione si la Institución Aseguradora es el Ministerio del Poder Popular para la Educación Superior, Ciencia y Tecnología']) !!}
	{!! Form::label('MPPE','MPPE') !!}
	{!! Form::radio('institucion','MPPE',false,[ 'title' => 'Seleccione si la Institución Aseguradora es el Ministerio del Poder Popular para la Educación ']) !!}
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
<div class="form-group">
	{!! Form::label('genero','* Género') !!}
</div>
<div class="form-group">
	{!! Form::label('m','M') !!}
	{!! Form::radio('genero','M',true,[ 'title' => 'Seleccione si es de género Masculino']) !!}
	{!! Form::label('f','F') !!}
	{!! Form::radio('genero','F',false,[ 'title' => 'Seleccione si es de género Femenino']) !!}
</div>

<div class="form-group{{ $errors->has('edad') ? ' has-error' : '' }}">
	{!! Form::label('edad','* Edad') !!}
	{!! Form::number('edad',null,['class' => 'form-control','required' => 'required','placeholder' => '18','min' => '0', 'title' => 'Ingrese la Edad del Paciente','maxLength' => '2','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);', 'style'=>$errors->has('edad') ? 'border-color: red; border: 1px solid red;': '']) !!}
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
	{!! Form::text('telefono', null, ['class' => 'form-control','id' => 'phone','required' => 'required', 'maxlength' => '7','placeholder' => 'Ej: 1234567', 'style'=>$errors->has('telefono') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>

<div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
	{!! Form::label('direccion','* Dirección') !!}
	{!! Form::textarea('direccion', null, ['class' => 'textarea','required' => 'required', 'placeholder' => 'Ej: Calle Manhattan, casa nro. 4', 'title' => 'Ingrese la dirección del paciente','cols' => '100', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style' =>$errors->has('direccion') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>
