<?php
include_once "conexion.php";

class Referencia{
    protected $codigo;
    protected $nombre;
    protected $distrito;

    function __construct($codigo, $nombre, $distrito){
        $this->codigo=$codigo;
        $this->nombre=strtoupper($nombre);
        $this->distrito=strtoupper($distrito);
    }

    public static function constructorvacio()
    {
        return new self('','','');
    }

    public function insertar(){
        $db= new Conexion();
        $sql= "INSERT INTO centros_referencia (codigo,nombre, distrito) VALUES ('$this->codigo','$this->nombre','$this->distrito') ";
        $db->query($sql) ? $mm = "registro correcto"  : $mm = "no se puede registrar :: ENTIDAD";
        echo $mm;
    }


    public function mostrar(){
        $db= new Conexion();
        $sql="SELECT * FROM centros_referencia ";
        $resultado=$db->query($sql);
        return $resultado;
    }
    public function buscarRepetido($codigo){
        $db= new Conexion();
        $sql="SELECT * FROM centros_referencia WHERE codigo = '$codigo' ";
        $resultado=$db->query($sql);
        if (mysqli_num_rows($resultado) >0) {
            return 1;
        } else {
            return 0;
        }
    }
}

?>
