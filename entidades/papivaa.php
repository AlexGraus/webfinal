<?php
    include_once "conexion.php";

    class Papivaa{

       protected $fechaexamen;
       protected $establecimientoreferencia;	
       protected $establecimientoatencion;	
       protected $responsable;
       protected $resultados;
       protected $tipoexamen;
       protected $motivoreferencia;	
       protected $referirvph;
       protected $codigopaciente;


        function __construct($fechaexamen,$establecimientoreferencia,$establecimientoatencion,$responsable,$resultados,$tipoexamen, $motivoreferencia,$referirvph,$codigopaciente){
            $this->fechaexamen=$fechaexamen;
            $this->establecimientoreferencia=$establecimientoreferencia;
            $this->establecimientoatencion=$establecimientoatencion;
            $this->responsable=$responsable;
            $this->resultados=$resultados;
            $this->tipoexamen=$tipoexamen;
            $this->motivoreferencia=$motivoreferencia;
            $this->referirvph=$referirvph;
            $this->codigopaciente=$codigopaciente;
        }

        public static function vacio(){
			return new self('','','','','','','','','');
		}
        public function insertarExamen(){
            $conect = new Conexion();
            $rsInsertarExamen = "INSERT INTO seguimiento_pap_ivaa(fechaexamen, 
            establecimientoreferencia,establecimientoatencion, responsable, resultados, referirvph,
             tipoexamen, codigopaciente,motivoreferencia) VALUES('$this->fechaexamen','$this->establecimientoreferencia','$this->establecimientoatencion','$this->responsable',
             '$this->resultados','$this->referirvph','$this->tipoexamen','$this->codigopaciente','$this->motivoreferencia')";
            $conect->query($rsInsertarExamen);

            return $conect;
        }
        public function obtenerUltimoRegistro($conector){
            $id=$conector->insert_id;
            return $id;
        }

        public function buscarcodigo($codigo){
            $conect = new Conexion();
            $consulta = "SELECT se.codigoseguimientopapivaa, se.codigopaciente,c.idcontro_pap_iva FROM seguimiento_pap_ivaa as se 
            inner join referencia_papiva as rp on se.codigoseguimientopapivaa=rp.codigopapiva
            inner join control_pap_iva as c on rp.idpapiva = c.codigoseguimientopapivaa
            WHERE se.codigoseguimientopapivaa = $codigo";
            $result =  $conect->query($consulta);
            return $result;
        }
    }

?>