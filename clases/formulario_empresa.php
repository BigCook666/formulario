<?php
    // llamado del archivo conexion.php como si fuera una libreria
    include('conexion.php');
    // conexion de la db haciendo referencia a la funcion Conexion del archivo conexio.php
    $conexion = Conexion();

    if(empty($_POST['NombreEmpr'])){
        $error = 'Ingresa el nombre de la empresa<br>';
    }else{
        $nombre = $_POST['NombreEmpr'];
        $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
    }

    if(empty($_POST['giroEm'])){
        $error .= 'Ingrese el giro de la empresa<br>';
    }else{
        $giroEmp = $_POST['giroEm'];
        $giroEmp = filter_var($giroEmp, FILTER_SANITIZE_STRING);
    }

    if(empty($_POST['calles'])){
        $error .= 'Ingrese el nombre de la calle<br>';
    }else{
        $calles = $_POST['calles'];
        $calles = filter_var($calles, FILTER_SANITIZE_STRING);
    }

    if(empty($_POST['colonia'])){
        $error .= 'Ingrese el nombre de la colonia<br>';
    }else{
        $colonia = $_POST['colonia'];
        $colinia = filter_var($colinia, FILTER_SANITIZE_STRING);
    }

    if(empty($_POST['numlo'])){
        $error .= 'Ingrese el número del local<br>';
    }else{
        $numlo = $_POST['numlo'];
        $numlo = filter_var($numlo, FILTER_SANITIZE_STRING);
    }

    if(empty($_POST['sector'])){
        $error .= 'Ingrese el número del local<br>';
    }else{
        $sector = $_POST['sector'];
        $sector = filter_var($sector, FILTER_SANITIZE_STRING);
    }

    if(empty($_POST['sector'])){
        $error .= 'Ingrese entre que calle se encuentra<br>';
    }else{
        $entreCall = $_POST['entreCall'];
        $entreCall = filter_var($entreCall, FILTER_SANITIZE_STRING);
    }

    if(empty($_POST['OficinaCon'])){
        $error .= 'Ingrese el numero teléfonico de la oficina<br>';
    }else{
        $oficinaCon =$_POST['OficinaCon'];
        $oficinaCon = filter_var($oficinaCon, FILTER_SANITIZE_STRING);
    }

    if($error == ''){
        $emp = pg_query("INSERT INTO empresa (id_empresa, nombre, direccion_fisica, direccion_comercial, calle,colonia,numero_local,sector,entre_calles,giro_empresa,oficina_ext) 
        VALUES (DEFAULT,'$nombre', 'Fisica', 'Comercial', '$calles', '$colonia', '$numlo','$sector', '$entreCall','$giroEmp','$oficinaCon')");
        // sentencia de contron if para determinar si se logro insertar un valor a la tabla empresa
        if($emp){// si la variable contiene un valor entra al if
            $result = pg_query($conexion, "SELECT id_persona FROM persona_e1 WHERE id_persona=(select max(id_persona) from persona_e1)");
            if($row = pg_fetch_row($result)) {
                $id=$row[0];
            }
            // consulta hacia la tabla empresa y obtener el id de la empresa
            $empresas = pg_query($conexion, "SELECT id_empresa FROM empresa WHERE id_empresa=(SELECT max(id_empresa) FROM empresa)");
            if($row_empresa = pg_fetch_row($empresas)){
                $id_empresa = $row_empresa[0];
            }
            // insert de los datos a la tabla op_ciudadano_emp
            $empresa_insert = pg_query($conexion, "INSERT INTO op_ciudadano_empresa (id_persona, id_empresa) values ($id, $id_empresa)");
            // sentencia de contron if para determinar si se logro insertar un valor a la tabla op_ciudadano_empresa
            if($empresa_insert){// si la variable contiene un valor entra al if
                echo "exito";
            }else{// si no contiene nada entra al else
                echo  "Los datos no se guardaron en la tabla op_ciudadano_empresa";
            }// fin de la sentencia de control if insert tabla op_ciudadano_empresa
        }else{// si no contiene nada entra al else
            echo "Los datos a la tabla empresa no se ingresaron";
        }// fin de la sentencia de control if insert tabla empresa

              
    }else{
        echo $error;
    }
?>