<?php
       include_once "conexion.php";
        
    class DetalleControlPapivaa{

        protected $idpaciente;
        protected $idcontrol;
        protected $fechacontrol;
        protected $descripcion;


        function __construct($idpaciente,$idcontrol,$fechacontrol,$descripcion){
            $this->idpaciente = $idpaciente;
            $this->idcontrol = $idcontrol;
            $this->fechacontrol = $fechacontrol;
            $this->descripcion = $descripcion;
        }

        public function insertarExamen(){
            $conectar = new Conexion();
            $consulta = "INSERT INTO controles_pap_ivaa(idpaciente,idcontrol,fechacontrol,descripcion) VALUES ('$this->idpaciente','$this->idcontrol','$this->fechacontrol','$this->descripcion')";
            $conectar->query($consulta);
        }



    }


?>