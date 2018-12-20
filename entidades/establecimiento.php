<?php
include_once "conexion.php";

class Establecimiento{
    protected $codigo;
    protected $nombre;
    protected $provincia;
    protected $distrito;


    function __construct($codigo, $nombre, $provincia, $distrito ){
        $this->codigo=$codigo;
        $this->nombre=strtoupper($nombre);
        $this->provincia=strtoupper($provincia);
        $this->distrito=strtoupper($distrito);
    }

    public static function constructorvacio()
    {
        return new self('','','','');
    }

    public function insertar(){
        $db= new Conexion();
        $sql= "INSERT INTO establecimiento (codigo,nombre, provincia, distrito) VALUES ('$this->codigo','$this->nombre','$this->provincia','$this->distrito') ";
        $db->query($sql) ? $mm = "registro correcto"  : $mm = "no se puede registrar :: ENTIDAD";
        echo $mm;
    }


    public function mostrar(){
        $db= new Conexion();
        $sql="SELECT * FROM establecimiento order by codigo asc ";
        $resultado=$db->query($sql);
        return $resultado;
    }
    public function buscarRepetido($codigo){
        $db= new Conexion();
        $sql="SELECT * FROM establecimiento WHERE codigo = '$codigo' ";
        $resultado=$db->query($sql);
        if (mysqli_num_rows($resultado) >0) {
            return 1;
        } else {
            return 0;
        }
    }
}

?>
