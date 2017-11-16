<div class="form-group">
	{!! Form::label('responsable','* Responsable') !!}
	{!! Form::text('responsable',null,['class' => 'form-control','required' => 'required','title' => 'Ingrese el responsable del envío']) !!}
</div>


<div class="form-group">
<table id="tabla" class="table table-bordered table-striped" responsive="responsive">
	<thead>
	<tr>
		<div class="col-lg-4 col-md-4 col-xs-4" ><th>Cant.</th></div>
		<div class="col-lg-4 col-md-4 col-xs-4" ><th style="text-align: center;">Material</th></div>
		
	</tr>
	</thead>
	<tbody>
		@foreach($materiales as $key)
		<tr>
			<td width="30">
			<div class="form-group">
			{!! Form::number('cantidad[]',1,['class' => 'form-control', 'style' => 'width:5em','placeholder' => '1','title' => 'Ingrese la cantidad a solicitar por el material', 'min' => '0', 'required' => 'required', 'maxlength' => '4','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);']) !!}
			</div>
			</td>
			<td>
			<div class="form-group">
			{!! Form::hidden('fecha',$key->fecha) !!}
			{!! Form::hidden('id_material[]',$key->id_material) !!}
			{!! Form::hidden('stock_max[]',$key->materiales->stock_max) !!}
			<strong>{{ $key->materiales->tipo_material}} - 
				Descripión: @if($key->materiales->descripcion!="") {{$key->materiales->descripcion}} @endif Cantidad Solicitada: {{$key->cantidad}}</strong>
			</div>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
	
</div>