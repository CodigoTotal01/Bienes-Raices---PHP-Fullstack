<?php
// para que no entren a otra url distinta en la region de admin
require "../../includes/funciones.php";
$auth=estaAutenticado();
if(!$auth){
header("Location: /");
}


$id = $_GET["id"];
//sobreescribimos y validamos
$id = filter_var($id, FILTER_VALIDATE_INT);
// si no existe
if (!$id) {
    header("Location: /admin");
}
//conexion 
require "../../includes/config/database.php";
$db = conectarDB();


// consulta para obtener datos de la propiedad 
$consulta = "SELECT * FROM propiedades WHERE id={$id}";
//ahosra obtenemos el resltado de la consulta 
$resultado = mysqli_query($db, $consulta);

//while solo cuando es ua nserie de resultados, este caso ya tendremos todo los datos de golpe 
$propiedad = mysqli_fetch_assoc($resultado);



$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);
$errores = [];
$titulo = $propiedad["titulo"];
$precio = $propiedad["precio"];
$descripcion = $propiedad["descripcion"];
$habitaciones = $propiedad["habitaciones"];
$wc = $propiedad["wc"];
$estacionamiento = $propiedad["estacionamiento"];
$vendedorId = $propiedad["vendedorId"];
$imagenPropiedad = $propiedad["imagen"];
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $titulo = mysqli_real_escape_string($db, $_POST["titulo"]);
    $precio = mysqli_real_escape_string($db, $_POST["precio"]);
    $descripcion = mysqli_real_escape_string($db, $_POST["descripcion"]);
    $habitaciones = mysqli_real_escape_string($db, $_POST["habitaciones"]);
    $wc = mysqli_real_escape_string($db, $_POST["wc"]);
    $estacionamiento = mysqli_real_escape_string($db, $_POST["estacionamiento"]);
    $vendedorId = mysqli_real_escape_string($db, $_POST["vendedor"]);
    $creado = date("Y,m,d");
    $imagen = $_FILES["imagen"];



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

   
    $medida = 1000 * 1000;
    if ($imagen["size"] > $medida) {
        $errores[] = "La imagen es muy pesada ";
    }


    if (empty($errores)) {


        $carpetaImagenes = "../../imagenes/";

        if (!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes);
        }


        $nombreImagen="";

        if ($imagen["name"]) { 
            unlink( $carpetaImagenes . $propiedad["imagen"]);
            
        $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

        move_uploaded_file($imagen["tmp_name"], $carpetaImagenes . $nombreImagen);
        }else{
            $nombreImagen=$propiedad["imagen"];
        }




        $query = "UPDATE propiedades SET titulo = '${titulo}', precio ='${precio}', imagen='${nombreImagen}' , descripcion='${descripcion}', habitaciones=${habitaciones}, wc=${wc},estacionamiento=${estacionamiento}, vendedorId=${vendedorId}  WHERE id=${id}";


        $resultado = mysqli_query($db, $query);
        if ($resultado) {
            header("Location: /admin?resultado=2");
        }
    }
}
incluirTemplate("header");
?>

<main class="contenedor seccion">
    <h1>Actualizar propiedad</h1>
    <a href="/admin" class="boton boton-verde">Volver a inicio</a>

    <?php foreach ($errores as $error) : ?>
        <!-- html -->
        <div class="alerta error">
            <?php echo $error ?>
        </div>
    <?php endforeach; ?>
    <form class="formulario" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Informacion general</legend>

            <label for="titulo">Titulo:</label>
            <input type="text" name="titulo" id="titulo" placeholder="Titulo propiedad" value="<?php echo $titulo; ?>">

            <label for="precio">Precio:</label>
            <input type="number" name="precio" id="precio" placeholder="Preccio propiedad" value="<?php echo $precio; ?>">
    
            <label for="imagen">Imagen:</label>
            <input type="file" name="imagen" id="imagen" accept="image/jpeg, image/png">
            <img src="/imagenes/<?php echo $imagenPropiedad; ?>" alt="Imagen del vehiculo" class="imagen-small">

            <label for="descripcion">Descripcion</label>
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
                    <option <?php echo $vendedorId ===  $vendedor['id'] ? "selected" : ""; ?> value="<?php echo $vendedor['id']; ?>"><?php echo $vendedor['nombre'] . " " . $vendedor['apellido']; ?></option>
                <?php endwhile; ?>
            </select>
        </fieldset>


        <input type="submit" value="Actualizar propiedad" class="boton boton-verde">
    </form>
</main>

<?php
incluirTemplate("footer");
?>