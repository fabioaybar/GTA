<?php
require __DIR__ . '/db/funciones.php';
$db = conectarDB();
		
$errores = [];
	$nombre = '';
    $segundo_nombre = '';
	$apellido_paterno = '';
	$apellido_materno = '';
	$rut = '';
	$digito_verificador = '';
	$direccion = '';	
	$telefono = '';
	$correo = '';
    $fecha_ingreso = '';
    $sueldo = '';
    $imagen = '';
	$cargo = '';

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
	if (!preg_match('/^\d{7,8}$/', $rut)) {
		$errores[] = "El rut debe tener entre 7 y 8 dígitos numéricos";
	}
	if (!preg_match('/^\d{9,10}$/', $telefono)) {
		$errores[] = "El telefono debe contener entre 9 y 10 dígitos numéricos";
	}


	if (empty($errores)){

		$carpetaImagenes2 = 'imagenes_trabajadores/';

		if(!is_dir($carpetaImagenes2)){
			mkdir($carpetaImagenes2);
		}
	
		$nombreImagen = md5(uniqid(rand(), true)).".jpg";
		move_uploaded_file($imagen['tmp_name'],$carpetaImagenes2 . $nombreImagen);
	
		
		$query = "INSERT INTO operador (nombre, segundo_nombre, apellido_paterno, apellido_materno, rut, digito_verificador, 
		direccion, telefono, correo, fecha_ingreso, sueldo, imagen, cargo) VALUES('$nombre','$segundo_nombre','$apellido_paterno',
		'$apellido_materno',$rut, '$digito_verificador', '$direccion', $telefono, '$correo', '$fecha_ingreso',
		'$sueldo','$nombreImagen','$cargo')";
	
		$resultado = mysqli_query($db,$query);	
		echo '<script>alert("Trabajador agregado correctamente");</script>';		
		
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
    <title>Crear ficha trabajador</title>
    <link rel="stylesheet" href="build/css/crear_trabajador.css">
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
				<fieldset>
					<legend class="centrar">Agregar trabajador</legend>				
						<?php foreach($errores as $error): ?>
							<div class="alerta">
								<?php echo "Alerta!"; ?>
								<?php echo $error; ?>
							</div>
						<?php endforeach; ?>
					<br><br>
						<label class="" for="nombre" class="ancholabel" >Nombre: </label>
						<input class="" type="text" maxlength="20" id="nombre" name="nombre" placeholder="Nombre trabajador"  value="<?php echo $nombre; ?>">	
					<br><br>					
						<label class="" for="segundo_nombre">Segundo nombre: </label>
						<input class="" maxlength="20" type="text" id="segundo_nombre" name="segundo_nombre"  placeholder="Segundo nombre" value="<?php echo $segundo_nombre; ?>">					
					<br><br>					
						<label for="apellido_paterno">Apellido paterno:</label>
						<input type="text" maxlength="20" id="apellido_paterno" name="apellido_paterno"<?php  ?> placeholder="Apellido paterno" value="<?php echo $apellido_paterno; ?>">					
					<br><br>				
						<label for="apellido_materno">Apellido materno:</label>
						<input type="text" maxlength="20" id="apellido_materno" name="apellido_materno" <?php  ?> placeholder="Apellido materno" value="<?php echo $apellido_materno; ?>">					
					<br><br>	
						<div >				
							<label  class="labelrut" for="rut">Rut:</label>
							<input class="inputrut" type="number" id="rut" name="rut" <?php  ?> placeholder="Rut" value="<?php echo $rut; ?>">		
							<label  class="guionrut" for="digito_verificador">-</label>
							<input class="inputdv" type="text" id="digito_verificador" maxlength="1" name="digito_verificador" <?php  ?> placeholder="dv" value="<?php echo $digito_verificador; ?>">
						</div>			
					<br>				
						<label for="direccion">Dirección: </label>
						<input type="text" maxlength="45" id="direccion" name="direccion" <?php  ?> placeholder="Ej: Av. Santa rosa #556" value="<?php echo $direccion; ?>">					
					<br><br>
						<label for="telefono">Teléfono: </label>
						<input type="text" id="telefono" name="telefono" <?php  ?> placeholder="Ej:912345678" value="<?php echo $telefono; ?>">					
					<br><br>
						<label for="correo">Correo: </label>
						<input type="text" id="correo" name="correo" <?php  ?> placeholder="Ej: 123@gta.cl" value="<?php echo $correo; ?>">					
					<br><br>
						<label for="fecha_ingreso">Fecha de ingreso:</label>
						<input type="date" id="fecha_ingreso" name="fecha_ingreso" value="<?php echo $fecha_ingreso; ?>">
					<br><br>
						<label for="sueldo">Sueldo:</label>
						<input type="number" id="sueldo" maxlength="9" name="sueldo" placeholder="Sueldo" value="<?php echo $sueldo; ?>">
					<br><br>
						<label for="cargo">Cargo:</label>
						<input type="text" id="cargo" name="cargo" placeholder="Cargo" value="<?php echo $cargo; ?>">
					<br><br>
						<label for="imagen">Imagen: </label>					
						<input type="file" id="imagen" name="imagen">
				</fieldset>
				<br>
				<div class="centrar">
					<input type="submit" value="Agregar trabajador" class="btn btn-primary">
				</div>
				<br>
			</form>   
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