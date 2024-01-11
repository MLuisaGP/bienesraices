<?php
    require '../includes/app.php';
    
    estaAutenticado();
    use App\Propiedad;
    use App\Vendedor;
    
    $propiedades = Propiedad::all();
    $vendedores = Vendedor::all();
    //Muestra mensaje condicional
    $mensaje = $_GET['resultado']??null;

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if($id){
            $tipo =$_POST['type'];
            if(validarTipoContenido($tipo)){
                if($tipo ==='vendedor'){
                    $activeRecord = Vendedor::byId($id);
                    $nameId='id_vendedor';
                }else{
                    $activeRecord = Propiedad::byId($id);
                    $nameId='id_propiedad';
                }
                $resultado=$activeRecord->eliminar($nameId);
            }
            if($resultado){
                
                header('Location: '.ADMIN_URL.'?resultado=3');
            }
        }
    }

    //Incluye un template
    
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>
        <!--//*Alerta de mensaje-->
        <?php
        $mensaje = mostrarNotificacion(intval($mensaje));
        if($mensaje):
        ?>
        <p class="alerta exito"><?php echo sanitizar($mensaje);?></p>
        <?php endif; ?>

        <a href="/bienesraices/admin/propiedades/crear.php" class="boton boton-verde">Nueva propiedad</a>
        <a href="/bienesraices/admin/vendedores/crear.php" class="boton boton-amarillo">Registrar Vendedor</a>
        <h2>Propiedades</h2>
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
                $atributosPropiedad = $row->atributos(true);
                
                ?>
                <tr>
                    <td><?php echo$atributosPropiedad['id_propiedad'];?></td>
                    <td><?php echo$atributosPropiedad['titulo'];?></td>
                    <td class="imagen-tabla"><img src="/bienesraices/imagenes/<?php echo$atributosPropiedad['imagen'];?>" alt="imagen-tabla"></td>
                    <td>$<?php echo$atributosPropiedad['precio'];?></td>
                    <td>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo$atributosPropiedad['id_propiedad'];?>">
                            <input type="hidden" name="type" value="propiedad">
                            <input type="submit" class='boton-rojo-block' value="Eliminar">
                        </form>
                        <a href="./propiedades/actualizar.php?id=<?php echo$atributosPropiedad['id_propiedad'];?>" class='boton-amarillo-block'>Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <h2>Vendedores</h2>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Tel</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody> <!--//*Mostrar los resultados-->
            <?php foreach($vendedores as $row):
                $atributosVendedores = $row->atributos(true);
                
                ?>
                
                <tr>
                    <td><?php echo$atributosVendedores['id_vendedor'];?></td>
                    <td><?php echo("{$atributosVendedores['nombre_vendedor']} {$atributosVendedores['apellidos_vendedor']}");?></td>
                    
                    <td><?php echo$atributosVendedores['telefono'];?></td>
                    <td>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo$atributosVendedores['id_vendedor'];?>">
                            <input type="hidden" name="type" value="vendedor">
                            <input type="submit" class='boton-rojo-block' value="Eliminar">
                        </form>
                        <a href="./vendedores/actualizar.php?id=<?php echo$atributosVendedores['id_vendedor'];?>" class='boton-amarillo-block'>Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </main>

<?php
    incluirTemplate('footer');
?>