<?php

namespace App;
class Propiedad{
    protected static $db;
    protected static $columnasDB = [//realizar la sanitizacion automaticamente
    "id_propiedad",
    "titulo",
    "precio",
    "imagen",
    "descripcion",
    "habitaciones",
    "wc",
    "estacionamiento",
    "fch_creado",
    "id_vendedor"
    ];
    protected static $errores=[];

    private $id_propiedad;
    private $titulo;
    private $precio;
    private $imagen;
    private $descripcion;
    private $habitaciones;
    private $wc;
    private $estacionamiento;
    private $fch_creado;
    private $id_vendedor;
    
    public static function setDB($db){self::$db=$db;}
    
    public function __construct($args=[]) {
        
        $this->id_propiedad     =   $args['id_propiedad']??'';
        $this->titulo           =   $args['titulo']??'';
        $this->precio           =   $args['precio']??'';
        $this->imagen           =   $args['imagen']??'';
        $this->descripcion      =   $args['descripcion']??'';
        $this->habitaciones     =   $args['habitaciones']??'';
        $this->wc               =   $args['wc']??'';
        $this->estacionamiento  =   $args['estacionamiento']??'';
        $this->fch_creado       =   date('Y-m-d');
        $this->id_vendedor      =   $args['id_vendedor']??'';
    }

    public function setImage($imagen){
        
        if(isset($this->id_propiedad)){
            $existeArchivo = file_exists(CARPETA_IMAGENES.$this->imagen);
            if($existeArchivo){
                unlink(CARPETA_IMAGENES.$this->imagen);//?eliminar la imagen previa
            }
        }
        if($imagen) {
            $this->imagen = $imagen;
        }
    }

    public function guardar(){
        if($this->id_propiedad!=""){
            return $this->actualizar();
        }else{
            return $this->crear();
        }
    }

    protected function actualizar(){
        //Sanitizar los datos
        $atributos = $this->sanitizarAtributos();
        $listStr=[];
        foreach($atributos as $key=>$value){
            $listStr[] = "$key = '$value'";
        }
        $str= join(', ',$listStr);
        $id = self::$db->escape_string($this->id_propiedad);
        $query="UPDATE propiedades set $str where id_propiedad= '$id';";
        $resultado = self::$db->query($query);
        return $resultado;
    }

    protected function crear(){

        //Sanitizar los datos
        $atributos = $this->sanitizarAtributos();
        $campos = join(', ',array_keys($atributos));
        $valores = join("', '",array_values($atributos));

        $query = "INSERT INTO propiedades ($campos) VALUES ('$valores');";
        
        $resultado = self::$db->query($query);
        return $resultado;
    }

    //Identifica y une los atributos de la BD
    public function atributos(bool $todos=false):array{
        $atributos=[];
        foreach(self::$columnasDB as $columna){
            if($columna === 'id_propiedad' && !$todos) continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    protected function sanitizarAtributos():array{
        $atributos = $this->atributos();
        $sanitizado =[];
        foreach($atributos as $key=>$value){
            $sanitizado[$key]=self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    //validacion
    public static function getErrores(){
        return self::$errores;
    }

    public function validar(){
        if(!$this->titulo){
            self::$errores[]="Debes añadir un titulo";
       }
       if(!$this->precio){
           self::$errores[]="Debes añadir un precio";
       }
       if(!$this->habitaciones){
           self::$errores[]="El Numero de habitaciones es obligatorio";
       }
       if(!$this->wc){
           self::$errores[]="El Numero de baños es obligatorio";
       }
       if(!$this->estacionamiento){
           self::$errores[]="El Numero de estacionamiento es obligatorio";
       }
       if(!$this->id_vendedor){
           self::$errores[]="Debes selecionar un vendedor";
       }
       if(!$this->imagen ){
           self::$errores[]="Debes adjuntar una imagen";
       }
    return self::$errores;
    }

    //*Listar todas las propiedades
    public static function all():array{
        $query = "SELECT * FROM propiedades";
        $resultado=self::consultarSQL($query);
        return $resultado;
    }
    //*Listar una propiedad
    public static function byId($id):Propiedad{
        $query = "SELECT * FROM propiedades where id_propiedad = $id";
        $resultado=self::consultarSQL($query);
        return array_shift($resultado);
    }

    protected static function consultarSQL($query):array{
        //Consultar la base de datos 
        $resultado = self::$db->query($query);
        //Iteral losresultados
        $array = [];
        while($registro = $resultado->fetch_assoc()){
            $array[]=self::crearObjeto($registro);
        }
        //liberar la memoria
        $resultado->free();//libera la memoria del servidor
        //retornar los resultados
        return $array;
    }

    //*Se tranforma el resulato a objetos
    protected static function crearObjeto($registro):Propiedad{
        $objeto = new self;
        
        foreach($registro as $key=>$value){
            if(property_exists($objeto, $key)){ //si existe la propiedad con el nombre de la key en objeto
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }

    //Sincroniza el objeto en memoria con los cambios realizados por el usuario
    public function sicronizar(array $args = []){
        foreach($args as $key=>$value){
            if(property_exists($this, $key)){ //si existe la propiedad con el nombre de la key en objeto
                if($this->$key != $value){
                    $this->$key =$value;
                }
            }
        }
        $atributos = $this->atributos();
        return $atributos;
    }
}