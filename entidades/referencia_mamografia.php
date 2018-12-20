<?php
  include_once "conexion.php";

    class ReferenciaMamografia{
        protected $fechareferencia;
        protected $idecografia;
        protected $idexamen;

        function __construct($fechareferencia,$idecografia,$idexamen){
            $this->fechareferencia=$fechareferencia;
            $this->idecografia=$idecografia;
            $this->idexamen=$idexamen;
        }

        public static function vacio(){
            return new self('','','');
        }
        
     public function insertar(){
                $db= new Conexion();
                $sql ="INSERT INTO referencia_mamografia( fechareferencia, idecografia,idexamen)
                 VALUES  ('$this->fechareferencia','$this->idecografia','$this->idexamen')";
                $db->query($sql) ? $mm = "registro correcto"  : $mm = "no se puede registrar :: ENTIDAD";
               return $db;
     }

     public function obtenerUltimoMamografia($conector){
        $id=$conector->insert_id;
        return $id;
    }

    }


?>