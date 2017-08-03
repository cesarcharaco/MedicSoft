<style type="text/css">
	
	.vertical{
		position:relative;
		writing-mode:tb-rl;
		filter:flipH() flipV();
		max-width: 40px;
	}

</style>
<table id="example1" class="table table-bordered table-hover">
	<tr>
		<td colspan="3" style="text-align:center"><strong>UNIDAD MÉDICA JOSÉ GREGORIO HERNÁNDEZ Y LA CHINITA</strong><br>Fecha: {{date('d-m-Y')}}</td>
		<td colspan="3"></td>
		<td colspan="60"></td>
	</tr>
	<tr>
		<td>Nro</td>
		<td style="text-align:center" >Nombre y Apelido</td>
		<td style="text-align:center">C.I. Beneficiario</td>
		<td style="text-align:center">Edad</td>
		<td style="text-align:center">C.I. Titular</td>
		<td style="text-align:center">Titular</td>
		@foreach($tipoconsultas as $tipo)
			<td>
				{{$tipo->consulta}}
			</td>
		@endforeach
	</tr>
	<?php $num=0; ?>
	@foreach($consultas as $consulta)
		<tr>
			<td>
				{{$num=$num+1}}
			</td>
			<td>
				{{$consulta->pacientesnt->nombres}} {{$consulta->pacientesnt->apellidos}}
			</td>
			<td>
				{{ $consulta->pacientesnt->nacionalidad }}-{{ $consulta->pacientesnt->cedula }}
			</td>
			<td>
				{{$consulta->pacientesnt->edad}}
			</td>
			<td>
				{{ $consulta->pacientesnt->pacientes->nacionalidad }}-{{ $consulta->pacientesnt->pacientes->cedula }}
			</td>
			<td>
				{{$consulta->pacientesnt->pacientes->nombres}} {{$consulta->pacientesnt->pacientes->apellidos}}
			</td>
			@foreach($tipoconsultas as $tipo)
			<?php $cont=0; ?>
				@foreach($vistas as $vista)
					@if($tipo->id == $vista->consultasmontos->id_tipoconsulta AND $vista->id_pacientent==$consulta->id_pacientent)
						<td><?php echo $vista->diagnostico; ?></td>
						<?php $cont++; ?>
					@endif
				@endforeach
				@if($cont==0)
					<td></td>
				@endif
			@endforeach
		</tr>
	@endforeach

</table>

<table id="example1" class="table table-bordered table-hover">
	<tr>
		<td></td>
	</tr>
</table>