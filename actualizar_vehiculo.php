<?php
//validar que sea un id valido
$id_vehiculo = $_GET['id'];
$id_vehiculo = filter_var($id_vehiculo, FILTER_VALIDATE_INT);
if (!$id_vehiculo){
    header("Location: catalogo_admin.php");
    exit();
}
require __DIR__ . '/db/funciones.php';
$db = conectarDB();
$consulta = "SELECT * FROM vehiculo WHERE id_vehiculo = ${id_vehiculo}";
$resultado = mysqli_query($db, $consulta);
$vehiculo = mysqli_fetch_assoc($resultado);


$errores = [];
	$marca = $vehiculo['marca'];
	$modelo = $vehiculo['modelo'];
	$ano = $vehiculo['ano'];
	$valor = $vehiculo['valor'];
	$color = $vehiculo['color'];
	$patente = $vehiculo['patente'];	
	$imagen = $vehiculo['imagen'];
	$disponible = $vehiculo['disponible'];

if($_SERVER['REQUEST_METHOD'] === 'POST'){

	$marca = $_POST['marca'];
	$modelo = $_POST['modelo'];
	$ano = $_POST['ano'];
	$valor = $_POST['valor'];
	$color = $_POST['color'];
	$patente = $_POST['patente'];	
	$imagen = $_FILES['imagen'];
	$disponible = $_POST['disponible'];
	
	

	if (!$marca){
		$errores[] = "Debes añadir una marca";
	}
	if (!$modelo){
		$errores[] = "Debes añadir un modelo";
	}
	if (!$ano){
		$errores[] = "Debes añadir el año";
	}
	if (!$valor){
		$errores[] = "Debes añadir el valor";
	}
	if (!$color){
		$errores[] = "Debes añadir el color";
	}
	if (!$patente){
		$errores[] = "Debes añadir la patente";
	}
	if (!$disponible){
		$errores[] = "Debes añadir la disponibilidad";
	}
	if (empty($errores)){
        $carpetaImagenes = 'imagenes_vehiculos/';

        if(!is_dir($carpetaImagenes)){
			mkdir($carpetaImagenes);
		}

        $nombreImagen = '';

        if($imagen['name']){
            unlink($carpetaImagenes . $vehiculo['imagen']);    
            $nombreImagen = md5(uniqid(rand(), true)).".jpg";
		    move_uploaded_file($imagen['tmp_name'],$carpetaImagenes . $nombreImagen);        
        }else{
            $nombreImagen = $vehiculo['imagen'];
        } 
		$query = "UPDATE vehiculo SET marca = '${marca}', modelo = '${modelo}', ano = ${ano}, valor = ${valor}, 
        color = '${color}', patente = '${patente}', disponible = '${disponible}',imagen = '${nombreImagen}' WHERE id_vehiculo = ${id_vehiculo}; ";		

        
		$resultado = mysqli_query($db,$query);	
		echo '<script>alert("Vehículo actualizado correctamente");</script>';		
        header("Location: catalogo_admin.php");		
	}	
}
		 
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar vehiculo</title>
    <link rel="stylesheet" href="build/css/actualizar_vehiculo.css">
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
				<div style="background-color: #6c0202" class="letranav"></div>
				<div class="oo">						
					<a href="catalogo_admin.php"><img class="mm" src="src\img\volver.png"alt="icono_salir"></a>							
				</div>
			</nav>
		</header>

	<br><br>	

	<main>

		<div class="marco_crear redondear">
			<form method ="POST" enctype="multipart/form-data" >
				<table>
					<div class="centrar bordediv degradado_re_hist">

					
					<legend class="centrar">Actualizar vehículo</legend>				
						<?php foreach($errores as $error): ?>
							<div class="alerta">
								<?php echo "Alerta!"; ?>
								<?php echo $error; ?>
							</div>
						<?php endforeach; ?>
					</div>
					<br><br>
					<tr>
						<td> <label for="marca">Marca</label> </td>
						<td COLSPAN=><input type="text" id="marca" name="marca" placeholder="Marca" value="<?php echo $marca; ?>"></td>						
					</tr>	
					
					<tr>
						<td ><label for="modelo">Modelo: </label></td>
						<td ><input type="text" id="modelo" name="modelo"  placeholder="Modelo del vehiculo" value="<?php echo $modelo; ?>"></td>
					</tr>
					<tr>
						<td ><label for="color">Color:</label></td>
						<td ><input type="text" id="color" name="color" <?php  ?> placeholder="Color del vehiculo" value="<?php echo $color; ?>">	</td>
					</tr>
					<tr>
						<td><label for="Ano">Año:</label> </td>
						<td><input type="int" id="ano" name="ano"min="1900" max="2030" <?php  ?> placeholder="Año del vehiculo" value="<?php echo $ano; ?>"></td>
					</tr>
					<tr>
						<td><label for="valor">Valor:</label></td>
						<td><input type="int" id="valor" name="valor" <?php  ?> placeholder="Valor del vehiculo" value="<?php echo $valor; ?>"></td>
					</tr>
					<tr>
						<td><label for="patente">Patente: </label></td>
						<td><input type="text" id="patente" name="patente" <?php  ?> placeholder="Patente Ej: ABCD-12" value="<?php echo $patente; ?>">	</td>
					</tr>
					<tr>
						<td><label for="disponible">Disponible: </label></td>
						<td><select name="disponible">
							<option value="<?php echo $disponible; ?>"  >--Seleccionar--</option>
							<option  value= "si" >Sí</option>
							<option  value= "no" >No</option>
						</select></td>
					</tr>
					<tr>
						<td><label for="imagen">Imagen: </label> </td>
						<td><input type="file" id="imagen" name="imagen">	</td>
					</tr>
									
				</table>
				<br>
				<div class="centrar_boton">
					<input type="submit" value="Actualizar" class="btn btn-primary">
				</div>			
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