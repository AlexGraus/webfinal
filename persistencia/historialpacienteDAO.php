<?php

        include ("../entidades/conexion.php");

        $cn = new Conexion();
        $salida = "";
        if(isset($_GET['consulta'])){
            //or nombre LIKE '%".$q."%'"
            $q = $cn->real_escape_string($_GET['consulta']);

            $query = "SELECT sm.diagnostico,sm.fechaexamen FROM paciente as p inner join seguimiento_mamografia as sm on p.dni = 					sm.dnipaciente
                    WHERE p.dni = '".$q."'";
                    
             $resultado = $cn->query($query);

            if($resultado->num_rows > 0){   
                     while($fila = $resultado->fetch_assoc()){
                         $salida.='
                         <div class="alert alert-success" role="alert">
                          Diagnóstico :  '.$fila['diagnostico'].' <br> Fecha : '.$fila['fechaexamen'].'
                          </div>
                         '; 
                     }
             }else{
                $salida = ' <div class="alert alert-info" role="alert">
                               El paciente no cuenta con Examen de Mamografía Bilateral!
                          </div>
                          </div>' ;   
            }

        }else{
            $salida =  '<div class="alert alert-danger" role="alert">
                         Debe Ingresar un DNI!
                         </div>';
        }
        

        echo $salida;

?>