<?php
    require '../includes/app.php';
    
    estaAutenticado();
    use App\propiedad;
    $propiedades = Propiedad::all();
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
            <?php foreach($propiedades as $row):
                $atributos = $row->atributos(true);?>
                <tr>
                    <td><?php echo$atributos['id_propiedad'];?></td>
                    <td><?php echo$atributos['titulo'];?></td>
                    <td class="imagen-tabla"><img src="/bienesraices/imagenes/<?php echo$atributos['imagen'];?>" alt="imagen-tabla"></td>
                    <td>$<?php echo$atributos['precio'];?></td>
                    <td>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo$atributos['id_propiedad'];?>">
                            <input type="submit" class='boton-rojo-block' value="Eliminar">
                        </form>
                        <a href="./propiedades/actualizar.php?id=<?php echo$atributos['id_propiedad'];?>" class='boton-amarillo-block'>Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </main>

<?php
    mysqli_close($db);
    incluirTemplate('footer');
?>