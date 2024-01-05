<?php
    if(!$_SESSION){
        session_start();
    }
    $auth =$_SESSION['login']??false;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="/bienesraices/build/css/app.css">
</head>
<body>
    <header class="header <?php echo $inicio ? 'inicio':''?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/bienesraices/index.php">
                    <img  class="logo" loading="lazy" width="200" height="300" src="/bienesraices/build/img/logo.svg" alt="logo bienes raices">
                </a>

                <div class="derecha">
                    <img class="dark-mode-boton" src="/bienesraices/build/img/dark-mode.svg" alt="boton modo oscuro">
                    <div class="mobile-menu">
                        <img src="/bienesraices/build/img/barras.svg" alt="icono menu responsivle">
                    </div>
                    <nav class="navegacion">
                        <a href="nosotros.php">Nosotros</a>
                        <a href="anuncios.php">Anuncios</a>
                        <a href="blog.php">Blog</a>
                        <a href="contacto.php">Contacto</a>
                        <?php if($auth):?>
                            <a href="cerrar-sesion.php">Cerrar Sesión</a>
                        <?php endif;?>
                    </nav>
                </div>
                
            </div><!--?cierre barra-->
            <?php 
            if($inicio){
                echo "<h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>";
            }
            ?>
        </div>
    </header>