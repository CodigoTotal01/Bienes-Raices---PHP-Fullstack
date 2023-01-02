<?php

//incluye header
require "includes/config/database.php";
$db = conectarDB();

$errores = [];
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = mysqli_real_escape_string($db, filter_var($_POST["email"], FILTER_VALIDATE_EMAIL));
    $password = mysqli_real_escape_string($db, $_POST["password"]);
   

    //agregando a la lista de errores

    if (!$email) {
        $errores[] = "El email es obligatorio rellenar o es invalido";
    }

    if (!$password) {
        $errores[] = "El password es obligatorio rellenar";
    }

    //funcion y si esta vacio, en el caso que no haya errores concultarsmos si eciste el usutario en la base de datos y siguiente si la contraseña es igua l 
    if (empty($errores)) {
        //revisar si existe el usuario o no, tenerlo en cuanta antes de agregarloqhere para algo en especifico , num_rous =0 no hubo resultados,  es un tipo object 
        $query = "SELECT * FROM usuarios WHERE email = '${email}'";
        //trae la id, correo y password 
        $resultado = mysqli_query($db, $query);


        if ($resultado->num_rows) { //saber si e l usuario ya existe 

            $usuario = mysqli_fetch_assoc($resultado);

           //verificar password 
            $auth = password_verify($password, $usuario["password"]);
          
            if ($auth) {
                //* se a pasado la autenticacion donde el super gglobalmantendra informacion del usuario 
                session_start();
                $_SESSION["usuario"] =$usuario["email"];
                $_SESSION["login"] =true;


                header("Location: /admin");
              
                //lenar el arregl ode secion 

            } else {
                $errores[] = "El password es incorrecto";
            }
            //esta funcion retorna true o false 
        } else {
            //quiere decir que ya existe 
            $errores[] = "El usuario no existe";
        }
    }
}

require "includes/funciones.php";
incluirTemplate("header");
?>

<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesión</h1>
    <!-- mostrar errores  -->
    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>
    <!-- invalidar desde el html no pregunta nada ta chiton -->
    <form method="POST" action="" class="formulario" novalidate>
        <fieldset>
            <legend>Email y contraseña</legend>
            <label for="email">Email</label>
            <!--  require en html solicita que si o si se haga algo con los inputs sin enviar nada al servidor-->
            <input name="email" type="email" placeholder="Tu email" id="email">
            <label for="password">Password</label>
            <input name="password" type="password" placeholder="Tu password" id="password">

        </fieldset>
        <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
    </form>
</main>

<?php
incluirTemplate("footer");
?>