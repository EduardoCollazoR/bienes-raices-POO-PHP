<?php

use App\Propiedad;
use App\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

require '../../includes/app.php';

estaAutenticado();
//validar la url con id valido
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: /admin');
}



$db = conectarDB();

//obtener datos de la propiedad
$propiedad = Propiedad::find($id);

//consulta para obtener todos los vendedores
$vendedores = Vendedor::all();


//arreglo con mensajes de errores
$errores = Propiedad::getErrores();


// ejecutar el codigo despues de que el usuario envio el formulario

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //asignar los atributos
    $args = $_POST['propiedad'];
    $propiedad->sincronizar($args);
    //validacion
    $errores = $propiedad->validar();

    //subida de archivos
    //generar un nombre unico
    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
    if ($_FILES['propiedad']['tmp_name']['imagen']) {
        $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
        $propiedad->setImagen($nombreImagen);
    }


    //revisar que el arreglo de errores este vacio
    if (empty($errores)) {
        if ($_FILES['propiedad']['tmp_name']['imagen']) {
            //almacenar la imagen
            $image->save(CARPETA_IMAGENES . $nombreImagen);
        }
        $propiedad->guardar();
    }
}

incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Actualizar Propiedad</h1>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error ?>
        </div>
    <?php endforeach; ?>

    <a href="/admin" class="boton boton-verde">Volver</a>


    <form class="formulario" method="POST" enctype="multipart/form-data">
        <?php include '../../includes/templates/formulario_propiedades.php'; ?>
        <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">

    </form>
</main>
<?php
incluirTemplate('footer');
?>