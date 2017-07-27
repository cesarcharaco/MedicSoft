<div class="form-group">
	{!! Form::label('especialidad','Especialidad Actual:') !!}
	{{$medico->especialidades->especialidad}}
	<br>
	{!! Form::label('especialidad','Desea Cambiar?') !!}
	{!! Form::checkbox('desbloquear','Si',false,['title' => 'Seleccione si desea cambiar la especialidad del médico']) !!}
	<select name="id_especialidad" title="Seleccione la Especialidad del Médico" required="required" class="form-control" disabled="disabled">
		@if(count($espec_listas)>0)
			@foreach($especialidades as $especialidad)
				<?php $cont=0; ?>
				@foreach($espec_listas as $esplist)
					@if($especialidad->id==$esplist->id_especialidad)
						<?php $cont++; ?>
					@endif
				@endforeach
				@if($cont==0)
					<option value="{{$especialidad->id}}" @if($medico->id_especialidad==$especialidad->id) selected="selected" @endif>{{$especialidad->especialidad}} </option>
				@endif
			@endforeach
		@else
			@foreach($especialidades as $especialidad)
				<option value="{{$especialidad->id}}" @if($medico->id_especialidad==$especialidad->id) selected="selected" @endif>{{$especialidad->especialidad}}</option>
			@endforeach
		@endif
	</select>
</div>

<div class="form-group{{ $errors->has('nombres') ? ' has-error' : '' }}">
	{!! Form::label('nombres','* Nombres') !!}
	{!! Form::text('nombres',$medico->nombres,['class' => 'form-control','required' => 'required','placeholder' => 'Ej: Martin José', 'title' => 'Ingrese el/los Nombre(s) del Paciente', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('nombres') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>

<div class="form-group{{ $errors->has('apellidos') ? ' has-error' : '' }}">
	{!! Form::label('apellidos','* Apellidos') !!}
	{!! Form::text('apellidos',$medico->apellidos,['class' => 'form-control','required' => 'required','placeholder' => 'Ej: Campos Ribas', 'title' => 'Ingrese el/los Apellido(s) del Paciente', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('apellidos') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>

<div class="form-group{{ $errors->has('cedula') ? ' has-error' : '' }}">
	{!! Form::label('cedula','* Cédula') !!}
	
	<select class="form-control" style="width: 70px;" name="nacionalidad" id="nacionalidad" title="Seleccione la nacionalidad del paciente" >
		<option value="V" @if($medico->nacionalidad=="V") selected="selected" @endif >V</option>
		<option value="E" @if($medico->nacionalidad=="E") selected="selected" @endif >E</option>
	</select>
	{!! Form::text('cedula', $medico->cedula, ['class' => 'form-control','placeholder' => 'Ej: 1234567','required' => 'required', 'title' => 'Ingrese la cédula del paciente sin separación por punto(.) o espacios','maxlength' => '8', 'style'=>$errors->has('cedula') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>

<div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
	{!! Form::label('telefono','* Teléfono') !!}
	<select name="codigo_telf" id="codigo_telf" style="width: 80px;" class="form-control" title="Seleccione el código del número telefónico">
		<option value="0244" @if($medico->codigo_telf=="0244") selected="selected" @endif >0244</option>
		<option value="0412" @if($medico->codigo_telf=="0412") selected="selected" @endif >0412</option>
		<option value="0414" @if($medico->codigo_telf=="0414") selected="selected" @endif >0414</option>
		<option value="0424" @if($medico->codigo_telf=="0424") selected="selected" @endif >0424</option>
		<option value="0416" @if($medico->codigo_telf=="0416") selected="selected" @endif >0416</option>
		<option value="0426" @if($medico->codigo_telf=="0426") selected="selected" @endif >0426</option>
	</select>
	{!! Form::text('telefono', $medico->telefono, ['class' => 'form-control','required' => 'required', 'maxlength' => '7','placeholder' => 'Ej: 1234567', 'style'=>$errors->has('telefono') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>

<div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
	{!! Form::label('direccion','* Dirección') !!}
	{!! Form::textarea('direccion', $medico->direccion, ['class' => 'form-control','required' => 'required', 'placeholder' => 'Ej: Calle Manhattan, casa nro. 4', 'title' => 'Ingrese la dirección del paciente', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('direccion') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>