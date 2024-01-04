<?php
    
    //importar la conexion
    require '../includes/config/database.php';
    $db = conectarDB();
    //escribir el query
    $query = "SELECT * FROM propiedades";
    //consultar la bd
    $resultados = mysqli_query($db,$query);
    //Muestra mensaje condicional
    $mensaje = $_GET['resultado']??null;

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if($id){
            //Eliminar el archivo
            $query = "SELECT imagen from propiedades where id_propiedad = $id ";
            $resultado = mysqli_query($db, $query);
            $propiedad = mysqli_fetch_assoc($resultado);
            unlink("../imagenes/".$propiedad['imagen']);
            //Elimina la propiedad
            $query = "DELETE FROM propiedades WHERE id_propiedad = $id";
            $resultado = mysqli_query($db, $query);
            if($resultado){
                header('/bienesraices/admin/index.php?resultado=3');
            }
        }
    }

    //Incluye un template
    require '../includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>
        <?php if($mensaje==1):?>
            <p class="alerta exito">Anuncio Creado Correctamente</p>
        <?php elseif($mensaje ==2):?>
            <p class="alerta exito">Anuncio Actualizado Correctamente</p>
        <?php elseif($mensaje ==3):?>
            <p class="alerta exito">Anuncio Eliminado Correctamente</p>
        <?php endif;?>

        <a href="/bienesraices/admin/propiedades/crear.php" class="boton boton-verde">Nueva propiedad</a>

        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody> <!--//*Mostrar los resultados-->
            <?php while($row = mysqli_fetch_assoc($resultados)): ?>
                <tr>
                    <td><?php echo$row['id_propiedad'];?></td>
                    <td><?php echo$row['titulo'];?></td>
                    <td class="imagen-tabla"><img src="/bienesraices/imagenes/<?php echo$row['imagen'];?>" alt="imagen-tabla"></td>
                    <td>$<?php echo$row['precio'];?></td>
                    <td>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo$row['id_propiedad'];?>">
                            <input type="submit" class='boton-rojo-block' value="Eliminar">
                        </form>
                        <a href="./propiedades/actualizar.php?id=<?php echo$row['id_propiedad'];?>" class='boton-amarillo-block'>Actualizar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </main>

<?php
    mysqli_close($db);
    incluirTemplate('footer');
?>