<?php
    include_once "conexion.php";

    class Papivaa{

       protected $fechaexamen;
       protected $fechaentrega;	
       protected $establecimientoreferencia;	
       protected $establecimientoatencion;	
       protected $responsable;
       protected $resultados;
       protected $tipoexamen;
       protected $motivoreferencia;	
       protected $procedimientotto;	
       protected $procedimientodx;	
       protected $referenciaefectiva;	
       protected $codigopaciente;


        function __construct($fechaexamen,$fechaentrega,$establecimientoreferencia,$establecimientoatencion,$responsable,$resultados,$tipoexamen, $motivoreferencia,$procedimientotto, $procedimientodx,$referenciaefectiva,$codigopaciente){
            $this->fechaexamen=$fechaexamen;
            $this->fechaentrega=$fechaentrega;
            $this->establecimientoreferencia=$establecimientoreferencia;
            $this->establecimientoatencion=$establecimientoatencion;
            $this->responsable=$responsable;
            $this->resultados=$resultados;
            $this->tipoexamen=$tipoexamen;
            $this->motivoreferencia=$motivoreferencia;
            $this->procedimientotto=$procedimientotto;
            $this->procedimientodx=$procedimientodx;
            $this->referenciaefectiva=$referenciaefectiva;
            $this->codigopaciente=$codigopaciente;
        }

        public static function vacio(){
			return new self('','','','','','','','','','','','');
		}
        public function insertarExamen(){
            $conect = new Conexion();
            $rsInsertarExamen = "INSERT INTO seguimiento_pap_ivaa(fechaexamen,fechaentrega,
               establecimientoreferencia,establecimientoatencion,responsable,resultados,	
               tipoexamen,motivoreferencia,procedimientotto,procedimientodx,referenciaefectiva,codigopaciente)
              VALUES ('$this->fechaexamen','$this->fechaentrega','$this->establecimientoreferencia','$this->establecimientoatencion','$this->responsable','$this->resultados','$this->tipoexamen','$this->motivoreferencia','$this->procedimientotto','$this->procedimientodx','$this->referenciaefectiva','$this->codigopaciente')";
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
            inner join control_pap_iva as c on se.codigoseguimientopapivaa = c.codigoseguimientopapivaa
            WHERE se.codigoseguimientopapivaa = $codigo";
            $result =  $conect->query($consulta);
            return $result;
        }
    }

?>