<?php
require __DIR__ . '/db/funciones.php';
$consulta = obtener_usuarios();
$db = conectarDB();
if($_SERVER['REQUEST_METHOD'] === 'POST'){
$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM perfil WHERE usuario = '${username}' AND contrasena = '${password}'";
	
$resultado = mysqli_query($db, $query);

if (mysqli_num_rows($resultado) == 1) {
  // El usuario y contraseña son válidos
  if($username == 'admin' AND $password == '123'){
    header('location: /perfil_admin.php');
  }else{
    header('location: /index.php');
  }  
} else {  
  echo '<script>alert("Credenciales incorrectas");</script>';	
}
}
?>	
<!DOCTYPE html>
<html lang="esp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="build/css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
	  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    
    <body style="background-color: #bca210">
      <header >
        <nav  class="ll">			
            <div class="divflex">
              <img class="bordelogo" src="src\img\logo_3_gif.gif" style="width: 90px; height: 90px;" alt="logo principal">
            </div style="background-color: #bca210">
            <div  style="background-color: #bca210" class="letranav"></div>						
            <div><img src="src\img\autito.png" style="width: 140%; height: 110%;" alt=""></div>					
        </nav>
      </header>
        <br>
        <br><br><br><br><br><br>
        <div class="container">
            <form action="" method="post">
              <h2 style="font-weight: bold;">Iniciar sesión</h2>
              <label  for="username"><b>Usuario</b></label>
              <input  type="text" placeholder="Ingresa tu usuario" name="username" required>          
              <label for="password"><b>Contraseña</b></label>
              <input type="password" placeholder="Ingresa tu contraseña" name="password" required>          
              <input class= "btn btn-primary" type="submit" value="Iniciar sesión">
            </form>
          </div>
  <footer>
		<p>Derechos reservados por Fabio Aybar Vidal &copy; 2023</p>
	</footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
	integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" 
	integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" 
	integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>	
</body>


</html>