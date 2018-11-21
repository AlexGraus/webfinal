<?php
include_once "conexion.php";

class Establecimiento{
    protected $id;
    protected $nombre;
    protected $micro_Red;

    
    function __construct($nombre,$micro_Red, $id=""){
        $this->id=$id;
        $this->nombre=strtoupper($nombre);
        $this->micro_Red=$micro_Red;
    }

    public static function constructorvacio()
    {
        return new self('','');
    }

    public function insertar(){
        $db= new Conexion();
        $sql= "INSERT INTO establecimiento (nombre, micro_Red) VALUES ('$this->nombre','$this->micro_Red') ";
        $db->query($sql) ? $mm = "registro correcto"  : $mm = "no se puede registrar :: ENTIDAD";
        echo $mm;
    }


    public function mostrar(){
        $db= new Conexion();
        $sql="SELECT * FROM establecimiento ";
        $resultado=$db->query($sql);
        return $resultado;
    }
    public function buscarRepetido($nombre){
        $db= new Conexion();
        $sql="SELECT * FROM establecimiento WHERE nombre = '$nombre' ";
        $resultado=$db->query($sql);
        if (mysqli_num_rows($resultado) >0) {
            return 1;
        } else {
            return 0;
        }
    }
}

?>
