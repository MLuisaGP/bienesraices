<?php
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <section class="nosotros">
            <h1>Nosotros</h1>
            <div class="nosotros-contenedor">
                <div class="nosotros-imagen">
                    <picture>
                        <source srcset="build/img/nosotros.webp" type="image/webp">
                        <source srcset="build/img/nosotros.avif" type="image/avif">
                        <img loading="lazy" src=build/img/nosotros.jpg" type="image/jpg" alt="Imagen sobre nosotros">
                    </picture>
                </div>
                <div class="nosotros-texto">
                    <p><strong>25 Años de Experiencia</strong></p>
                    <p>
                        Dolor in ut eu elit non laboris nostrud duis eiusmod. Dolore id cillum adipisicing ullamco nulla. Enim excepteur dolore officia dolore incididunt aliqua duis qui occaecat.Exercitation exercitation esse dolore id labore tempor minim eiusmod magna. Exceptorum ad. Aute labore sunt et aliquip nostrud consectetur dolore aliquip culpa sunt.
                    </p>
                    <p>
                        Mollit consequat voluptate exercitation enim deser. Aliquip enim est irure commodo excepteur sint officia magna aliqua eiusmod nostrud et aute dolor. Sint est cupidatat cillum commodo exercitation aliquip Lorem sit aliqua deserunt. Duis aliqua in cupidatat dolore officia quis. Consectetur culpa ullamco eiusmod elit esse velit id aute pariatur aute adipisicing enim. Iur dolor sint proident et nisi sint enim qui.
                    </p>
                </div>

            </div>
        </section>
    </main>
    <section class="contenedor seccion"><!--*iconos sobre nosotros-->
        <h1>Más Sobre Nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="icono Seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Culpa tempor ad minim amet oft aliquip sit deserunt veniam voluptate sint sunt aliqua esse. Mollit sint consequat veniam nostrud mollit consequat amet. Et enim deserunt est nisi ea laborum quis.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>Culpa tempor ad minim amet oft aliquip sit deserunt veniam voluptate sint sunt aliqua esse. Mollit sint consequat veniam nostrud mollit consequat amet. Et enim deserunt est nisi ea laborum quis.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="icono Tiempo" loading="lazy">
                <h3>Seguridad</h3>
                <p>Culpa tempor ad minim amet oft aliquip sit deserunt veniam voluptate sint sunt aliqua esse. Mollit sint consequat veniam nostrud mollit consequat amet. Et enim deserunt est nisi ea laborum quis.</p>
            </div>
        </div>
    </section><!--?iconos sobre nosotros-->

<?php
    incluirTemplate('footer');
?>