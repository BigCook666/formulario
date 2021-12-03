<?php
    // llamado del archivo conexion.php como si fuera una libreria
    include('conexion.php');
    // conexion de la db haciendo referencia a la funcion Conexion del archivo conexio.php
    $conexion = Conexion();

    // consulta hacia la tabla persona_e1 y obtener el id de persona
	$result = pg_query($conexion, "SELECT id_persona FROM persona_e1 WHERE id_persona=(select max(id_persona) from persona_e1)");
	if($row = pg_fetch_row($result)) {
        echo 'id'.$row[0].'<br>';
		$id=$row[0];
	}

    // consulta hacia la tabla persona_e1 y obtener el id de persona
	$result = pg_query($conexion, "SELECT nombre,apellidop,apellidom FROM persona_e1 WHERE id_persona=$id");
	if($row = pg_fetch_row($result)) {
		$nombreSol=$row[0];
        $apellidoP=$row[1];
        $apellidoM=$row[2];
	}

    // consulta hacia la tabla op_tramite_e1 y obtener el id de tramiteop
    $result_id_tramite = pg_query($conexion, "SELECT id_tramiteop, id_modalidad FROM op_tramite_e1 WHERE id_tramiteop=(select max(id_tramiteop) from op_tramite_e1)");
    if($row = pg_fetch_row($result_id_tramite)) {
        echo "folio: $row[0]";
        $folio=$row[0];
        $id_modalida=$row[1];
    }
    
    $result_nom_modalidad = pg_query($conexion, "SELECT nombre FROM modalida_tramite_e1 mte WHERE id_modalidad=$id_modalida");
    if($row = pg_fetch_row($result_nom_modalidad)) {
        $modalidad=$row[0];
    }

    $contribuyente = $nombreSol.' '.$apellidoP.' '.$apellidoM;
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-Frame-Options" content="ALLOW-FROM https://testpagos.tabasco.gob.mx/fin-client/pdf/U-170/">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title></title>
</head>
<body>
    <div style="display: none;">
        <input type="hidden" name="contribuyente" id="contribuyente" value="<?php echo $contribuyente ?>">
        <input type="hidden" name="folio" id="folio" value="<?php echo $folio ?>">
    </div>
    
    <div class="container mt-5">

        <div class="row justify-content-center align-item-center">
            <div class="col-8">
                <div class="error">
                </div>
                <div class="card text-center">
                    <div class="card-header">
                        Dictamen de seguridad e inspección de inmubles
                    </div>
                    <div id="exito" class="card-body">
                        <h5 class="card-title"><?php echo $modalidad?></h5>
                        <p class="card-text"><?php echo $contribuyente ?></p>
                    </div>
                    <div class="card-footer text-muted">
                        Línea de captura
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="lineaCaptura.js"></script>
</body>
</html>