<?php
//!no olvidar la sesion 
session_start();
//reescribimos la sesion con un arreglo basio 
$_SESSION=[];

header("Location: /");