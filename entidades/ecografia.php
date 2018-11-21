<?php

    include_once "conexion.php";

    class Ecografia{

		protected $fechaecografia;
		protected $resultados;

		function __construct($fechaecografia, $resultados){
			$this->fechaecografia=$fechaecografia;
			$this->resultados=$resultados;
		}

		public static function constructorvacio(){
			return new self('','');
		}

        public function insertarEcografia(){
            $db= new Conexion();
            $sql = "INSERT INTO ecografia (fechaecografia,resultado)
            VALUES ('$this->fechaecografia','$this->resultados')";
            $db->query($sql);
            return $db;
          }
          public function obtenerUltimo($conector){
            $id=$conector->insert_id;
            return $id;
        }


    }

?>