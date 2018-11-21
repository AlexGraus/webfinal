<?php

    include_once "conexion.php";

    class Mamografia{


		protected $nombreexamen;
		protected $fechaexamen;
		protected $centroprocedencia;
		protected $diagnostico;
        protected $codigoecografia;
        protected $codigopaciente;

		function __construct($nombreexamen, $fechaexamen, $centroprocedencia, $diagnostico, $codigoecografia, $codigopaciente)
		{
			$this->nombreexamen=$nombreexamen;
			$this->fechaexamen=$fechaexamen;
            $this->centroprocedencia=$centroprocedencia;
            $this->diagnostico=$diagnostico;
			$this->codigoecografia=$codigoecografia;
			$this->codigopaciente=$codigopaciente;
		}

		public static function constructorvacio()
		{
			return new self('','','','','','');
		}


        public function insertarMamografia(){
            $db= new Conexion();
            $sql = "INSERT INTO  seguimiento_mamografia(nombreexamen, fechaexamen,centroprocedencia,diagnostico,idecografia,dnipaciente)
            VALUES ('$this->nombreexamen','$this->fechaexamen','$this->centroprocedencia', '$this->diagnostico', '$this->codigoecografia', '$this->codigopaciente')";
            $db->query($sql);
            return $db;
          }

          public function obtenerUltimoMamografia($conector){
            $id=$conector->insert_id;
            return $id;
        }


    }

?>

