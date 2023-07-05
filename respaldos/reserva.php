<?php
require __DIR__ . '/db/funciones.php';
$db = conectarDB();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva</title>
    <link rel="stylesheet" href="build/css/reserva.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
	integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="src\js\script.js"></script>	
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
					<a href="index.php"><img class="mm" src="src\img\volver.png"alt="icono_icono_volver"></a>							
				</div>
			</nav>
		</header>
	<main>       	 
<br><br>

<!--action="imprimir_reserva.php"-->
<form  method ="POST" action="imprimir_reserva.php">
  <div class="container">
	<div class="row">
		<div class="col-sm-6">
			<div class="form-container degfradado_formularios">
				<div class="centrar diseñolabel	">
					<h4>Cliente</h4>
				</div>
				<br>	 				
				<div class="form-group diseñolabel ">
					<label class=" for="nombre">Nombre:</label>
					<input type="text" id="nombre_cliente" name="nombre_cliente" required placeholder="Nombre">
				</div>
				<div class="form-group">
					<label for="ap_pat_cliente">Apellido Paterno:</label>
					<input type="text" id="ap_pat_cliente" name="ap_pat_cliente" required placeholder="Apellido Paterno">
				</div>
				<div class="form-group">
					<label for="ap_mat_cliente">Apellido Materno:</label>
					<input type="text" id="ap_mat_cliente" name="ap_mat_cliente" required placeholder="Apellido Materno">
				</div>
				<div class="diseñolabel">
					<label for="rut_cte">Rut</label>
					<input  id="rut_cte" name="rut_cte" type="int" required placeholder="Rut">
					<label for="dv_cte">DV</label>
					<input name="dv_cte" id="dv_cte" required type="text">
				</div>
				<div class="form-group">
					<label for="licencia">Licencia:</label>
					<input type="text" id="licencia" name="licencia" required placeholder="Clase: A - B - C ...">
				</div>	
				<div class="form-group">
					<label for="telefono_cte">Telefono:</label>
					<input type="text" id="telefono_cte" name="telefono_cte" required placeholder="912345678">
				</div>		
			</div>
		</div>

		<div class="col-sm-6">
			<div class="form-container degfradado_formularios2">
			<div class="centrar diseñolabel">
					<h4>Vehículo</h4>
				</div>
				<br>				
				<div class="form-group">
					<label for="id_vehiculo">ID vehículo:</label>
					<input type="int" id="id_vehiculo" name="id_vehiculo" required placeholder="ID vehículo">
				</div>
				<div class="form-group">
					<label for="marca">Marca:</label>
					<input type="text" id="marca" name="marca" required placeholder="Marca">
				</div>
				<div class="form-group">
					<label for="modelo">Modelo: </label>
					<input type="text" id="modelo" name="modelo" required placeholder="Modelo">
				</div>
				<div class="form-group">
					<label for="ano">Año</label>
					<input type="text" id="ano" name="ano" required placeholder="Año">
				</div> 
				<div class="form-group">
					<label for="color">Color</label>
					<input type="text" id="color" name="color" required placeholder="Color">
				</div> 
				<div class="form-group">
					<label for="patente">Patente</label>
					<input type="text" id="patente" name="patente" required placeholder="Patente">
				</div>  						
			</div>
		</div>
	</div>
  </div>
  <br><br>
  <div class="container">
	<div class="row">
		<div class="col-sm-6">
			<div class="form-container degfradado_formularios">
				<div class="centrar diseñolabel">
					<h4>Aval</h4>
				</div>
				<br>	 				
				<div class="form-group">
					<label for="nombre_aval">Nombre:</label>
					<input type="text" id="nombre_aval" name="nombre_aval" required placeholder="Nombre">
				</div>
				<div class="form-group">
					<label for="ap_pat_aval">Apellido Paterno:</label>
					<input type="text" id="ap_pat_aval" name="ap_pat_aval" required placeholder="Apellido Paterno">
				</div>
				<div class="form-group">
					<label for="ap_mat_aval">Apellido Materno:</label>
					<input type="text" id="ap_mat_aval" name="ap_mat_aval" required placeholder="Apellido Materno">
				</div>
				<div class="diseñolabel">
					<label for="rut_aval">Rut</label>
					<input  id="rut_aval" name="rut_aval" type="int" required placeholder="Rut">
					<label for="dv_aval">DV</label>
					<input name="dv_aval" id="dv_aval" required type="text">
				</div>
				<div class="form-group">
					<label for="correoaval">Correo:</label>
					<input type="email" id="correoaval" name="correoaval" required placeholder="ejemplo@ejemplo.com">
				</div>
					
				<div class="form-group">
					<label for="telefono_aval">Telefono:</label>
					<input type="text" id="telefono_aval" name="telefono_aval" required placeholder="912345678">
				</div>			
			</div>
		</div> 
		<div class="col-sm-6">
			<div class="form-container degfradado_formularios2">
				<div class="centrar diseñolabel">
					<h4>Reserva</h4>
				</div>
				<br>
					<div class="diseñolabel">							
						<label for="fecha_salida">Fecha de salida:</label>
						<input type="date" id="fecha-salida" name="fecha_salida">
						<br><br>				
						<label for="fecha_llegada">Fecha de llegada:</label>
						<input type="date" id="fecha_llegada" name="fecha_llegada">
					</div>	
					<br><br>
					<div class="form-group">
						<label for="valor_arriendo">Valor arriendo(diario):</label>
						<input type="int" id="valor_arriendo" name="valor_arriendo" required placeholder="$">
					</div>							 							
			</div>
		</div>
	</div>
  </div>
  <br><br>
  	<div class="fondoblanco centrar">
		<div>
		<label>Leer terminos y condiciones <a data-bs-toggle="modal" data-bs-target="#popPelota" href="">Aquí</a></label>
		</div>
		<label for="aceptar_terminos">
			<input type="checkbox" id="aceptar_terminos" name="aceptar_terminos" required>
			Acepto los términos y condiciones
		</label>
	</div>
	<br>
