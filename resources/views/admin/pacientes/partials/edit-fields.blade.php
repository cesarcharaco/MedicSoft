<div class="form-group">
	{!! Form::label('titular','¿Titular?') !!}
	@if($paciente->titular=="Si")
		{!! Form::checkbox('titular','Si',true,[ 'title' => 'Seleccione si es Titular del Seguro']) !!}
	@else
		{!! Form::checkbox('titular','Si',false,[ 'title' => 'Seleccione si es Titular del Seguro']) !!}
	@endif
</div>

<div class="form-group">
	{!! Form::label('titular','* ¿Institución Aseguradora?') !!}
</div>
<div class="form-group">
	{!! Form::label('MPPESCT','MPPESCT') !!}
	@if($paciente->institucion=="MPPESCT")
		{!! Form::radio('institucion','MPPESCT',true,[ 'title' => 'Seleccione si la Institución Aseguradora es el Ministerio del Poder Popular para la Educación Superior, Ciencia y Tecnología']) !!}
	@else
		{!! Form::radio('institucion','MPPESCT',false,[ 'title' => 'Seleccione si la Institución Aseguradora es el Ministerio del Poder Popular para la Educación Superior, Ciencia y Tecnología']) !!}
	@endif


	{!! Form::label('MPPE','MPPE') !!}
	@if($paciente->institucion=="MPPE")
		{!! Form::radio('institucion','MPPE',true,[ 'title' => 'Seleccione si la Institución Aseguradora es el Ministerio del Poder Popular para la Educación ']) !!}
	@else
		{!! Form::radio('institucion','MPPE',false,[ 'title' => 'Seleccione si la Institución Aseguradora es el Ministerio del Poder Popular para la Educación ']) !!}
	@endif
</div>

<div class="form-group{{ $errors->has('nombres') ? ' has-error' : '' }}">
	{!! Form::label('nombres','* Nombres') !!}
	{!! Form::text('nombres',$paciente->nombres,['class' => 'form-control','required' => 'required','placeholder' => 'Ej: Martin José', 'title' => 'Ingrese el/los Nombre(s) del Paciente', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('nombres') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>

<div class="form-group{{ $errors->has('apellidos') ? ' has-error' : '' }}">
	{!! Form::label('apellidos','* Apellidos') !!}
	{!! Form::text('apellidos',$paciente->apellidos,['class' => 'form-control','required' => 'required','placeholder' => 'Ej: Campos Ribas', 'title' => 'Ingrese el/los Apellido(s) del Paciente', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('apellidos') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>

<div class="form-group{{ $errors->has('cedula') ? ' has-error' : '' }}">
	{!! Form::label('cedula','* Cédula') !!}
	
	<select class="form-control" style="width: 70px;" name="nacionalidad" id="nacionalidad" title="Seleccione la nacionalidad del paciente" >
		<option value="V" @if($paciente->nacionalidad=="V") selected="selected" @endif >V</option>
		<option value="E" @if($paciente->nacionalidad=="E") selected="selected" @endif>E</option>
	</select>
	{!! Form::text('cedula', $paciente->cedula, ['class' => 'form-control','placeholder' => 'Ej: 1234567','required' => 'required', 'title' => 'Ingrese la cédula del paciente sin separación por punto(.) o espacios','maxlength' => '8', 'style'=>$errors->has('cedula') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>
<div class="form-group">
	{!! Form::label('genero','* Género') !!}
</div>
<div class="form-group">
	{!! Form::label('','M') !!}
	@if($paciente->genero=="M")
		{!! Form::radio('genero','M',true,[ 'title' => 'Seleccione si es de género Masculino']) !!}
	@else
		{!! Form::radio('genero','M',false,[ 'title' => 'Seleccione si es de género Masculino']) !!}
	@endif


	{!! Form::label('F','F') !!}
	@if($paciente->genero=="F")
		{!! Form::radio('genero','F',true,[ 'title' => 'Seleccione si es de género Femenino']) !!}
	@else
		{!! Form::radio('genero','F',false,[ 'title' => 'Seleccione si es de género Femenino']) !!}
	@endif
</div>
<div class="form-group{{ $errors->has('edad') ? ' has-error' : '' }}">
	{!! Form::label('edad','* Edad') !!}
	{!! Form::number('edad',$paciente->edad,['class' => 'form-control','required' => 'required','placeholder' => '18','min' => '0', 'title' => 'Ingrese la Edad del Paciente','maxLength' => '2','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);', 'style'=>$errors->has('edad') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>
<div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
	{!! Form::label('telefono','* Teléfono') !!}
	<select name="codigo_telf" id="codigo_telf" style="width: 80px;" class="form-control" title="Seleccione el código del número telefónico">
		<option value="0244" @if($paciente->codigo_telf=="0244") selected="selected" @endif >0244</option>
		<option value="0412" @if($paciente->codigo_telf=="0412") selected="selected" @endif >0412</option>
		<option value="0414" @if($paciente->codigo_telf=="0414") selected="selected" @endif >0414</option>
		<option value="0424" @if($paciente->codigo_telf=="0424") selected="selected" @endif >0424</option>
		<option value="0416" @if($paciente->codigo_telf=="0416") selected="selected" @endif>0416</option>
		<option value="0426" @if($paciente->codigo_telf=="0426") selected="selected" @endif >0426</option>
	</select>
	{!! Form::text('telefono', $paciente->telefono, ['class' => 'form-control','required' => 'required', 'maxlength' => '7','placeholder' => 'Ej: 1234567', 'style'=>$errors->has('telefono') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>

<div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
	{!! Form::label('direccion','* Dirección') !!}
	{!! Form::textarea('direccion', $paciente->direccion, ['class' => 'form-control','required' => 'required', 'placeholder' => 'Ej: Calle Manhattan, casa nro. 4', 'title' => 'Ingrese la dirección del paciente', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('direccion') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>