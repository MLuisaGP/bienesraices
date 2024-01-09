<?php

require 'funciones.php';
require 'config/database.php';
require __DIR__.'/../vendor/autoload.php';

//Conexion a la base de datos
$db = conectarDB();
use App\Propiedad;
Propiedad::setDB($db); //Los que pertenecen a la clase de propiedad van hacer referencia a la base de datos