<div class="f centrar">
	<input class= "btn btn-primary" type="submit" value="Generar reserva">	
</div>	


  
             <!-- Modal -->
            <div class="modal fade" id="popPelota" tabindex="-1" aria-labelledby="popPelotaLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="popPelotaLabel">Terminos y condiciones reservas GTA</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                
						Bienvenido a Gran Turismo Avalancha, líder en el servicio de renta de vehículos. Antes de utilizar nuestros servicios, te recomendamos leer detenidamente los siguientes términos y condiciones. Al realizar una reserva o utilizar nuestros vehículos, aceptas cumplir con estos términos y condiciones.

						1. Reservas y Alquiler de Vehículos

						1.1. Para realizar una reserva, debes cumplir con los siguientes requisitos:
							a) Tener al menos [edad mínima] años de edad.
							b) Presentar una licencia de conducir válida y vigente emitida hace al menos [número de años] años.
							c) Proporcionar información precisa y completa al realizar la reserva.

						1.2. Las reservas están sujetas a disponibilidad y podrán ser modificadas o canceladas en función de la disponibilidad de los vehículos. Nos reservamos el derecho de rechazar una reserva si no se cumplen los requisitos necesarios.

						1.3. La duración del alquiler se calculará en base a períodos de 24 horas. Cualquier exceso de tiempo se considerará una extensión del alquiler y estará sujeto a cargos adicionales según nuestras tarifas vigentes.

						1.4. Al recoger el vehículo, deberás presentar una tarjeta de crédito válida a tu nombre para cubrir el depósito de seguridad y cualquier cargo adicional. El depósito se utilizará para cubrir cualquier daño al vehículo, multas de tránsito u otros cargos pendientes al final del período de alquiler.

						2. Uso del Vehículo

						2.1. Debes utilizar el vehículo de acuerdo con las leyes de tránsito y las regulaciones de seguridad vigentes en el lugar donde se encuentre.

						2.2. No está permitido utilizar el vehículo para fines ilegales, incluyendo el transporte de sustancias ilegales o peligrosas.

						2.3. Está prohibido fumar, consumir alcohol o drogas, y transportar mascotas sin el permiso correspondiente en el vehículo.

						2.4. No se permite el uso del vehículo para carreras, pruebas de velocidad o cualquier actividad que ponga en peligro la seguridad del conductor, los pasajeros o terceros.

						2.5. El vehículo solo puede ser conducido por las personas autorizadas y mencionadas en el contrato de alquiler. No se permite prestar, subarrendar o transferir el vehículo a terceros sin el consentimiento previo por escrito de [Nombre de la Empresa].

						2.6. Debes asegurarte de que el vehículo se encuentra cerrado y seguro en todo momento. Eres responsable de cualquier pérdida o daño debido a robo o negligencia en el cuidado del vehículo.

						3. Seguro y Responsabilidad

						3.1. Todos nuestros vehículos están cubiertos por un seguro contra daños a terceros, de acuerdo con las leyes y regulaciones locales. Sin embargo, el arrendatario es responsable por cualquier daño causado al vehículo durante el período de alquiler, incluyendo robo, pérdida o daños.

						3.2. El arrendatario es responsable de

						cualquier multa o infracción de tránsito incurrida durante el período de alquiler. Si recibimos notificaciones de multas o infracciones después del período de alquiler, nos reservamos el derecho de transferir los cargos correspondientes a tu tarjeta de crédito y cobrar una tarifa administrativa adicional.

						3.3. La responsabilidad del arrendatario incluye, pero no se limita a, los costos de reparación, remolque y pérdida de ingresos durante el tiempo de inmovilización del vehículo debido a daños causados por el arrendatario.

						3.4. Te recomendamos revisar minuciosamente el vehículo antes de iniciar el alquiler y notificar cualquier daño existente a nuestro personal. Si no se notifica ningún daño previo, asumiremos que el vehículo fue entregado en buenas condiciones.

						4. Cancelaciones y Modificaciones

						4.1. Puedes cancelar o modificar una reserva sin cargo adicional hasta [número de horas/días] antes de la fecha de inicio del alquiler.

						4.2. Las cancelaciones o modificaciones realizadas dentro del período establecido en el punto 4.1 estarán sujetas a cargos de cancelación según nuestras políticas vigentes.

						4.3. En caso de que decidas devolver el vehículo antes de la fecha acordada en el contrato de alquiler, no se realizará ningún reembolso por el tiempo no utilizado.

						5. Privacidad y Protección de Datos

						5.1. Al proporcionarnos tus datos personales, aceptas nuestra política de privacidad y autorizas el procesamiento de tus datos de acuerdo con las leyes y regulaciones aplicables.

						5.2. Utilizaremos tus datos personales únicamente para fines relacionados con la reserva y el alquiler del vehículo, así como para cumplir con las obligaciones legales y mejorar nuestros servicios.

						5.3. No compartiremos tus datos personales con terceros no relacionados con la prestación de nuestros servicios de renta de vehículos, a menos que sea requerido por ley o con tu consentimiento previo.

						6. Ley Aplicable y Jurisdicción

						6.1. Estos términos y condiciones se rigen por las leyes del país o región donde operamos.

						6.2. Cualquier disputa que surja en relación con estos términos y condiciones estará sujeta a la jurisdicción exclusiva de los tribunales competentes en el lugar donde se encuentra nuestra empresa.

						Al aceptar estos términos y condiciones, confirmas que has leído y comprendido todas las cláusulas y estás de acuerdo en cumplir con ellas durante el período de alquiler.
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
            </div>
        </div>
</form>

	</main>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
	integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" 
	integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" 
	integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
	</div>
	<div/>

<footer class="footer">
	<div>
		<p>&copy; 2023 Todos los derechos reservados.</p>
	</div>
</footer>
</body>


</html>