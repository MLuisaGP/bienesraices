<?php
 //no es necesario importar la carpeta de conectar la  bd ya que se encuentra importada en el archivo de index con app.php
    $db = conectarDB();
    $query = "SELECT * FROM propiedades";
    if($inicio){
        $query = $query ." LIMIT 3";
    }
    $resultado = mysqli_query($db, $query);
?>

<div class="contenedor-anuncios"><!--*Contenedor de anuncios-->
    <?php while($row = mysqli_fetch_assoc($resultado)): ?>
    <div class="anuncio"><!--*anuncio1-->
    <img loading="lazy" src="/bienesraices/imagenes/<?php echo $row['imagen'] ?>" type="image/jpg" alt="Anuncio <?php echo $row['titulo'] ?>">
        <div class="contenido-anuncio"><!--*contenido anuncio-->
            <h3><?php echo $row['titulo'] ?></h3>
            <p><?php echo $row['descripcion'] ?></p>
            <p class="precio">$<?php echo $row['precio'] ?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p><?php echo $row['wc'] ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p><?php echo $row['estacionamiento'] ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                    <p><?php echo $row['habitaciones'] ?></p>
                </li>
            </ul>
            <a href="anuncio.php?id=<?php echo $row['id_propiedad'] ?>" class="boton-amarillo-block">Ver Propiedad</a>
        </div><!--?contenido anuncio-->
    </div><!--?anuncio1-->
    <?php endwhile;?>
</div><!--?Contenedor de anuncios-->

<?php
    //cerrar la conexion
    mysqli_close($db);
?>