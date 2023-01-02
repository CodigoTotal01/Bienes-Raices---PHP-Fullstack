<?php 
// si la secion ya esta iniciada evitamos volver iniciarla (recuerda que tipo de funcion hemos metido en los otros archivo)
//comprueba si una variable está definida 
if(!isset($_SESSION)){
    session_start();
}

// si la ssesion fue iniciada y todo tranqui ahora quiero traer el valor bool para mostrar si se le permite ingresar o no al modo de edicion 
$auth = $_SESSION["login"] ?? false;


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>

    <link rel="stylesheet" href="/build/css/app.css">
</head>

<body>
    <!-- cuidado por que es de tipado bajo  respeta los epacios -->
    <!-- isset funcion que nos permite dsaber si una variable esta definicida  -->
    <header class="header <?php echo $inicio ? "inicio" :  " " ?> ">
        <!-- contenedor nos permitira centrar mas adelante -->
        <div class="contenedor contendido-header">
            <!-- logo/refiere a la pagina principal -->

            <div class="barra">
                <a href="index.php">
                    <img src="/build/img/logo.svg" alt="Logotipo not found">
                </a>
                <!-- navegacion -->
                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="icono menu responsive">
                </div>

                <!-- añadiendo icono amburguesa  -->
                <!-- navegacion -->
                <div class="derecha">
                    <img class="dark-mode-boton"src="/build/img/dark-mode.svg" alt="Luna icon">
                    <nav class="navegacion">
                        <a href="nosotros.php">Nosotros</a>
                        <a href="anuncios.php">Anuncios</a>
                        <a href="blog.php">Blog</a>
                        <a href="contacto.php">Contacto</a>
                        <!-- mostrando opcion especial -->
                        <?php if($auth):?>
                        <a href="cerrar-sesion.php">Cerrar sesión</a>
                        <?php else:?>
                            <a href="login.php">Iniciar sesión</a>
                        <?php endif;?>
                        </nav>
                </div>
            </div>
            <!--.barra -->
            <?php 

echo $inicio? "<h1>Venta de casas y Departamentos Exclusibos de lujo</h1>":"";
?>
        </div>
    

    </header>