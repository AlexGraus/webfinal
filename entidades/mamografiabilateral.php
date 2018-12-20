<?php

    include_once "conexion.php";

    class Mamografia{


		protected $nombreexamen;
		protected $fechaexamen;
        protected $centroprocedencia;
        protected $diagnostico;
        protected $centroreferencia;
        protected $referencia;
        protected $codigopaciente;
        protected $codigousuario;


		function __construct($nombreexamen,$fechaexamen,$centroprocedencia,$diagnostico,$centroreferencia,$referencia,$codigopaciente,$codigousuario)
		{
			$this->nombreexamen=$nombreexamen;
			$this->fechaexamen=$fechaexamen;
            $this->centroprocedencia=$centroprocedencia;
            $this->diagnostico=$diagnostico;
            $this->centroreferencia=$centroreferencia;
            $this->referencia=$referencia;
            $this->codigopaciente=$codigopaciente;
            $this->codigousuario=$codigousuario;
		}

		public static function vacio()
		{
			return new self('','','','','','','','');
		}


        public function insertarMamografia(){
            $db= new Conexion();
            $sql = "INSERT INTO seguimiento_mamografia(nombreexamen, fechaexamen, 
            centroprocedencia, diagnostico, centroreferencia, referencia, dnipaciente, idusuario) VALUES 
             ('$this->nombreexamen','$this->fechaexamen','$this->centroprocedencia', '$this->diagnostico',
              '$this->centroreferencia','$this->referencia','$this->codigopaciente', '$this->codigousuario')";
            $db->query($sql);
            return $db;
          }

          public function obtenerUltimoMamografia($conector){
            $id=$conector->insert_id;
            return $id;
        }
       

        public function buscarCodigoMamografia($codigo){
            $conect = new Conexion();
            $consulta = " SELECT s.idmamografia,s.dnipaciente,c.idcontrol_mamografia from 
            referencia_mamografia as rf inner join seguimiento_mamografia as s on rf.idexamen=s.idmamografia
            inner join
            control_mamografia as c on c.codigoreferenciamamografia = rf.idreferencia
                 WHERE s.idmamografia  = $codigo";
            $result =  $conect->query($consulta);
            return $result;
        }

        

    }

?>

