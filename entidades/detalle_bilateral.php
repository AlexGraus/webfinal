<?php
       include_once "conexion.php";
        
    class DetalleBilateral{

        protected $fechabilateral;
        protected $descripcionbilateral;
        protected $codigopaciente;
        protected $codigocontrol;


        function __construct($fechabilateral,$descripcionbilateral,$codigopaciente,$codigocontrol){
            $this->fechabilateral = $fechabilateral;
            $this->descripcionbilateral = $descripcionbilateral;
            $this->codigopaciente = $codigopaciente;
            $this->codigocontrol = $codigocontrol;
        }

        public function insertarDetalleMamografia(){
            $conectar = new Conexion();
            $consulta = "INSERT INTO controles_bilateral(fechabilateral, descripcionbilateral, codigopaciente, codigocontrol) 
            VALUES ('$this->fechabilateral','$this->descripcionbilateral','$this->codigopaciente','$this->codigocontrol')";
            $conectar->query($consulta);
        }



    }


?>