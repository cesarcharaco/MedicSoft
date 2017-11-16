<input type="hidden" name="fecha" value="{{$fecha}}">
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
					@if($key->disponible!=0 )
					<option value="{{$key->id}}">{{$key->tipo_material}} - {{$key->descripcion}} - {{$key->modelo_marca}} - Disponible: {{$key->disponible}} - Stock Máximo: {{$key->stock_max}}</option>
					@endif
				@endforeach
			</select>
			</div>
			</td>
			<td class="eliminar">Eliminar</td>
		</tr>
		<?php $i=0; ?>
		@foreach($solicitud as $key2)
		<tr>
			<td width="30">
			{!! Form::number('cantidad[]',$key2->cantidad,['class' => 'form-control', 'style' => 'width:5em','placeholder' => '1','title' => 'Ingrese la cantidad a solicitar por el material', 'min' => '1', 'required' => 'required', 'maxlength' => '4','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);']) !!}</td>
			<td>

			<select name="id_material[]" style="width:100% important!" class="form-control select2" title="Seleccione el material a solicitar">
				@foreach($materiales as $key)
				@if($key->disponible!=0 )
					<option value="{{$key->id}}" @if($key2->id_material==$key->id) selected="selected[]" @endif >{{$key->tipo_material}} - {{$key->descripcion}} - {{$key->modelo_marca}} - Disponible: {{$key->disponible}} - Stock Máximo: {{$key->stock_max}} </option>
				@endif
				@endforeach
			</select>
			</td>
			<td @if($i>0) class="eliminar" @endif >@if($i>0) Eliminar @endif</td>
		</tr>
		<?php $i++; ?>
		@endforeach
	</tbody>
</table>
	
</div>