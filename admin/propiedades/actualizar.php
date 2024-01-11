<?php

use App\Propiedad;
use App\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

    require '../../includes/app.php';
    estaAutenticado(); //?revisamos si esta autenticado el usuario
    $id =$_GET['id']; //?validar la URL por ID válido
    $id=filter_var($id,FILTER_VALIDATE_INT);

    if(!$id){
        header('Location: '.ADMIN_URL);//?redirecionar al usuario si no existe el id
    }
    $propiedad = Propiedad::byId($id); //?obtenemos la propiedad
    $atributosPropiedad = $propiedad->atributos(); //?obtenemos los atributos de la propiedad
    
    //* Consultar para obtener los vendedores
    $vendedores = Vendedor::all();

    $errores = Propiedad::getErrores(); //?Arreglo con mensajes de errores
    $errores=[];

    //*Ejecutar el código después de que el usuario envia el formulario
    if($_SERVER["REQUEST_METHOD"]==='POST'){

        $atributosPropiedad=$propiedad->sicronizar($_POST);//? Sincronizamos y obtenemos los atributos ya sincronizados
        $errores = $propiedad->validar(); //* validamos el formulario
        
        if(empty($errores)){
            $nombreImagen = md5(uniqid(rand(),true)).".jpg"; //?Generar un nombre único 
            
            if($_FILES['imagen']['tmp_name']){//?si existe esa imagen
                $image = Image::make($_FILES['imagen']['tmp_name'])->fit(800,600);//?crear la imagen
                $propiedad->setImage($nombreImagen);//?insertar el nombre de la imgen en propiedad
                $image->save(CARPETA_IMAGENES.$nombreImagen);
            }
            

            $respuesta =$propiedad->guardar();
            
            if($respuesta){
                header('Location: '.ADMIN_URL.'?resultado=2');//?redirecionar al usuario 
            }
        }
    }
    incluirTemplate('header');
?>
 
    <main class="contenedor seccion">
        <h1>Actualizar</h1>
        <a href="/bienesraices/admin/index.php" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error):?>
            <div class="alerta error">
                <?php echo $error;?>
            </div>
        <?php endforeach;?>
        <form class="formulario" method="POST" enctype="multipart/form-data">

        <?php include '../../includes/templates/formulario_propiedades.php'?>

            <input type="submit" value="Actualizar propiedad" class="boton boton-verde">
        </form>
    </main>

<?php
    incluirTemplate('footer');
?>