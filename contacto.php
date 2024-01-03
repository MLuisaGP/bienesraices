<?php
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Contacto</h1>
        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.avif" type="image/avif">
            <img loading="lazy" src="build/img/destacada3.jpg" type="image/jpg" alt="Imagen Blog 1">
        </picture>

        <h2>Llene el formulario de Contacto</h2>
        <form class="formulario">
            <fieldset><!--*Informacion básica-->
                <legend>Información Personal</legend>

                <label for="nombre">Nombre</label> 
                <input type="text" placeholder="Tu Nombre" id="nombre">

                <label for="email">Email</label>
                <input type="email" placeholder="Tu correo electronico" id="email">

                <label for="cel">Celular</label>
                <input type="tel" placeholder="Tu número de celular" id="cel">

                <label for="msn">Mensaje</label>
                <textarea id="msn"></textarea>
              
            </fieldset><!--?Informacion básica-->

            <fieldset>
                <legend>Información sobre la propiedad</legend>
                <label for="opciones">Vende o Compra</label>
                <select id="opciones">
                    <option value="" disabled selected>-- Seleccione --</option>
                    <option value="Compra">Compra</option>
                    <option value="Vende">Vende</option>
                </select>

                <label for="presupuesto">Precio o presupuesto</label>
                <input type="number" placeholder="Tu precio o presupuesto" id="presupuesto">
            </fieldset>

            <fieldset>
                <legend>Contacto </legend>
                <p> Como desea ser Contactado </p>
                <div class="forma-contacto">
                    <label for="contactar-llamada">Llamada</label>
                    <input type="radio" name="contacto" id="contactar-llamada" value="telefono">

                    <label for="contactar-mensaje">Mensaje</label>
                    <input type="radio" name="contacto" id="contactar-mensaje" value="email">
                </div>
                <p>Si eligió teléfono, elija la fecha y la hora para ser contactado</p>
                <label for="fecha">Fecha</label>
                <input type="date" id="fecha">

                <label for="hora">Hora</label>
                <input type="time" id="hora" min="09:00" max="18:00">

             </fieldset>
             <input type="submit" value="Enviar" class="boton-verde">

        </form>
    </main>

<?php
    incluirTemplate('footer');
?>