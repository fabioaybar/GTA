<?php
require __DIR__ . '/db/funciones.php';
$consulta = obtener_historico();
$db = conectarDB();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historico de reserva</title>
    <link rel="stylesheet" href="build/css/historico.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">        
	<script src="src\js\script.js"></script>

	
    </head>
	<body style="background-color: #6c0202"><div class="content">


		<header>
			<nav class="ll">			
				<div class="divflex">
					<img class="bordelogo" src="src\img\logo_3_gif.gif" style="width: 90px; height: 90px;" alt="logo principal">
				</div>
				
				<div  style="background-color: #6c0202" class="letranav"></div>
				<div class="oo">						
					<a href="#"onclick="goBack()"><img class="mm noimprimir" src="src\img\volver.png"alt="icono_icono_volver"></a>							
				</div>
			</nav>
		</header>
	<main>
	

		<br><br>
		<div >
				
			<table id="tabla" >
				<tr >
					<th>N° Registro	</th>
					<th>Nombre cliente</th>
					<th>Rut</th>
					<th>Marca</th>
					<th>Modelo</th>
					<th>Patente</th>
					<th>Id vehículo</th>
					<th>Fecha de reserva</th>
					<th>Fecha salida</th>
					<th>Fecha regreso</th>
				</tr>
				<?php
					while($servicio = mysqli_fetch_assoc($consulta)){
						$id = $servicio['id_historico_registro'];
						$nombre = $servicio['nombre_cliente'];
						$apellido = $servicio['apellido_cliente'];
						$rut = $servicio['rut'];
						$dv = $servicio['dv'];
						$marca = $servicio['marca'];
						$modelo = $servicio['modelo'];
						$patente = $servicio['patente'];
						$fecha_reserva = $servicio['fecha_reserva'];
						$fecha_salida = $servicio['fecha_salida'];
						$fecha_regreso = $servicio['fecha_regreso'];
						$id_vehiculo = $servicio['id_vehiculo'];

				?>
				<tr class="degfradado_formularios">
					<td><?php echo $id ?> </td>
					<td><?php echo $nombre ?> <?php echo $apellido ?></td>
					<td><?php echo $rut ?>-<?php echo $dv ?></td>
					<td><?php echo $marca ?></td>
					<td><?php echo $modelo ?></td>
					<td><?php echo $patente ?></td>
					<td><?php echo $id_vehiculo ?></td>
					<td><?php echo $fecha_reserva ?></td>
					<td><?php echo $fecha_salida ?></td>
					<td><?php echo $fecha_regreso ?></td>
				</tr>
				<?php } ?>				
			</table>
		</div>	<br><br>
		
	</main>	
	<div class="btnImprimir noimprimir">
		<button class="btn btn-primary noimprimir" onclick="imprimirTabla()">Imprimir Histórico</button>
	</div>

	
	<script src="src/js/historico.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
	integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" 
	integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" 
	integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
	<div/>
	<div/>

<footer class="footer">
	<div>
		<p>&copy; 2023 Todos los derechos reservados.</p>
	</div>
</footer>
</body>


</html>