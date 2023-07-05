<?php
function obtener_productos() {
    try {        
        //importar credenciales
        require 'database.php';

        //consulta SQL
        $sql = "SELECT * FROM vehiculo;";

        // realizar la consulta
        $consulta = mysqli_query($db, $sql);

        // acceder a los resultados
        
        return $consulta;
        //cerrar conexion
        $la_cerracion = mysqli_close($db); 
    } catch (\Throwable $th) {
        var_dump($th);        
    }
}
obtener_productos();

function conectarDB(){
    $db = mysqli_connect('localhost', 'root','root','gta');    
    if(!$db){
        echo "Hubo un error al conectar a la BD";
        exit;
    }
    return $db;
}
conectarDB();

function obtener_usuarios() {
    try {        
        //importar credenciales
        require 'database.php';

        //consulta SQL
        $sql = "SELECT * FROM vehiculo;";

        // realizar la consulta
        $consulta = mysqli_query($db, $sql);

        // acceder a los resultados
        
        return $consulta;
        //cerrar conexion
        $la_cerracion = mysqli_close($db); 
    } catch (\Throwable $th) {
        var_dump($th);        
    }
}

function obtener_historico() {
    try {        
        //importar credenciales
        require 'database.php';

        //consulta SQL
        $sql = "SELECT * FROM historico_registro;";

        // realizar la consulta
        $consulta = mysqli_query($db, $sql);

        // acceder a los resultados
        
        return $consulta;
        //cerrar conexion
        $la_cerracion = mysqli_close($db); 
    } catch (\Throwable $th) {
        var_dump($th);        
    }
}
obtener_historico();

function disponibilidad($id_vehiculo){
    try {        
        //importar credenciales
        require 'database.php';

        //consulta SQL
        $sql = "SELECT disponible FROM vehiculo WHERE id_vehiculo = $id_vehiculo;";


        // realizar la consulta
        $resultado_dispo = mysqli_query($db, $sql);

        // acceder a los resultados
        
        return $resultado_dispo;
        //cerrar conexion
        $la_cerracion = mysqli_close($db); 
    } catch (\Throwable $th) {
        var_dump($th);        
    }
    
}


function obtener_trabajadores() {
    try {        
        //importar credenciales
        require 'database.php';

        //consulta SQL
        $sql = "SELECT * FROM operador;";

        // realizar la consulta
        $consulta = mysqli_query($db, $sql);

        // acceder a los resultados
        
        return $consulta;
        //cerrar conexion
        $la_cerracion = mysqli_close($db); 
    } catch (\Throwable $th) {
        var_dump($th);        
    }
}
obtener_trabajadores();