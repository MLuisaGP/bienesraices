<?php
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h2>Casas y Departamentos en Venta</h2>
        <picture>
            <source srcset="build/img/destacada.webp" type="image/webp">
            <source srcset="build/img/destacada.avif" type="image/avif">
            <img loading="lazy" src="build/img/destacada.jpg" alt="imagen de la propiedad">
        </picture>
        <div class="resumen-propiedad">
            <p class="precio">$3,000,000</p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p>3</p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p>3</p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                    <p>4</p>
                </li>
            </ul>
            <p>
                Veniam mollit reprehenderit occaecat dolor cillum sit. Elit consequat qui ipsum deserunt in velit enim consectetur non consequat. Qui officia esse aute exercitation.
            </p>
            <p>
                Dolor labore do id pariatur officia qui id incididunt do occaecat id enim sint excepteur. Minim ullamco est reprehenderit et. Et est laborum aliquip laborum ipsum ipsum elit mollit incididunt. Sunt minim do esse do adipisicing cupidatat in reprehenderit. Veniam do duis exercitation officia. Laborum irure culpa nisi cillum. Ex culpa qui ex proident reprehenderit culpa ipsum incididunt culpa consequat elit do.
            </p>

        </div>
    </main>

<?php
    incluirTemplate('footer');
?>