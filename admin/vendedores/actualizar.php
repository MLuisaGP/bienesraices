<?php
    require '../../includes/app.php';
    use App\Vendedor;

    estaAutenticado();

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    if(!$id){
        header('Location:'. ADMIN_URL);
    }
    $vendedor = Vendedor::byId($id);
    $atributosVendedor=$vendedor->atributos();
    $errores = Vendedor::getErrores();
    
    //Ejecutar el código después de que el usuario envia el formulario
    if($_SERVER["REQUEST_METHOD"]==='POST'){
     $atributosVendedor = $vendedor->sicronizar($_POST);
     $errores = $vendedor->validar();
     if(empty($errores)){
        $respuesta=$vendedor->guardar();
        if($respuesta){
            //redirecionar al usuario 
            header('Location: '. ADMIN_URL.'?resultado=2');
        }
     }
    }
    incluirTemplate('header');
?>
 
    <main class="contenedor seccion">
        <h1>Actualizar Vendedor</h1>
        <a href="/bienesraices/admin/index.php" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error):?>
            <div class="alerta error">
                <?php echo $error;?>
            </div>
        <?php endforeach;?>
        <form class="formulario" method="POST">

            <?php include '../../includes/templates/formulario_vendedores.php'?>

            <input type="submit" value="Registrar Vendedor" class="boton boton-verde">
        </form>
    </main>

<?php
    incluirTemplate('footer');
?>