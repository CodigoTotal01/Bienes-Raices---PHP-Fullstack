<?php
//instancia de la conexion de mysql
function conectarDB(): mysqli{
    //funcion para conectarnos a base de datos 
    $db=mysqli_connect("localhost", "root", "root" , "bienes_raices");
    //recuerda --> exit no permitira que neustro codigo se siga ejecutando 
    if(!$db){
        echo "Error al conectar labase de datos";
        exit;
    }

    //vamos retornar una instancia de la conexion; --> en el troo debes apllicar la programacion funcional
    return $db;
}