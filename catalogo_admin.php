<?php
require __DIR__ . '/db/funciones.php';
$consulta = obtener_productos();
$db = conectarDB();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$id = $_POST['id'];	
	$id = filter_var($id, FILTER_VALIDATE_INT);
	if($id){
		$query = "SELECT imagen FROM vehiculo WHERE id_vehiculo = ${id}";
		$resultado = mysqli_query($db,$query);	
		$operador = mysqli_fetch_assoc($resultado);
		unlink('imagenes_vehiculos/' . $operador['imagen']);

		//eliminar propiedad
		$query = "DELETE FROM vehiculo WHERE id_vehiculo = ${id}";
		$resultado = mysqli_query($db,$query);		
		if($resultado){
			header('location: /catalogo_admin.php'); 
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
    <title>Catalogo administrador</title>
    <link rel="stylesheet" href="build/css/catalogo_admin.css">
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
				<div  class="oo">						
					<a href="perfil_admin.php"><img class="mm" src="src\img\volver.png"alt="icono_volver"></a>							
				</div>
			</nav>
		</header>	 
		<main>	
			<br><br>	
			<div class="container">
				<div class="row">
				<?php
					while($servicio = mysqli_fetch_assoc($consulta)){
						$imagen = $servicio['imagen'];
						$marca = $servicio['marca'];
						$modelo = $servicio['modelo'];
						$ano = $servicio['ano'];
						$valor = $servicio['valor'];
						$id = $servicio['id_vehiculo'];
						$color = $servicio['color'];
						$disponible = $servicio['disponible'];
						$patente = $servicio['patente'];
										
						?>												
						<div class="col-md-4">
							<div class="card custom-card ">	
								<img src= "imagenes_vehiculos\<?php echo $imagen ?>" width="100%" height="150px" >								
									<div class="card-body">		
										<h5 class="card-title">ID: <?php echo $id ?></h5>								
										<h5 class="card-title">Marca: <?php echo $marca ?></h5>
										<h5 class="card-title">modelo: <?php echo $modelo ?></h5>
										<h5 class="card-title">Año: <?php echo $ano ?></h5>
										<h5 class="card-title">Valor: <?php echo $valor ?></h5>
										<h5 class="card-title">Color: <?php echo $color ?></h5>	
										<h5 class="card-title">Patente: <?php echo $patente ?></h5>	
										<?php if($disponible == "si"): ?>											
												<div>	
													<h5 class="disponible">disponible: Sí</h5>																					
												</div>
										<?php else: ?>											
												<div>
													<h5 class="card-title nodisponible">disponible: No</h5>																								
												</div>
										<?php endif; ?>
										
										
										<br>
										<form method="POST">	
											<input type="hidden" name="cosa" value="perro">		
											<input type="hidden" name="cosa2" value="gato">					
											<input type="hidden" name="id" class="warning-submit"value="<?php echo $servicio ['id_vehiculo'];?>">
											<input type="submit"  value="Eliminar" class="btn btn-danger">	
											<a href="actualizar_vehiculo.php?id=<?php echo $servicio['id_vehiculo'];?>" class="btn btn-primary">Actualizar</a>									
										</form>
									</div>
							</div>
						</div>
					<?php
					 } 
					?>
				
				</div>
				
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