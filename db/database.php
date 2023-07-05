<?php

$db = mysqli_connect('localhost', 'root','root','gta');



if(!$db){
    echo "Hubo un error al conectar a la BD";
    exit;
}


?>