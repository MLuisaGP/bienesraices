<?php
    //base de datos
    require '../../includes/config/database.php';
    $db = conectarDB();

    // Consultar para obtener los vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    $titulo="";
    $precio="";
    $imagen="";
    $descripcion="";
    $habitaciones="";
    $wc="";
    $estacionamiento="";
    $id_vendedor="";

    //Arreglo con mensajes de errores
    $errores=[];
    //Ejecutar el código después de que el usuario envia el formulario
    if($_SERVER["REQUEST_METHOD"]==='POST'){
        // echo '<pre>'; print_r($_POST); echo '</pre>';
        // echo '<pre>'; print_r($_FILES); echo '</pre>';
        // exit;

        $titulo = mysqli_real_escape_string( $db,$_POST['titulo']);
        $precio = mysqli_real_escape_string( $db,$_POST['precio']); 
        $habitaciones = mysqli_real_escape_string( $db,$_POST['habitaciones']);
        $descripcion = mysqli_real_escape_string( $db,$_POST['descripcion']);
        $wc = mysqli_real_escape_string( $db,$_POST['wc']);
        $estacionamiento = mysqli_real_escape_string( $db,$_POST['estacionamiento']);
        $id_vendedor = mysqli_real_escape_string( $db,$_POST['id_vendedor'])??0;
        $fecha_creado = date('Y/m/d');

        $imagen = $_FILES['imagen'];

//         echo '<pre>'; print_r($imagen); echo '</pre>';
//         exit;

        if(!$titulo){
             $errores[]="Debes añadir un titulo";
        }
        if(!$precio){
            $errores[]="Debes añadir un precio";
        }
        if(!$habitaciones){
            $errores[]="El Numero de habitaciones es obligatorio";
        }
        if(!$wc){
            $errores[]="El Numero de baños es obligatorio";
        }
        if(!$estacionamiento){
            $errores[]="El Numero de estacionamiento es obligatorio";
        }
        if(!$id_vendedor){
            $errores[]="Debes selecionar un vendedor";
        }
        if(!$imagen['name'] || $imagen['size']> 100000 || $imagen['error'] != 0 ){
            $errores[]="Debes adjuntar una imagen no mayor a 100kb";
        }

        //Revisar que el arreglo de errores este vacio
        if(empty($errores)){
            //subida de archivos*/
            $carpetaImagenes='../../imagenes/';
            if(!is_dir($carpetaImagenes)){
                mkdir($carpetaImagenes);
            }
            //generar nombre unico
            $nombreImagen = md5(uniqid(rand(),true)).".jpg";
            //subir la imagen
            move_uploaded_file($imagen['tmp_name'],$carpetaImagenes.$nombreImagen);
             //insertar en la base de datos
            $query = "INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, fch_creado, id_vendedor) VALUES (
                '$titulo',
                '$precio',
                '$nombreImagen',
                '$descripcion',
                '$habitaciones',
                '$wc',
                '$estacionamiento',
                '$fecha_creado',
                '$id_vendedor'
            );";
            $resultado = mysqli_query($db, $query);
            if($resultado){
                //redirecionar al usuario 
                header('Location: /bienesraices/admin/index.php?resultado=1');
            }
        }
    }
    require '../../includes/funciones.php';
    incluirTemplate('header');
?>
 
    <main class="contenedor seccion">
        <h1>Crear</h1>
        <a href="/bienesraices/admin/index.php" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error):?>
            <div class="alerta error">
                <?php echo $error;?>
            </div>
        <?php endforeach;?>
        <form class="formulario" method="POST" action="/bienesraices/admin/propiedades/crear.php" enctype="multipart/form-data">

            <fieldset><!--//*Informacion General-->
                <legend>Informacion General</legend>

                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" placeholder="Titulo Propiedad" name="titulo" value = "<?php echo $titulo?>" >

                <label for="precio">Precio:</label>
                <input type="number" id="precio" placeholder="Precio Propiedad" name="precio" value ="<?php echo $precio?>">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

                <label for="descripcion">Descripción:</label>
                <textarea  id="descripcion" name="descripcion"><?php echo $descripcion?></textarea>
            </fieldset><!--//?Informacion General-->

            <fieldset><!--//*Informacion Propiedad-->
                <legend>Informacion Propiedad</legend>

                <label for="habitaciones">Habitaciones:</label>
                <input type="number" id="habitaciones" placeholder="Ej:3" min="1" name="habitaciones" value = "<?php echo $habitaciones?>" >

                <label for="wc">Baños:</label>
                <input type="number" id="wc" placeholder="Ej:3" min="1" name="wc" value = "<?php echo $wc?>">

                <label for="estacionamiento">Estacionamientos:</label>
                <input type="number" id="estacionamiento" placeholder="Ej:3" min="1" name="estacionamiento" value = "<?php echo $estacionamiento?>" >
            </fieldset><!--//?Informacion Propiedad-->

            <fieldset><!--//*Informacio Vendedor-->
                <legend>Vendedor</legend>

                <select name="id_vendedor" required >
                    <option <?php echo $id_vendedor === ""? 'selected': '';?> value="" disabled>-- Selecionar --</option>
                    <?php while($row = mysqli_fetch_assoc($resultado)): ?>
                        <option <?php echo $id_vendedor === $row['id_vendedor']? 'selected': '';?> value="<?php echo $row['id_vendedor']?>""> <?php echo $row['nombre_vendedor'].' '.  $row['apellidos_vendedor']?> </option>
                    <?php endwhile;?>
                </select>

            </fieldset><!--//?Informacion Vendedor-->

            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>
    </main>

<?php
    incluirTemplate('footer');
?>