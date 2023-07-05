<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil Administrador</title>
    <link rel="stylesheet" href="build/css/perfil_admin.css">
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
				<div class="letranav"></div>
				<div class="oo">						
					<a href="login.php"><img class="mm" src="src\img\salida.png"alt="icono_salir"></a>							
				</div>
			</nav>
		</header>
	<br><br> 
	<main>
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="xx">	  
							<div style="background-color: #f18484" class="yy">
								<div class="bordetop">																	
									<img class="foto_car_catalogo" src="src\img\car_1_catalogo.jpg"alt="">
									<img class="foto_car_catalogo" src="src\img\car_3_catalogo.jpg" alt="">
									<img class="foto_car_catalogo" src="src\img\car_4_catalogo.jpg" alt="">
								</div>
								<br>
								<a href="catalogo_admin.php"><div class="centrar_boton">
									<input class="btn btn-primary" type="button" value="Ver catálogo"></div>
								</a>						
							</div>
						</div>
				
				
				</div>

				<div class="col-sm-6">				
					<div class="x1">
						<a href="administracion_vehiculos.php"><img class="i1" src="src\img\agregar_vehiculo.png" alt="foto administracion vehiculo"></a>
					</div>
					<br><br><br>
					<div class="x1">
						<a href="administracion_trabajadores.php"><img class="i1" src="src\img\admin_traba.png" alt="foto administracion vehiculo"></a>
					</div>
					<br><br><br>
					<div class="x1">
						<a href="historico.php"><img class="i1" src="src\img\historico_boton.png" alt="foto administracion vehiculo"></a>
					</div>
				</div>
			  
			</div>
		</div>
					   
	</main>
	

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
	integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" 
	integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" 
	integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
	<br>
	<div/>
<footer class="footer">
	<div>
		<p>&copy; 2023 Todos los derechos reservados.</p>
	</div>
</footer>
</body>


</html>