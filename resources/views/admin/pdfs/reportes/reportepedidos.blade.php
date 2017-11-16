<!DOCTYPE html>
<html>
<head>
	<title>ReportePedidos_<?php echo date('Y-m-d'); ?></title>

</head>
<body>
 			<table align="center" border="0">
            	<tr>
            		<th align="center"> <img src="..\public\logoclinica.png" class="user-image" alt="User Image" width="100%"></th>
            	</tr>
            	
				
            </table>
            <br></br>
            <p align="center"><strong>TOTAL DE MATERIALES SOLICITADOS PARA FECHA {{$fecha}}</strong></p>
            <BR>
            
            <table align="center" border="1" width="100%" >
            	
            	<tr>
            		<th><strong>Cantidad</strong></th>
            		<th><strong>Descripción</strong></th>
            		<th><strong>Modelo</strong></th>
            		<th>Serial</th>
            	</tr>
            	@for($i=0;$i<$fin;$i++)
            	<tr>
            		@for($j=0;$j<4;$j++)
            		<td>{{$tabla[$i][$j]}}</td>
            		@endfor
            	</tr>
            	@endfor
            </table>
            
</body>
</html>
                   
 