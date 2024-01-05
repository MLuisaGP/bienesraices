<?php
//importar la conexion
require 'includes/config/database.php';
$db = conectarDB();

//crear un email y password
$email ="correo@correo.com";
$pwd = "123456";
$passwordHash =password_hash($pwd, PASSWORD_BCRYPT);
//Query para crear el usuario
$query = "INSERT INTO usuarios(email, pwd) VALUES ('$email','$passwordHash')";
//Agregar a la base de datos
mysqli_query($db,$query);