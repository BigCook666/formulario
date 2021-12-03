<?php
    // llamado del archivo conexion.php como si fuera una libreria
    include('conexion.php');
    // conexion de la db haciendo referencia a la funcion Conexion del archivo conexio.php
    $conexion = Conexion();

    // seteo del tiempo a horario de america - mexico
    date_default_timezone_set('America/Mexico_City');
    
    $result = pg_query($conexion, "SELECT id_persona FROM persona_e1 WHERE id_persona=(select max(id_persona) from persona_e1)");
	if($row = pg_fetch_row($result)) {
		$id=$row[0];
	}

  
    
    $result = pg_query($conexion, "SELECT rfc,nombre,apellidop,apellidom FROM persona_e1 WHERE id_persona=$id");
	if($row = pg_fetch_row($result)) {
		$rfc=$row[0];
        $nombreSol=$row[1];
        $apellidoP=$row[2];
        $apellidoM=$row[3];
        // ruta para la creacion de la carpeta
        $urlDoc = '/var/www/example.com/html/ProteccionCivil23/documentosUsuarios/'.$rfc.'_'.$apellidoP.'_'.$apellidoM.'_'.$nombreSol.'_'.microtime(true);
        //crear la carpeta
        if(mkdir($urlDoc ,0777)){
          $doc1 = $urlDoc.'/'.$rfc.'_'.$apellidoP.'_'.$apellidoM.'_'.$nombreSol.'_doc1.pdf';
          $doc2 = $urlDoc.'/'.$rfc.'_'.$apellidoP.'_'.$apellidoM.'_'.$nombreSol.'_doc2.pdf';
          $doc3 = $urlDoc.'/'.$rfc.'_'.$apellidoP.'_'.$apellidoM.'_'.$nombreSol.'_doc3.pdf';
          $doc4 = $urlDoc.'/'.$rfc.'_'.$apellidoP.'_'.$apellidoM.'_'.$nombreSol.'_doc4.pdf';
          
          $doc = pg_query ("INSERT INTO oficio_e1(id_oficio, doc1, doc2, doc3, doc4) VALUES (DEFAULT, '$doc1','$doc2','$doc3','$doc4')");
            if($doc){
              move_uploaded_file($_FILES['firma']['tmp_name'], $doc1);
              move_uploaded_file($_FILES['ine']['tmp_name'], $doc2);
              move_uploaded_file($_FILES['rfc']['tmp_name'], $doc3);
              move_uploaded_file($_FILES['comprobante']['tmp_name'], $doc4);
              echo "exito";
            }else{
              echo "<br>Los datos no se insertaron en la tabla oficio";
            }
    
        }else{
          echo "<br>hubo un error al crear la carpeta<br>";
        }
	}



?>