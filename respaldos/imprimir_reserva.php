<?php
require __DIR__ . '/db/funciones.php';
$db = conectarDB();
$consulta = obtener_productos();
if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$nombre_cte = $_POST['nombre_cliente'];
	$ap_pat_cliente = $_POST['ap_pat_cliente'];
	$ap_mat_cliente = $_POST['ap_mat_cliente'];
	$rut_cte = $_POST['rut_cte'];
	$dv_cte = $_POST['dv_cte'];
	$licencia = $_POST['licencia'];
	$telefono_cte = $_POST['telefono_cte'];
	$marca = $_POST['marca'];
	$modelo = $_POST['modelo'];
	$ano = $_POST['ano'];
	$color = $_POST['color'];
	$patente = $_POST['patente'];
	$nombre_aval = $_POST['nombre_aval'];
	$ap_pat_aval = $_POST['ap_pat_aval'];
	$ap_mat_aval = $_POST['ap_mat_aval'];
	$rut_aval = $_POST['rut_aval'];
	$dv_aval = $_POST['dv_aval'];
	$correoaval = $_POST['correoaval'];
	$telefono_aval = $_POST['telefono_aval'];
	$fecha_salida = $_POST['fecha_salida'];
	$fecha_llegada = $_POST['fecha_llegada'];
	$valor_arriendo = $_POST['valor_arriendo'];
	$id_vehiculo = $_POST['id_vehiculo'];
	
	$query_disponibilidad = "SELECT disponible FROM  vehiculo WHERE id_vehiculo = ${id_vehiculo};";
	$resultado_disponibilidad = mysqli_query($db, $query_disponibilidad);
	$resultado_disponibilidad2 = mysqli_fetch_assoc($resultado_disponibilidad);

	if($resultado_disponibilidad2['disponible'] == "si"){
		$query_para_historico = "INSERT INTO historico_registro (nombre_cliente, apellido_cliente, rut, dv, marca,modelo, patente,	
		fecha_salida, fecha_regreso, id_vehiculo) VALUES('$nombre_cte', '$ap_pat_cliente',$rut_cte ,
		'$dv_cte', '$marca', '$modelo','$patente', '$fecha_salida', '$fecha_llegada', $id_vehiculo)";
		$resultado = mysqli_query($db,$query_para_historico);	
		$timestamp1 = strtotime($fecha_llegada);
		$timestamp2 = strtotime($fecha_salida);
		$diferencia = $timestamp1 - $timestamp2;
		$numeroDias = round($diferencia / (60 * 60 * 24)+1);
		$resultado_pagar = $numeroDias * $valor_arriendo;
		$query_actualiza_disponibilidad = "UPDATE vehiculo SET disponible = 'no' WHERE id_vehiculo = ${id_vehiculo}; ";		
		$resultado_act_dis = mysqli_query($db, $query_actualiza_disponibilidad);
		echo '<script>alert("Vehículo reservado correctamente");</script>';	
	}else{
		echo '<script>alert("Vehículo no se encuentra disponible");</script>';		
		$nombre_cte = '';
		$ap_pat_cliente = '';
		$ap_mat_cliente = '';
		$rut_cte = '';
		$dv_cte = '';
		$licencia = '';
		$telefono_cte = '';
		$marca = '';
		$modelo = '';
		$ano = '';
		$color = '';
		$patente = '';
		$nombre_aval = '';
		$ap_pat_aval = '';
		$ap_mat_aval = '';
		$rut_aval = '';
		$dv_aval = '';
		$correoaval = '';
		$telefono_aval = '';
		$fecha_salida = '';
		$fecha_llegada = '';
		$valor_arriendo = '';
		$id_vehiculo = '';
	}
	/*echo "<pre>";
			var_dump($_POST);  
		echo "</pre>"; 	*/	
			
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imprimir reserva</title>
    <link rel="stylesheet" href="build/css/imprimir_reserva.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
	integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" 
	integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
	integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
	<script src="src\js\script.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.0/jspdf.umd.min.js"></script>

    </head>
    <body style="background-color: #6c0202">
	<div class="content">
		<header>
			<nav class="ll">			
				<div class="divflex">
					<img class="bordelogo" src="src\img\logo_3_gif.gif" style="width: 90px; height: 90px;" alt="logo principal">
				</div>
				<div  style="background-color: #6c0202" class="letranav"></div>										
				<div class="oo">						
					<a href="#"onclick="goBack()"><img class="mm" src="src\img\volver.png"alt="icono_icono_volver"></a>							
				</div>
			</nav>
		</header>
	
	<br><br>	

	<div class="redondear marco_crear form-container" >
		<form action="transbank-pay.php" enctype="multipart/form-data" method="GET" id="miFormulario">
				<table borde>
					<div class="centrar bordediv degradado_re_hist">
						<h2>Resumen de reserva</h2>
					</div>
					<tr>
						<th class="fgh" COLSPAN=2>
							Cliente		
						</th>	
					</tr>
					<tr>
						<td >ID vehículo: </td>
						<td COLSPAN=2><?php echo $id_vehiculo; ?></td>						
					</tr>
					<tr>
						<td >Nombre Cliente: </td>
						<td ><?php echo $nombre_cte; ?></td>
					</tr>
					<tr>
						<td>Apellido paterno: </td>
						<td><?php echo $ap_pat_cliente; ?></td>
					</tr>
					<tr>
						<td>Apellido materno: </td>
						<td><?php echo $ap_mat_cliente; ?></td>
					</tr>
					<tr>
						<td>Rut: </td>
						<td><?php echo $rut_cte; ?>-<?php echo $dv_cte; ?></td>
					</tr>
					<tr>
						<td>Licencia: </td>
						<td><?php echo $licencia; ?></td>
					</tr>
					<tr>
						<td>Telefono: </td>
						<td>+56 <?php echo $telefono_cte; ?></td>
					</tr>
					<tr>
						<th class="fgh" COLSPAN=2>
							Vehículo		
						</th>	
					</tr>
					<tr>
						<td>Marca: </td>
						<td><?php echo $marca; ?></td>
					</tr>
					<tr>
						<td>Modelo: </td>
						<td><?php echo $modelo; ?></td>
					</tr>
					<tr>
						<td>Año: </td>
						<td><?php echo $ano; ?></td>
					</tr>
					<tr>
						<td>Color: </td>
						<td><?php echo $color; ?></td>
					</tr>
					<tr>
						<td>Patente: </td>
						<td><?php echo $patente; ?></td>
					</tr>							
					<tr>	
						<th class="fgh" COLSPAN=2>
							Aval		
						</th>	
					</tr>
					<tr>
						<td>Nombre aval: </td>
						<td><?php echo $nombre_aval; ?></td>
					</tr>
					<tr>
						<td>Apellido paterno: </td>
						<td><?php echo $ap_pat_aval; ?></td>
					</tr>
					<tr>
						<td>Apellido materno: </td>
						<td><?php echo $ap_mat_aval; ?></td>
					</tr>
					<tr>
						<td>Rut: </td>
						<td><?php echo $rut_aval; ?>-<?php echo $dv_aval; ?></td>
					</tr>
					<tr>
						<td>Correo: </td>
						<td><?php echo $correoaval; ?></td>
					</tr>
					<tr>
						<td>Teléfono: </td>
						<td>+56 <?php echo $telefono_aval; ?></td>
					</tr>
					<tr>
						<th class="fgh" COLSPAN=2>
							Reserva		
						</th>	
					</tr>
					<tr>
						<td>Fecha de salida: </td>
						<td><?php echo $fecha_salida; ?></td>
					</tr>
					<tr>
						<td>Fecha de llegada: </td>
						<td><?php echo $fecha_llegada; ?></td>
					</tr>
					<tr>
						<td>Valor a pagar: </td>
						<td>$<?php echo $resultado_pagar; ?></td>
					</tr>					
				</table>	
				
		</form>	
			
		<br>	
		<div class="estilo_tbk">
			<a href="transbank-pay.php?parametro1=<?php echo $resultado_pagar; ?>"><img src="src/img/boton_pagar.png"  target="_blank" style="width: 60%; height: 35%;" alt="img boton pagar"></a>
		</div>
		<div class="centrar">			
			<button id="imprimirBtn" class="button btn btn-primary" onclick="imprimirFormulario()">Imprimir</button>			
			<a href="index.php"><button class="button btn btn-primary" >Salir</button></a>				
		</div>
	</div>
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
	integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" 
	integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" 
	integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
	<div/>
<footer class="footer">
	<div>
		<p>&copy; 2023 Todos los derechos reservados.</p>
	</div>
</footer>
</body>
</html>