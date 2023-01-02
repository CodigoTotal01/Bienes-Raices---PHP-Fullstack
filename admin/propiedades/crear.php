<?php

require "../../includes/funciones.php";
$auth=estaAutenticado();
if(!$auth){
header("Location: /");
}
require "../../includes/config/database.php";
$db = conectarDB();

$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);
$errores = [];
$titulo = "";
$precio = "";
$descripcion = "";
$habitaciones = "";
$wc = "";
$estacionamiento = "";
$vendedorId = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {

   
    $titulo = mysqli_real_escape_string($db, $_POST["titulo"]);
    $precio = mysqli_real_escape_string($db, $_POST["precio"]);
    $descripcion = mysqli_real_escape_string($db, $_POST["descripcion"]);
    $habitaciones = mysqli_real_escape_string($db, $_POST["habitaciones"]);
    $wc = mysqli_real_escape_string($db, $_POST["wc"]);
    $estacionamiento = mysqli_real_escape_string($db, $_POST["estacionamiento"]);
    $vendedorId = mysqli_real_escape_string($db, $_POST["vendedor"]);

    $creado = date("Y,m,d");
$imagen=$_FILES["imagen"];



    if (!$titulo) {
        $errores[] = "Añadir titulo";
    }
    if (!$precio) {
        $errores[] = "Añadir precio";
    }

    if (strlen($descripcion) < 50) {
       
        $errores[] = "Añadir descripcion mayor a 50 caracteres";
    }
    if (!$habitaciones) {
        $errores[] = "Añadir habitaciones";
    }

    if (!$wc) {
        $errores[] = "Añadir baños";
    }

    if (!$estacionamiento) {
        $errores[] = "Añadir estacionamientos";
    }

    if (!$vendedorId) {
        $errores[] = "Añadir vendedor";
    }
//si no tiene name es porque no hay imagen
    if(!$imagen["name"]||$imagen["error"]){
        $errores[] ="La imagen es obligatoria";
    }
    //validar por tamaño, 1mb maximo, eso se ve con la super global y en size (recorre el arreglo ), php limita a 2 megas y en el size aparece como null en realidad nada y en "error tien ""1""
    $medida = 1000 * 1000;
    if($imagen["size"]>$medida){
        $errores[] ="La imagen es muy pesada ";

    }
 

    //empty nos dice si esta vacio o no el array 
    if (empty($errores)) {
        //podriamos crear carpetars directamente pero php tambien nos permite crear una xd 

        //subida de archivos


        //crear carpeta 
        $carpetaImagenes ="../../imagenes/";

        // funcion para saber o no si existe la carpeta con la ruta dada, si no creala 
        if(!is_dir($carpetaImagenes)){
                mkdir($carpetaImagenes);
        }


        $nombreImagen=md5(uniqid(rand(), true)) . ".jpg";

        //mkdir es para crear un directorio, y va a grear una y otra ves, logicamente s i no existe se añade si no no devveria, la funcion is_dirnos dice si existe o no la carpeta
        
        move_uploaded_file($imagen["tmp_name"], $carpetaImagenes. $nombreImagen);
      
        
        

        $query = " INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedorId) 
         VALUES ('$titulo', '$precio', '$nombreImagen', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$creado', '$vendedorId')";



        $resultado = mysqli_query($db, $query);
        if ($resultado) {
            header ("Location: /admin?resultado=1");
        }
    }
}
incluirTemplate("header");
?>

<main class="contenedor seccion">
    <h1>Crear</h1>
    <a href="/admin" class="boton boton-verde">Volver a inicio</a>

    <?php foreach ($errores as $error) : ?>
        <!-- html -->
        <div class="alerta error">
            <?php echo $error ?>
        </div>
    <?php endforeach; ?>
<!-- para subir archivos es para todo tipo de tecnologia back -->
    <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">
        <fieldset>
            <legend>Informacion general</legend>

            <label for="titulo">Titulo:</label>
            <input type="text" name="titulo" id="titulo" placeholder="Titulo propiedad" value="<?php echo $titulo; ?>">

            <label for="precio">Precio:</label>
            <input type="number" name="precio" id="precio" placeholder="Preccio propiedad" value="<?php echo $precio; ?>">
            <!-- datos de tipo imagen no tiene place holder, abre nuestro archivos el type file el mintype es la informacion de un archivo -->
            <!-- de igual manera permite limitar -->
            <label for="imagen">Imagen:</label>
            <input type="file" name="imagen" id="imagen" accept="image/jpeg, image/png">

            <label for="descripcion">Descripcion</label>
            <!-- text area no tiene value, poner dentro de lso para metros  -->
            <textarea id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>
        </fieldset>




        <fieldset>
            <legend>Informacion Propiedad</legend>
            <label for="habitaciones">Habitaciones</label>
            <input type="number" name="habitaciones" id="habitaciones" placeholder="Ej. 3" min="1" max="9" value="<?php echo $habitaciones; ?>">
            <label for="wc">Baños:</label>
            <input type="number" name="wc" id="wc" placeholder="Ej. 3" min="1" max="9" value="<?php echo $wc; ?>">
            <label for="estacionamiento">Estacionamientos:</label>
            <input type="number" name="estacionamiento" id="estacionamiento" placeholder="Ej. 3" min="1" max="9" value="<?php echo $estacionamiento; ?>">
        </fieldset>


        <fieldset>
            <legend>Vendedor:</legend>

            <select name="vendedor">
                <option value="">--Seleccione--</option>
        
                <?php while ($vendedor = mysqli_fetch_assoc($resultado)) : ?>
                    <!-- ternario -->
                    <option <?php echo $vendedorId ===  $vendedor['id'] ? "selected" : ""; ?> value="<?php echo $vendedor['id']; ?>"><?php echo $vendedor['nombre'] . " " . $vendedor['apellido']; ?></option>
                <?php endwhile; ?>
            </select>
        </fieldset>

        <!-- añadiendo siempr el sumit del formulario -->
        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>
</main>

<?php
incluirTemplate("footer");
?>