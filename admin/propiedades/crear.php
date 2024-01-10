<?php
    require '../../includes/app.php';
    use App\Propiedad;
    use Intervention\Image\ImageManagerStatic as Image;

    estaAutenticado();
    //base de datos
    $db = conectarDB();

    // Consultar para obtener los vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);
    $errores = Propiedad::getErrores();
    //Arreglo con mensajes de errores
    $errores=[];
    //Ejecutar el código después de que el usuario envia el formulario
    if($_SERVER["REQUEST_METHOD"]==='POST'){
        //* Crea una nueva instancia */
        $propiedad = new Propiedad($_POST);
        $atributos = $propiedad->atributos();

        //****subida de archivos****/
        //crear carpeta
        $carpetaImagenes='../../imagenes/';
        if(!is_dir($carpetaImagenes)){
            mkdir($carpetaImagenes);
        }

        //****Generar un nombre único ****/
        $nombreImagen = md5(uniqid(rand(),true)).".jpg";
        //**setear la imagen**//
        //Realiza un resize de la imagen con intervention
        if($_FILES['imagen']['tmp_name']){//si existe esa imagen
            $image = Image::make($_FILES['imagen']['tmp_name'])->fit(800,600);
            $propiedad->setImage($nombreImagen);
        }
        
        //**validamos**//
        $errores = $propiedad->validar();

        if(empty($errores)){
            
            //Crear la carpeta para subir imagenes
            if(!is_dir(CARPETA_IMAGENES)){
                mkdir(CARPETA_IMAGENES);
            }
            $image->save(CARPETA_IMAGENES.$nombreImagen);
            //Guarda en la ase de datos
            $respuesta=$propiedad->guardar();
            
            //mensaje de exito o error
            if($respuesta){
                //redirecionar al usuario 
                header('Location: /bienesraices/admin/index.php?resultado=1');
            }
        }
    }
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

            <?php include '../../includes/templates/formulario_propiedades.php'?>

            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>
    </main>

<?php
    incluirTemplate('footer');
?>