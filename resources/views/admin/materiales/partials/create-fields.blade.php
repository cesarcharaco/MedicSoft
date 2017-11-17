<div class="form-group{{ $errors->has('tipo_material') ? ' has-error' : '' }}">
	{!! Form::label('tipo_material','* Tipo de Material') !!}
	{!! Form::text('tipo_material',null,['class' => 'form-control','required' => 'required','placeholder' => 'Ej: REACTIVO', 'title' => 'Ingrese el Tipo de Material', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('tipo_material') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>
<div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
	{!! Form::label('descripcion','* Descripción') !!}
	{!! Form::textarea('descripcion',null,['class' => 'form-control','placeholder' => 'Ej: QUÍMICA AUTOMATIZADA', 'title' => 'Ingrese la Descripción del Material','rows' => '5', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('descripcion') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>
<div class="form-group{{ $errors->has('modelo_marca') ? ' has-error' : '' }}">
	{!! Form::label('modelo_marca','* Modelo/Marca') !!}
	{!! Form::text('modelo_marca',null,['class' => 'form-control','required' => 'required','placeholder' => 'Ej: ZMS', 'title' => 'Ingrese el Modelo o Marca del Material', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('modelo_marca') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>
<div class="form-group{{ $errors->has('serial') ? ' has-error' : '' }}">
	{!! Form::label('serial',' Serial') !!}
	{!! Form::text('serial',null,['class' => 'form-control','placeholder' => 'Ej: U2345', 'title' => 'Ingrese el Serial del Material', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'style'=>$errors->has('serial') ? 'border-color: red; border: 1px solid red;': '']) !!}
</div>
<div class="form-group{{ $errors->has('serial') ? ' has-error' : '' }}">
	{!! Form::label('stock_min','Stock Mínimo') !!}
	{!! Form::number('stock_min',1,['class' => 'form-control','placeholder' => '1','title' => 'Ingrese el Stock Mínimo', 'min' => '1', 'required' => 'required', 'maxlength' => '10','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);']) !!}
</div>
<div class="form-group{{ $errors->has('serial') ? ' has-error' : '' }}">
	{!! Form::label('stock_max','Stock Máximo') !!}
	{!! Form::number('stock_max',1,['class' => 'form-control','placeholder' => '100','title' => 'Ingrese el Stock Máximo', 'min' => '1', 'required' => 'required', 'maxlength' => '10','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);']) !!}
</div>