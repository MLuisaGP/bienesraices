<?php
    require 'includes/app.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h2>Casas y Departamentos en Venta</h2>
        <?php
            incluirTemplate('anuncios');
        ?>
    </main>
<?php
    incluirTemplate('footer');
?>