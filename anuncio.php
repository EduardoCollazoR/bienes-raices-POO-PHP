<?php

$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);


if (!$id) {
  header('Location: /');
}

require 'includes/app.php';

$db = conectarDB();
//consultar
$query = "SELECT * FROM propiedades WHERE id=${id}";
// obtener los resultados
$resultado = mysqli_query($db, $query);

// verificar que exista un registro con ese id 
if ($resultado->num_rows === 0) {
  header('Location: /');
}

$propiedad = mysqli_fetch_assoc($resultado);


incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
  <h1><?php echo $propiedad['titulo']; ?></h1>

  <img src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt=" img anuncio" loading="lazy" />


  <div class="resumen-propiedad">
    <p class="precio">$<?php echo $propiedad['precio']; ?></p>
    <ul class="iconos-caracteristicas">
      <li>
        <img class="icono" src="build/img/icono_wc.svg" alt="icono wc" />
        <p><?php echo $propiedad['wc']; ?></p>
      </li>
      <li>
        <img class="icono" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" />
        <p><?php echo $propiedad['estacionamiento']; ?></p>
      </li>
      <li>
        <img class="icono" src="build/img/icono_dormitorio.svg" alt="icono dormitorio" />
        <p><?php echo $propiedad['habitacion']; ?></p>
      </li>
    </ul>
    <p>
      <?php echo $propiedad['descripcion']; ?>
    </p>

  </div>
</main>
<?php

mysqli_close($db);
incluirTemplate('footer');
?>