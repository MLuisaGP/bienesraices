<?php

    require 'includes/app.php';
    $id = $_GET["id"];
    $id = filter_var($id,FILTER_VALIDATE_INT);
    if(!$id){
        header('Location: /bienesraices/index.php');
    }
    $db = conectarDB();
    $query = "SELECT * FROM propiedades WHERE id_propiedad = $id";
    
    $resultado = mysqli_query($db, $query);
    $propiedad = mysqli_fetch_assoc($resultado);

    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h2>Casas y Departamentos en Venta</h2>
        <img loading="lazy" src="/bienesraices/imagenes/<?php echo $propiedad['imagen'] ?>" type="image/jpg" alt="Anuncio <?php echo $propiedad['titulo'] ?>">
        <div class="resumen-propiedad">
            <p class="precio">$<?php echo $propiedad['precio']?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p><?php echo $propiedad['wc']?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p><?php echo $propiedad['estacionamiento']?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                    <p><?php echo $propiedad['habitaciones']?></p>
                </li>
            </ul>
            <p>
            <?php echo $propiedad['descripcion']?>
           </p>

        </div>
    </main>

<?php
    incluirTemplate('footer');
?>