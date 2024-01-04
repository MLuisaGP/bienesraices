<?php
    require 'includes/funciones.php';
    incluirTemplate('header',$inicio = true);
?>
    <main class="contenedor seccion"><!--*iconos sobre nosotros-->
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
    </main><!--?iconos sobre nosotros-->

    <section class="seccion contenedor">
        <h2>Casas y Departamentos en Venta</h2>
        <div class="contenedor-anuncios"><!--*Contenedor de anuncios-->

            <div class="anuncio"><!--*anuncio1-->
                <picture>
                    <source srcset="build/img/anuncio1.webp" type="image/webp">
                    <source srcset="build/img/anuncio1.avif" type="image/avif">
                    <img loading="lazy" src="build/img/anuncio1.jpg" type="image/jpg" alt="Anuncio Casa de Lujo en el lago">
                </picture>
                <div class="contenido-anuncio"><!--*contenido anuncio-->
                    <h3>Casa de Lujo en el Lago</h3>
                    <p>Casa en el lago con excelente vista, acabados de lujo a un excelente precio.</p>
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
                    <a href="anuncio.html" class="boton-amarillo-block">Ver Propiedad</a>
                </div><!--?contenido anuncio-->
            </div><!--?anuncio1-->

            <div class="anuncio"><!--*anuncio2-->
                <picture>
                    <source srcset="build/img/anuncio2.webp" type="image/webp">
                    <source srcset="build/img/anuncio2.avif" type="image/avif">
                    <img loading="lazy" src="build/img/anuncio2.jpg" type="image/jpg" alt="Anuncio Casa Terminados de Lujo">
                </picture>
                <div class="contenido-anuncio"><!--*contenido anuncio-->
                    <h3>Casa Terminados de Lujo</h3>
                    <p>Casa con diseño moderno, tecnología inteligente y amueblada.</p>
                    <p class="precio">$2,000,000</p>
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
                    <a href="anuncio.html" class="boton-amarillo-block">Ver Propiedad</a>
                </div><!--?contenido anuncio-->
            </div><!--?anuncio2-->

            <div class="anuncio"><!--*anuncio3-->
                <picture>
                    <source srcset="build/img/anuncio3.webp" type="image/webp">
                    <source srcset="build/img/anuncio3.avif" type="image/avif">
                    <img loading="lazy" src="build/img/anuncio3.jpg" type="image/jpg" alt="Anuncio Casa con Alberca">
                </picture>
                <div class="contenido-anuncio"><!--*contenido anuncio-->
                    <h3>Casa con Alberca</h3>
                    <p>Casa con alberca y acabados de lujos en la ciudad, excelente oportunidad.</p>
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
                    <a href="anuncio.html" class="boton-amarillo-block">Ver Propiedad</a>
                </div><!--?contenido anuncio-->
            </div><!--?anuncio3-->
        </div><!--?Contenedor de anuncios-->
        <div class="alinear-derecha">  
            <a href="anuncios.html" class="boton-verde">Ver Todas</a>
        </div>
    </section>

    <section class="imagen-contacto"> <!--*imagen contacto-->
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
        <div class="btn-contacto">
            <a href="contacto.html" class="boton-amarillo">Contactános</a>
        </div>
    </section><!--?imagen contacto-->

    <div class="contenedor seccion seccion-inferior">
        <section class="blog"><!--*blog-->
            <h3>Nuestro Blog</h3>
            <article class="entrada-blog"><!--*Entada de blog 1-->
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.avif" type="image/avif">
                        <img loading="lazy" src="build/img/blog1.jpg" type="image/jpg" alt="Imagen Blog 1">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2023</span> por: <span>Admin</span></p>
                        <p> Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero</p>
                    </a>
                </div>
            </article><!--?Entada de blog 1-->

            <article class="entrada-blog"><!--*Entada de blog 2-->
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.avif" type="image/avif">
                        <img loading="lazy" src="build/img/blog2.jpg" type="image/jpg" alt="Imagen Blog 2">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Guia para la decoración de tu hogar</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2023</span> por: <span>Admin</span></p>
                        <p> Maximiz el espacio en tu hogar con esta guía, aprende a combinar mubles y colores para darle vida a tu espacio</p>
                    </a>
                </div>
            </article><!--?Entada de blog 2-->
        </section><!--?blog-->

        <section class="testimoniales">
            <h3>Testimoniales</h3>
            <div class="testimonial">
                <blockquote>
                    El personal se comportó de una escelente forma, muy buena atención y la casa que me ofrecieron cumple con todas mis expectivas.
                </blockquote>
                <p>-Juan De la torre</p>
            </div>
        </section>
    </div>
<?php
    incluirTemplate('footer');
?>