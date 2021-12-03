<?php
    // llamado del archivo conexion.php como si fuera una libreria
    include('conexion.php');
    // conexion de la db haciendo referencia a la funcion Conexion del archivo conexio.php
    $conexion = Conexion();

    if(empty($_POST['tramites'])){
        $error = 'Selecciona una modalidad';
    }else{
        $tramites = $_POST['tramites'];
    }

    if($error == ''){
        $result_id_oficio = pg_query($conexion, "SELECT id_oficio FROM oficio_e1 WHERE id_oficio=(select max(id_oficio) from oficio_e1)");
        if($row = pg_fetch_row($result_id_oficio)) {
            $oficio=$row[0];
        }

        // consulta hacia la tabla persona_e1 y obtener el id de persona
        $result = pg_query($conexion, "SELECT id_persona FROM persona_e1 WHERE id_persona=(select max(id_persona) from persona_e1)");
        if($row = pg_fetch_row($result)) {
            $id=$row[0];
        }
            
        //insert de los datos hacia la tabla op_tramite_e1
        $op_tramite = pg_query ("INSERT INTO op_tramite_e1 (id_tramiteop, id_tramite, id_persona, fecha_inicio, hora_inicio, fecha_final, id_oficio, id_modalidad) 
        VALUES (DEFAULT, '1' , '$id', current_timestamp, current_timestamp, current_timestamp, $oficio, '$tramites')");
        // sentencia de contron if para determinar si se logro insertar un valor a la tabla op_ciudadano_empresa
        if ( $op_tramite ){// si la variable contiene un valor entra al if
            echo 'exito';
        }else{// si no contiene nada entra al else
            echo "<br>Error los datos no fueron ingresados en op tramites";
        }
        // fin de la sentencia de control if insert tabla op_ciudadano_empresa

        
    }else{
        echo $error;
    }

?>