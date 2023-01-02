<?php
require"includes/config/database.php";
$db=conectarDB();
//crear email y password 
$email="correo@correo.com";
$password ="123456";
// lo que hashearemsos y la constante (algoritmo de hasheo)qu e /argumento, cada vez que se usa esta funcion genera uno diferente CBBRY, tambiaen habia un costo pero no se usa, char numer o fijo en memoria usa toda su extencio cuando es fijo usarlo cuando do varchar por eso y justo esta funcion da siempre una extencion de 60 
$passwordHash=password_hash($password,PASSWORD_DEFAULT );

//query para crear el usuario
$query="INSERT INTO usuarios (email, password) VALUES ('${email}', '${passwordHash}')";
//agregar a la base de datos, es muy importante hashear a los pasword, md5 antes se usab, pero siempre generara el mismo hashear

mysqli_query($db, $query);