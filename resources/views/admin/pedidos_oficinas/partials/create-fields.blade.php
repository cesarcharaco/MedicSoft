<div class="form-group">
	{!! Form::label('oficina','* Oficina') !!}
	{!! Form::select('id_oficina',$oficinas,null,['class' => 'form-control','required' => 'required','title' => 'Seleccione la oficina que realizará la solicitud del material']) !!}

</div>

<div class="form-group">
	{!! Form::label('empleado','* Empleado') !!}
	{!! Form::text('empleado',null,['class' => 'form-control','required' => 'required','title' => 'Ingrese el empleado que realizará el pedido']) !!}
</div>
<div class="form-group{{ $errors->has('cedula') ? ' has-error' : '' }}">
	{!! Form::label('cedula','* Cédula') !!}
	
	<select class="form-control select2" style="width: 70px;" name="nacionalidad" id="nacionalidad" title="Seleccione la nacionalidad del paciente" >
		<option value="V">V</option>
		<option value="E">E</option>
	</select>
	{!! Form::text('cedula', null, ['class' => 'form-control','placeholder' => 'Ej: 1234567','required' => 'required', 'title' => 'Ingrese la cédula del paciente sin separación por punto(.) o espacios','maxlength' => '8', 'style'=>$errors->has('cedula') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>
<div class="form-group" align="right">
	<!-- Botón para agregar filas -->
<input type="button" class="btn bg-orange" id="agregar" value="+ Agregar Material" />
</div>
<div class="form-group">
<table id="tabla" class="table table-bordered table-striped" responsive="responsive">
	<thead>
	<tr>
		<div class="col-lg-4 col-md-4 col-xs-4" ><th>Cant.</th></div>
		<div class="col-lg-4 col-md-4 col-xs-4" ><th style="text-align: center;">Material</th></div>
		<div class="col-lg-4 col-md-4 col-xs-4" ><th>Opción</th></div>
	</tr>
	</thead>
	<tbody>
		<tr class="fila-base">
			<td width="30">
			<div class="form-group">
			{!! Form::number('cantidad[]',1,['class' => 'form-control', 'style' => 'width:5em','placeholder' => '1','title' => 'Ingrese la cantidad a solicitar por el material', 'min' => '1', 'required' => 'required', 'maxlength' => '4','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);']) !!}
			</div>
			</td>
			<td>
			<div class="form-group">
			<select name="id_material[]" id="id_material"  style="width:100% important!" class="form-control material" title="Seleccione El material a solicitar">
				@foreach($materiales2 as $key)
					<option value="{{$key->id}}">{{$key->tipo_material}} - {{$key->descripcion}} - {{$key->modelo_marca}}</option>
				@endforeach
			</select>
			</div>
			</td>
			<td class="eliminar">Eliminar</td>
		</tr>
		<tr>
			<td width="30">
			{!! Form::number('cantidad[]',null,['class' => 'form-control', 'style' => 'width:5em','placeholder' => '1','title' => 'Ingrese la cantidad a solicitar por el material', 'min' => '1', 'required' => 'required', 'maxlength' => '4','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);']) !!}</td>
			<td>
			<select name="id_material[]" style="width:100% important!" class="form-control select2" title="Seleccione el material a solicitar">
				@foreach($materiales as $key)
					<option value="{{$key->id}}">{{$key->tipo_material}} - {{$key->descripcion}} - {{$key->modelo_marca}}</option>
				@endforeach
			</select>
			</td>
			<td ></td>
		</tr>
	</tbody>
</table>
	
</div>