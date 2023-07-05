<?php
require __DIR__ . '/db/funciones.php';
$consulta = obtener_trabajadores();
$db = conectarDB();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$id = $_POST['id'];	
	$id = filter_var($id, FILTER_VALIDATE_INT);
	if($id){
		$query = "SELECT imagen FROM operador WHERE id_operador = ${id}";
		$resultado = mysqli_query($db,$query);	
		$operador = mysqli_fetch_assoc($resultado);
		unlink('imagenes_trabajadores/' . $operador['imagen']);

		//eliminar propiedad
		$query = "DELETE FROM operador WHERE id_operador = ${id}";
		$resultado = mysqli_query($db,$query);		
		if($resultado){
			header('location: /administracion_trabajadores.php');
		}		
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador de trabajadores</title>
    <link rel="stylesheet" href="build/css/administracion_trabajadores.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
	integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body style="background-color: #6c0202">
	<div class="content">
		<header>
			<nav class="ll">			
				<div class="divflex">
					<img class="bordelogo" src="src\img\logo_3_gif.gif" style="width: 90px; height: 90px;" alt="logo principal">
				</div>
				<div style="background-color: #6c0202" class="letranav"></div>
				<div class="oo">						
					<a href="perfil_admin.php"><img class="mm" src="src\img\volver.png"alt="icono_salir"></a>							
				</div>
			</nav>
		</header>
	<main>
		<br><br>
		<a class="margen_boton" href="crear_trabajador.php"><button class="btn btn-primary">Crear nueva ficha trabajador</button></a>
		
	<div class="margenx redondear">
		<table class="degfradado_formularios">
			<tr >
				<th>ID trabajador</th>
				<th>Cargo</th>
				<th>Nombre completo</th>
				<th>Rut</th>
				<th>Dirección</th>
				<th>Teléfono</th>
				<th>Correo</th>
				<th>Fecha ingreso</th>
				<th>Sueldo</th>
				<th>Foto</th>
				<th></th>
			</tr>
			<?php
				while($servicio = mysqli_fetch_assoc($consulta)){
					$imagen = $servicio['imagen'];
					$id = $servicio['id_operador'];
					$cargo =$servicio['cargo'];
					$nombre =$servicio['nombre'];
					$segundo_nombre =$servicio['segundo_nombre'];
					$apellido_pat =$servicio['apellido_paterno'];
					$apellido_mat =$servicio['apellido_materno'];
					$rut =$servicio['rut'];
					$dv =$servicio['digito_verificador'];
					$direccion =$servicio['direccion'];
					$telefono =$servicio['telefono'];
					$correo =$servicio['correo'];
					$fecha_ingreso =$servicio['fecha_ingreso'];
					$sueldo =$servicio['sueldo'];
					$imagen =$servicio['imagen'];

			?>
			<tr>
				<td>#<?php echo $id ?> </td>
				<td><?php echo $cargo ?> </td>
				<td><?php echo $nombre ?> <?php echo $segundo_nombre ?> <?php echo $apellido_pat ?> <?php echo $apellido_mat ?></td>
				<td><?php echo $rut ?>-<?php echo $dv ?></td>
				<td><?php echo $direccion ?> </td>
				<td><?php echo $telefono ?> </td>
				<td><?php echo $correo ?> </td>
				<td><?php echo $fecha_ingreso ?> </td>
				<td><?php echo $sueldo ?> </td>						
				<td>
					<img src= "imagenes_trabajadores\<?php echo $imagen ?>" width="100px" height="100px" > </td>
				<td>
					<form method="POST">	
						<input type="hidden" name="cosa" value="perro">		
						<input type="hidden" name="cosa2" value="gato">					
						<input type="hidden" name="id" class="warning-submit"value="<?php echo $servicio ['id_operador'];?>">
						<input type="submit"  value="Eliminar" class="btn btn-danger">	
						<a href="actualizar_operador.php?id=<?php echo $servicio['id_operador'];?>" class="btn btn-primary">Actualizar</a>									
					</form>
				</td>	
			</tr>
			
			<?php } ?>
		</table>
	</div>
	</main>
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