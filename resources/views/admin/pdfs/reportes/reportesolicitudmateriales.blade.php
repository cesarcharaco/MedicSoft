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
            <p align="center"><strong>SOLICITUD DE MATERIALES</strong></p>
            <BR>
            <p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;Mediante la presente hago la solicitud de material para el abastecimiento de nuestro inventario para fecha {{$fecha}}, esperando su pronta respuesta.</p>

<br><br>
            
            <table align="center" border="1" width="100%" >
                  
                  <tr>
                        <th><strong>Cantidad</strong></th>
                        <th><strong>Descripción</strong></th>
                        <th><strong>Modelo</strong></th>
                        <th>Serial</th>
                  </tr>
                  @foreach($solicitud as $key)
                  <tr>
                        
                        <td>{{$key->cantidad}}</td>
                        <td>{{$key->materiales->tipo_material}} @if($key->materiales->descripcion!="?") {{$key->materiales->descripcion}} @endif</td>
                        <td>{{$key->materiales->modelo_marca}}</td>
                        <td>{{$key->materiales->serial}}</td>
                        
                  </tr>
                  @endforeach
            </table>
            <br><br>
            <p align="center">__________________________________</p><br>
            <p align="center">Gerente General Abraham Blanco</p>
</body>
</html>
                   
