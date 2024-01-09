<?php

define('TEMPLATES_URL',__DIR__ .'/templates');
define('FUNCIONES_URL', __DIR__ .'funciones.php');
define('CARPETA_IMAGENES',__DIR__.'/../imagenes/');

function incluirTemplate(string $nombre, bool $inicio = false){
    include TEMPLATES_URL."/$nombre.php";
}
function estaAutenticado(){
    session_start();
    if(!$_SESSION['login']){
        header('Location: /bienesraices/index.php');
    }
}

//Escapa / Sanitizar el HTML
function sanitizar($html):string{
    $s = htmlspecialchars($html);
    return $s;
}