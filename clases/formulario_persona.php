<?php
    // llamado del archivo conexion.php como si fuera una libreria
    include('conexion.php');
    // conexion de la db haciendo referencia a la funcion Conexion del archivo conexio.php
    $conexion = Conexion();

    if(empty($_POST['NombreSol'])){
        $error = 'Ingresa un nombre<br>';
    }else{
        $nombre = $_POST['NombreSol'];
        $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
    }

    if(empty($_POST['ApellidoP'])){
        $error .= 'Ingresa un apellido paterno<br>';
    }else{
        $apellidoP = $_POST['ApellidoP'];
        $apellidoP = filter_var($apellidoP, FILTER_SANITIZE_STRING);
    }

    if(empty($_POST['ApellidoM'])){
        $error.='Ingresa un apellido materno<br>';
    }else{
        $apellidoM = $_POST['ApellidoM'];
        $apellidoM = filter_var($apellidoM, FILTER_SANITIZE_STRING);
    }

    if(empty($_POST['RFC'])){
        $error.='Ingresa un RFC<br>';
    }else{
        $rfc = $_POST['RFC'];
        $rfc = filter_var($rfc, FILTER_SANITIZE_STRING);
    }

    if(empty($_POST['Correo'])){
        $error .= 'Ingresa un email<br>';
    }else{
        $email= $_POST['Correo'];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error .='Ingresa un email verdadero<br>';
        }else{
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        }
    }

    $celular = $_POST['Celular'];

    // $tramite = $_POST['tramites'];
    // $fecha = $_POST['Fecha'];
    // $asunto = $_POST['Asunto']; 
    // $nombreSol = $_POST['NombreSol'];
    // $apellidoP = $_POST['ApellidoP'];
    // $apellidoM = $_POST['ApellidoM'];
    // $correo = $_POST['Correo'];
    // $celular = $_POST['Celular'];
    // $rfc = $_POST['RFC'];

    if($error == ''){
        //insert de los datos a la tabla persona_e1
        $persona = pg_query ("INSERT INTO persona_e1 (id_persona, nombre, apellidop, apellidom, telefono, tipo, razon_social, denominacion_fiscal, correo, rfc) 
        VALUES (DEFAULT,'$nombre', '$apellidoP', '$apellidoM' ,'$celular', '1', '1', '1', '$email','$rfc') ");
        // sentencia de contron if para determinar si se logro insertar un valor a la tabla persona
        if ($persona){// si la variable contiene un valor entra al if
            echo "exito";
        }else{// si no contiene nada entra al else
            echo "<br>Error los datos no fueron guardados persona_e1";
        }// fin de la sentencia de control if insert tabla persona

    }else{
        echo $error;
    }

?>