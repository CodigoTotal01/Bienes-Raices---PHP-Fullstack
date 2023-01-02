<?php

//! todo lo relacionado con la sesion debe ir primero 
//tomamos el bool login true 
require "../includes/funciones.php";
$auth=estaAutenticado();
if(!$auth){
header("Location: /");
}

//generando variable en este documento, recuerda que se pasa automaticamente
//cuidado con las redirecciones

//importar conexion
require "../includes/config/database.php";
$db = conectarDB();


//Excrybiur query
$query = "SELECT * FROM propiedades";

// consultar db
$resultadoConsulta = mysqli_query($db, $query);

//mostrar mensaje condicional
$resultado = $_GET["resultado"] ?? null; // se encarga de buscar el valor de la variable y si no lo encuentra se asigna otro valor, antes se hacia un iset 

//realizando la elimiancion de todo lo relacionado a la propiedad
if($_SERVER["REQUEST_METHOD"]==="POST"){
  //extrayendo datos del post de este documento
  $id=$_POST["id"];
  //validamos que sea el id que quremos y que no venga un chistosito
  $id=filter_var($id, FILTER_VALIDATE_INT);
    //!lo mas importante del DELETE es el WHERE o te chingas tu tablita 
  if($id){
//eliminar archivo en php (de tipo imagen en este caso)
$query = "SELECT imagen FROM propiedades WHERE id=${id}";
//instancia de conexion de la base de datos 
$resultado=mysqli_query($db, $query);
//trae los elementos que se encuentren en la tabla en un arreglo asociativo
$propiedad=mysqli_fetch_assoc($resultado);

//eliminar imagen
unlink("../imagenes/". $propiedad["imagen"]);


    //!Elimnar la propiedad (y de la iamgen elnomrbe amas no el archivo)

    $query="DELETE FROM propiedades WHERE id=${id}";
    
  $resultado=mysqli_query($db, $query);
    if($resultado){
        //redirigir a la misma pagina 
        header("Location: /admin?resultado=3");
    }
  }
  
  
}




//añadior template 


incluirTemplate("header");

;
?>

<main class="contenedor seccion">
    <h1>Administrador de bienes raices</h1>
    <!-- problemita es un strtring, mejor lo convertimos aun entero  -->
    <?php if (intval($resultado) === 1) : ?>
        <p class="alerta exito">Su anuncio se creado correctamente!</p>
        <?php elseif (intval($resultado) === 2) : ?>
            <p class="alerta exito">Su anuncio se actualizado correctamente!</p>
                <?php elseif (intval($resultado) === 3) : ?>
                    <p class="alerta exito">Su anuncio se elimino correctamente!</p>
    <?php endif; ?>
    <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva propiedad</a>

    <!-- <thead>	Groups the header content in a table
<tbody>	Groups the body content in a table -->

    <!-- crear la tabla -->
    <table class="propiedades">
        <!-- encabezadom y agruopa todo en la parte del encabezado -->
        <thead>
            <!-- filas hay que asegurarnos que la cantidad sea igua l en ambas  -->
            <tr>
                <!-- celdas -->
                <!-- significa datos de la tabla td , por estas mismas esta defginidas las celdas, contienen todo tipo de elementos  -->
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <!-- tbody para agrupar el contenido del cuerpo de la tabla  -->

        <tbody>
            <!-- td celdas  -->

            <!-- tr filas -->
            <?php while ($propiedades=mysqli_fetch_assoc($resultadoConsulta)):?>
            <tr> <!-- Mostrar resultados de la base de datos--> 
           
                <td> <?php echo $propiedades["id"]; ?></td>
                <td><?php echo $propiedades["titulo"]; ?></td>
                <td> <img src="/imagenes/<?php echo $propiedades["imagen"];?>" class="imagen-tabla" alt="Imagen propiedad"></td>
                <td> $<?php echo $propiedades["precio"]; ?></td>
                <td>
                    <!-- se va enviar ciert ainformacioin anuestra base de datos por el post , hiden quiere decir que esta oculto, son los input invisibles no se positiionan ni nada se envaia de manera oculta  -->
                    <!-- opciones , recuerda que sin el accion nos redigira al mismo archivo-->
                    <form class="w-100" method="POST">
                        <!-- input invisible, cundo e l archivo tenga el metodo post recien pasar la id  -->
                    <input type="hidden" name="id" value="<?php echo $propiedades["id"] ;?>"></a>
                    <input type="submit" class="boton-rojo-block" value="Eliminar"></a>
                    </form>
                    
                    <!-- query string -->

                    <a href="/admin/propiedades/actualizar.php?id=<?php echo $propiedades["id"];?>" class="boton-verde-block">ACTUALIZAR</a>
                </td>
           
            </tr>
            <?php endwhile;?>
        </tbody>
    </table>
</main>

<?php
// cerar la conexion base de datos 
mysqli_close($db);
incluirTemplate("footer");
?>