<?php
    function conectarDB() : mysqli{
        $db = new mysqli('localhost', 'root','GaservicioSolrac75!', 'bienes_raices_crud');
        if(!$db){
            echo "Error no se pudo conectar";
            exit;
        }
        return $db;
    }
?>