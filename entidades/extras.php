<?php
  include_once "conexion.php";

  class Contador{



    public static function vacio()
    {
        return new self();
    }

    public function contadorPapIvaa(){
        $db= new Conexion();
        $sql ="SELECT tipoexamen,COUNT(*) as cantidad FROM seguimiento_pap_ivaa GROUP BY tipoexamen ORDER BY tipoexamen";
        $resul=$db->query($sql);
        return $resul;
    }
   
    public function contadorMamografia(){
        $db= new Conexion();
        $sql =" SELECT nombreexamen, COUNT(*) as cantidad from seguimiento_mamografia group by nombreexamen";
        $resul=$db->query($sql);
        return $resul;
    }

    public function contardorPacientes(){
        $db= new Conexion();
        $sql =" SELECT COUNT(*) as cantidad FROM paciente";
        $resul=$db->query($sql);
        return $resul;
    }

    public function contadorECM(){
        $db= new Conexion();
        $sql =" SELECT COUNT(*) as cantidad FROM seguimiento";
        $resul=$db->query($sql);
        return $resul;
    }


  }
?>
