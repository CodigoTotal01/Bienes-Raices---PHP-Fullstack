<?php

$id = $_GET["id"];
//filtramos
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header("Location: /");
}


require "includes/config/database.php";
$db=conectarDB();

//consultar para btener los datos de la propiedad 
$consulta = "SELECT * FROM propiedades WHERE id={$id}";
$resultado = mysqli_query($db, $consulta);
$propiedad = mysqli_fetch_assoc($resultado);
//* todo bien 

require "includes/funciones.php";
incluirTemplate("header");

?>
<main class="contenedor seccion contenido-centrado">
    <h1><?php echo $propiedad["titulo"]?></h1>

       
        <img src="/imagenes/<?php echo $propiedad["imagen"]?> " alt="Imagen destacada">


    <div class="resumen-propiedad">
        <p class="precio">$<?php echo $propiedad["precio"]?></p>
        <ul class="iconos-caracteristicas">
            <li>
                <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc" />
                <p><?php echo $propiedad["wc"]?></p>
            </li>

            <li>
                <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" />
                <p><?php echo $propiedad["estacionamiento"]?></p>
            </li>

            <li>
                <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones" />
                <p><?php echo $propiedad["habitaciones"]?></p>
            </li>
        </ul>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias unde ipsam nam voluptatem. Odit modi saepe dolorem in, tempore dignissimos quae ipsa blanditiis cupiditate, culpa repellendus! Facilis excepturi dolorem libero.
            Cupiditate recusandae consequuntur saepe necessitatibus qui minima eveniet nisi ut. Explicabo molestiae rem numquam eos in possimus dolore id facere! Ea ullam molestiae explicabo odit ducimus consectetur libero consequuntur voluptates!
            Repellat vel sunt ipsam architecto nisi. Obcaecati suscipit ipsam aliquid, debitis vero ea unde maxime. In, eaque ipsa minus, sunt dicta obcaecati libero ipsam repellendus, perspiciatis inventore error saepe nihil?
            Ut provident dicta unde minima, dolores quod sequi rem velit odit quaerat ab deserunt fugit veniam beatae, cupiditate, sed dignissimos fuga tempora asperiores eveniet tempore dolorem. Numquam asperiores placeat cupiditate.
            Repudiandae, dolorem quos, perspiciatis, asperiores necessitatibus odio voluptatibus iusto atque quo veniam quibusdam quidem quaerat voluptatem consequuntur a magnam mollitia iure nostrum dolor ipsa doloremque modi? Aperiam quia delectus cupiditate.
        </p>
    </div>
</main>
<?php
mysqli_close($db);
incluirTemplate("footer");
?>