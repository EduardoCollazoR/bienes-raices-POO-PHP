<?php
require 'includes/app.php';
incluirTemplate('header');
?>
<main class="contenedor seccion">
  <h1>Conoce sobre Nosotros</h1>
  <div class="contenido-nosotros">
    <div class="imagen">
      <picture>
        <source srcset="build/img/nosotros.webp" type="image/webp" />
        <source srcset="build/img/nosotros.jpg" type="image/jpeg" />
        <img src="build/img/nosotros.jpg" alt="entrada nosotros" loading="lazy" />
      </picture>
    </div>

    <div class="texto-nosotros">
      <blockquote>25 años de experiencia</blockquote>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde rerum
        mollitia voluptas impedit, illo dolores cupiditate. Provident maxime
        eius doloremque beatae praesentium consequatur reiciendis, ipsa sint
        voluptas quidem. Officiis, maiores! Lorem ipsum dolor sit amet
        consectetur adipisicing elit. Deserunt magnam atque harum eveniet
        quam distinctio nesciunt ratione rerum ut aliquam cum blanditiis,
        est vero architecto beatae sint provident quibusdam facilis?
      </p>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique
        quam eligendi earum architecto ab veritatis quos facere ipsam.
        Exercitationem adipisci labore mollitia magnam, repellendus unde
        perspiciatis autem eius omnis eos.
      </p>
    </div>
  </div>
</main>
<section class="contenedor seccion">
  <h1>Mas Sobre Nosotros</h1>
  <div class="iconos-nosotros">
    <div class="icono">
      <img src="build/img/icono1.svg" alt="icono seguridad" loading="lazy" />
      <h3>Seguridad</h3>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima
        nesciunt, itaque error quam autem quo quibusdam a voluptas ipsam
        omnis tenetur sint placeat adipisci qui voluptate deserunt nisi
        facere repellendus?
      </p>
    </div>
    <div class="icono">
      <img src="build/img/icono2.svg" alt="icono precio" loading="lazy" />
      <h3>Precio</h3>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima
        nesciunt, itaque error quam autem quo quibusdam a voluptas ipsam
        omnis tenetur sint placeat adipisci qui voluptate deserunt nisi
        facere repellendus?
      </p>
    </div>
    <div class="icono">
      <img src="build/img/icono3.svg" alt="icono tiempo" loading="lazy" />
      <h3>A Tiempo</h3>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima
        nesciunt, itaque error quam autem quo quibusdam a voluptas ipsam
        omnis tenetur sint placeat adipisci qui voluptate deserunt nisi
        facere repellendus?
      </p>
    </div>
  </div>
</section>
<?php
incluirTemplate('footer');
?>