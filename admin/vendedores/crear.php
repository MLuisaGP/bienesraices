<?php
    require '../../includes/app.php';
    use App\Vendedor;

    estaAutenticado();

    $errores = Vendedor::getErrores();
    
    //Ejecutar el código después de que el usuario envia el formulario
    if($_SERVER["REQUEST_METHOD"]==='POST'){
        $vendedor = new Vendedor($_POST);
        $atributosVendedor = $vendedor->atributos();
        $errores = $vendedor->validar();
        if(empty($errores)){
            $respuesta=$vendedor->guardar();
            if($respuesta){
                //redirecionar al usuario 
                header('Location: '.ADMIN_URL.'?resultado=1');
            }
        }
    }
    incluirTemplate('header');
?>
 
    <main class="contenedor seccion">
        <h1>Registrar Vendedor</h1>
        <a href="/bienesraices/admin/index.php" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error):?>
            <div class="alerta error">
                <?php echo $error;?>
            </div>
        <?php endforeach;?>
        <form class="formulario" method="POST" action="/bienesraices/admin/vendedores/crear.php">

            <?php include '../../includes/templates/formulario_vendedores.php'?>

            <input type="submit" value="Registrar Vendedor" class="boton boton-verde">
        </form>
    </main>

<?php
    incluirTemplate('footer');
?>