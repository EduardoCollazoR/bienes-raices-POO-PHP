<?php

require '../../includes/app.php';

use App\Propiedad;
use Intervention\Image\ImageManagerStatic as Image;

estaAutenticado();


//base de datos
$db = conectarDB();

$propiedad = new Propiedad;

//consultar para obtener los vendedores
$consulta = 'SELECT * FROM vendedores';
$resultado = mysqli_query($db, $consulta);

//arreglo con mensajes de errores
$errores = Propiedad::getErrores();

// ejecutar el codigo despues de que el usuario envio el formulario

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    /** Crea una nueva instancia */
    $propiedad = new Propiedad($_POST['propiedad']);

    /**Subida de archivos */


    //generar un nombre unico
    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

    //settear la imagen
    //realiza un rezise a la imagen con intervention 

    if ($_FILES['propiedad']['tmp_name']['imagen']) {
        $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
        $propiedad->setImagen($nombreImagen);
    }


    //validar
    $errores = $propiedad->validar();



    //revisar que el arreglo de errores este vacio
    if (empty($errores)) {



        // Crear carpeta
        if (!is_dir(CARPETA_IMAGENES)) {
            mkdir(CARPETA_IMAGENES);
        }

        //guarda la imagen en el servidor
        $image->save(CARPETA_IMAGENES . $nombreImagen);

        //guarda en la base de datos
        $propiedad->guardar();
    }
}

incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Crear</h1>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error ?>
        </div>
    <?php endforeach; ?>

    <a href="/admin" class="boton boton-verde">Volver</a>


    <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">
        <?php include '../../includes/templates/formulario_propiedades.php'; ?>

        <input type="submit" value="Crear Propiedad" class="boton boton-verde">

    </form>
</main>
<?php
incluirTemplate('footer');
?>