<?php

$id_operador = $_GET['id'];
$id_operador = filter_var($id_operador, FILTER_VALIDATE_INT);
if (!$id_operador){
    header("Location: administracion_trabajadores.php");
    exit();
}
require __DIR__ . '/db/funciones.php';
$db = conectarDB();
$consulta = "SELECT * FROM operador WHERE id_operador = ${id_operador}";
$resultado = mysqli_query($db, $consulta);
$vehiculo = mysqli_fetch_assoc($resultado);

$errores = [];
	$nombre = $vehiculo['nombre'];
    $segundo_nombre = $vehiculo['segundo_nombre'];
	$apellido_paterno = $vehiculo['apellido_paterno'];
	$apellido_materno = $vehiculo['apellido_materno'];
	$rut = $vehiculo['rut'];
	$digito_verificador = $vehiculo['digito_verificador'];
	$direccion = $vehiculo['direccion'];	
	$telefono = $vehiculo['telefono'];
	$correo = $vehiculo['correo'];
    $fecha_ingreso = $vehiculo['fecha_ingreso'];
    $sueldo = $vehiculo['sueldo'];
    $imagen = $vehiculo['imagen'];
	$cargo = $vehiculo['cargo'];

if($_SERVER['REQUEST_METHOD'] === 'POST'){

	$nombre = $_POST['nombre'];
    $segundo_nombre = $_POST['segundo_nombre'];
	$apellido_paterno = $_POST['apellido_paterno'];
	$apellido_materno = $_POST['apellido_materno'];
	$rut = $_POST['rut'];
	$digito_verificador = $_POST['digito_verificador'];
	$direccion = $_POST['direccion'];	
	$telefono = $_POST['telefono'];
	$correo = $_POST['correo'];
    $fecha_ingreso = $_POST['fecha_ingreso'];
    $sueldo = $_POST['sueldo'];
    $imagen = $_FILES['imagen'];
	$cargo = $_POST['cargo'];
	
	

	if (!$nombre){
		$errores[] = "Debes añadir un nombre";
	}    
	if (!$apellido_paterno){
		$errores[] = "Debes añadir un apellido_paterno";
	}
	if (!$apellido_materno){
		$errores[] = "Debes añadir un apellido_materno";
	}
	if (!$rut){
		$errores[] = "Debes añadir el rut";
	}
	if (!$digito_verificador){
		$errores[] = "Debes añadir el digito_verificador";
	}
	if (!$direccion){
		$errores[] = "Debes añadir la direccion";
	}
	if (!$telefono){
		$errores[] = "Debes añadir el telefono";
	}
	if (!$correo){
		$errores[] = "Debes añadir un correo";
	}
    if (!$fecha_ingreso){
		$errores[] = "Debes añadir una fecha_ingreso";
	}
    if (!$sueldo){
		$errores[] = "Debes añadir el sueldo";
	}
	if (!$cargo){
		$errores[] = "Debes añadir el cargo";
	}


	if (empty($errores)){

		$carpetaImagenes2 = 'imagenes_trabajadores/';

		if(!is_dir($carpetaImagenes2)){
			mkdir($carpetaImagenes2);
		}

		$nombreImagen = '';
	
		if($imagen['name']){
			unlink($carpetaImagenes2 . $vehiculo['imagen']);
			$nombreImagen = md5(uniqid(rand(), true)).".jpg";
			move_uploaded_file($imagen['tmp_name'],$carpetaImagenes2 . $nombreImagen);
		}else{
			$nombreImagen = $vehiculo['imagen'];
		}

		$query = "UPDATE operador SET nombre = '${nombre}', segundo_nombre = '${segundo_nombre}', apellido_paterno = '${apellido_paterno}',
		apellido_materno = '${apellido_materno}', rut = ${rut}, digito_verificador = '${digito_verificador}', direccion = '${direccion}',
		telefono = ${telefono}, correo = '${correo}', fecha_ingreso = '${fecha_ingreso}', sueldo = ${sueldo}, imagen = '${nombreImagen}',
		cargo = '${cargo}' WHERE id_operador = ${id_operador}; ";
		$resultado = mysqli_query($db,$query);	
		echo '<script>alert("Trabajador actualizado correctamente");</script>';		
		header("Location: administracion_trabajadores.php");
	}	 
}
			/*		<?php
					echo "<pre>";
						var_dump($);  
					echo "</pre>"; 
					?>
			*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar operador</title>
    <link rel="stylesheet" href="build/css/actualizar_operador.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
	integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="funciones.js"></script>
    </head>
    <body style="background-color: #6c0202">
	<div class="content">
		<header>
			<nav class="ll">			
				<div class="divflex">
					<img class="bordelogo" src="src\img\logo_3_gif.gif" style="width: 90px; height: 90px;" alt="logo principal">
				</div>
				<div class="letranav"></div>
				<div class="oo">						
					<a href="administracion_trabajadores.php"><img class="mm" src="src\img\volver.png"alt="icono_salir"></a>							
				</div>
			</nav>
		</header>

	<br><br>	

	<main>
		<div class="marco_crear redondear">
			<form method ="POST" enctype="multipart/form-data" >
				<table>
					<div class="centrar bordediv degradado_re_hist">
					<legend class="centrar">Actualizar trabajador <div class="centrar">
                        	<img src= "imagenes_trabajadores\<?php echo $imagen ?>" width="20%" height="20%" >	
                   		 </div></legend>				
						<?php foreach($errores as $error): ?>
							<div class="alerta">
								<?php echo "Alerta!"; ?>
								<?php echo $error; ?>
							</div>
						<?php endforeach; ?>
					</div>
					<br><br>
					<tr>
						<td> <label class="" for="nombre" class="ancholabel" >Nombre: </label> </td>
						<td COLSPAN=><input class="" type="text" id="nombre" name="nombre" placeholder="Nombre trabajador"  value="<?php echo $nombre; ?>">	</td>						
					</tr>	
					
					<tr>
						<td ><label class="" for="segundo_nombre">Segundo nombre: </label></td>
						<td ><input class="" type="text" id="segundo_nombre" name="segundo_nombre"  placeholder="Segundo nombre" value="<?php echo $segundo_nombre; ?>"></td>
					</tr>
					<tr>
						<td ><label for="apellido_paterno">Apellido paterno:</label></td>
						<td ><input type="text" id="apellido_paterno" name="apellido_paterno"<?php  ?> placeholder="Apellido paterno" value="<?php echo $apellido_paterno; ?>"></td>
					</tr>
					<tr>
						<td><label for="apellido_materno">Apellido materno:</label> </td>
						<td><input type="text" id="apellido_materno" name="apellido_materno" <?php  ?> placeholder="Apellido materno" value="<?php echo $apellido_materno; ?>"></td>
					</tr>
					<tr>
						<td><label  class="labelrut" for="rut">Rut:</label></td>
						<td><input class="inputrut" type="int" id="rut" name="rut" <?php  ?> placeholder="Rut" value="<?php echo $rut; ?>">		</td>
						<td><label  class="guionrut" for="digito_verificador">DV</label></td>
						<td><input style="width: 50px;" class="inputdv" type="text" id="digito_verificador" name="digito_verificador" <?php  ?> placeholder="dv" value="<?php echo $digito_verificador; ?>"></td>
					</tr>
					<tr>
						<td><label for="direccion">Dirección: </label></td>
						<td>	<input type="text" id="direccion" name="direccion" <?php  ?> placeholder="Ej: Av. Santa rosa #556" value="<?php echo $direccion; ?>">	</td>
					</tr>
					<tr>
						<td><label for="telefono">Teléfono: </label></td>
						<td><input type="text" id="telefono" name="telefono" <?php  ?> placeholder="Ej:912345678" value="<?php echo $telefono; ?>"></td>
					</tr>
					<tr>
						<td><label for="correo">Correo: </label> </td>
						<td><input type="text" id="correo" name="correo" <?php  ?> placeholder="Ej: 123@gta.cl" value="<?php echo $correo; ?>"></td>
					</tr>
					<tr>
						<td><label for="fecha_ingreso">Fecha de ingreso:</label></td>
						<td><input type="date" id="fecha_ingreso" name="fecha_ingreso" value="<?php echo $fecha_ingreso; ?>"></td>
					</tr>
					<tr>
						<td><label for="sueldo">Sueldo:</label></td>
						<td><input type="int" id="sueldo" name="sueldo" placeholder="Sueldo" value="<?php echo $sueldo; ?>"></td>
					</tr>
					<tr>
						<td><label for="cargo">Cargo:</label></td>
						<td><input type="text" id="cargo" name="cargo" placeholder="Cargo" value="<?php echo $cargo; ?>"></td>
					</tr>
					<tr>
						<td><label for="imagen">Imagen: </label></td>
						<td><input type="file" id="imagen" name="imagen">	</td>
					</tr>
									
				</table>
				<br>
				<div class="centrar_boton">
					<input type="submit" value="Actualizar" class="btn btn-primary">
				</div>			
			</form>	
		</div>
		<br>
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