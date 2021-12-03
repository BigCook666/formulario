<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>

<body id="body">
  <header class="bg-vino">
    <nav class="container navbar navbar-expand-lg color-white">
      <a class="navbar-brand" href="#">Tabasco.gob.mx</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Transparencia</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Gobierno</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Noticias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Tramites</a>
          </li>
        </ul>
        <form class="form-inline mx-4 my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        </form>
      </div>
    </nav>
  </header>

  <main class="mt-4 mb-4">
    <div class="form-group">
      <div class="container mb-2">
        <a class="btn btn-vino" href="../../index.php">Regresar</a>
      </div>
      <div class="container">
        <!-- titulo -->
        <h2 class="text-center">
          Dictamen de seguridad e inspección de inmueble
        </h2>
        <hr />
        <div class="container my-4">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link" id="denuncia-tab" data-toggle="tab" href="#denuncia" role="tab" aria-controls="denuncia" aria-selected="true">Datos personales</a>
            </li>
            <li class="nav-item">
              <a href="#empresa" class="nav-link" id="empresa-tab" data-toggle="tab" role="tab" aria-controls="empresa" aria-selected="false">
                Datos empresariales
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="denunciante-tab" data-toggle="tab" href="#denunciante" role="tab" aria-controls="denunciante" aria-selected="false">Recepción de archivos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="modalidad-tab" data-toggle="tab" href="#modalidad" role="tab" aria-controls="modalidad" aria-selected="false">Modalidad</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <!-- Persona -->
            <div class="tab-pane fade" id="denuncia" role="tabpanel" aria-labelledby="denuncia-tab">
              <div class="my-2">
                <div class="alert alert-success d-none" id="correctoMsg">
                  todo correcto
                </div>
                <div class="alert alert-danger d-none" id="errorMsg">
                </div>
              </div>
              <div id="persona_content" class="container mt-3 hidden">
                <form id="form_persona" novalidate>
                  <div class="form-row">
                    <div class="form-group col-lg-6 col-md-6">
                      <label for="">Fecha de solicitud</label>
                      <input required type="date" name="Fecha" id="" class="form-control" aria-describedby="helpId" required />
                    </div>

                    <div class="form-group col-lg-6 col-md-6">
                      <label for="">Asunto</label>
                      <input required type="text" name="Asunto" id="" class="form-control" placeholder="Descripción" aria-describedby="helpId" required />
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-lg-12">
                      <label for="">Nombre del solicitante</label>
                      <input required type="text" name="NombreSol" id="" class="form-control" placeholder="Nombre" aria-describedby="helpId" required />
                    </div>
                    <div class="form-group col-lg-6 col-md-6">
                      <label for="">Apellido Paterno</label>
                      <input required type="text" name="ApellidoP" id="" class="form-control" placeholder="Paterno" aria-describedby="helpId" required />
                    </div>
                    <div class="form-group col-lg-6 col-md-6">
                      <label for="">Apellido Materno</label>
                      <input required type="text" name="ApellidoM" id="" class="form-control" placeholder="Materno" aria-describedby="helpId" required />
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-lg-4 col-md-4">
                      <label for="">RFC</label>
                      <input required type="text" name="RFC" id="" class="form-control" placeholder="RFC" aria-describedby="helpId" required />
                    </div>
                    <div class="form-group col-lg-4 col-md-4">
                      <label for="">Celular</label>
                      <input required type="tel" name="Celular" id="" class="form-control" placeholder="993-224-5543" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" aria-describedby="helpId" required />
                    </div>

                    <div class="form-group col-lg-4 col-md-4">
                      <label for="">Correo</label>
                      <input required type="text" name="Correo" id="" class="form-control" placeholder="ejemplo@ejemplo.com" aria-describedby="helpId" required />
                    </div>
                  </div>

                  <div>
                    <button id="btn-persona" class="btn btn-vino">
                      continuar
                    </button>
                  </div>
                  
                </form>
              </div>
            </div>
            <!-- Fin persona -->
            <!-- Empresa -->
            <div class="tab-pane fade" id="empresa" role="tabpanel" aria-labelledby="empresa-tab">
              <div class="my-2">
                <div class="alert alert-success d-none" id="correctoMsg2">
                  todo correcto
                </div>
                <div class="alert alert-danger d-none" id="errorMsg2">
                </div>
              </div>
              <div id="empresa_content" class="container mt-3 hidden">
                <form action="" id="formulario_empresa" novalidate>
                  <div class="form-row">
                    <div class="form-group col-lg-6 col-md-6">
                      <label for="">Nombre de la empresa</label>
                      <input type="text" name="NombreEmpr" id="" class="form-control" placeholder="Nombre" aria-describedby="helpId" />
                    </div>
                    <div class="form-group col-lg-6 col-md-6">
                      <label for="">Giro de la empresa</label>
                      <input type="text" name="giroEm" id="" class="form-control" placeholder="Giro de la empresa, establecimiento y/o negocio" aria-describedby="helpId" />
                    </div>
                  </div>
                  <!-- Direccion fisica -->
                  <div>
                    <p>Dirección fiscal</p>
                    <div class="form-row">
                      <div class="form-group col-lg-3 col-md-6">
                        <label for="">Calle</label>
                        <input type="text" name="calles" id="" class="form-control" placeholder="Calle" aria-describedby="helpId" />
                      </div>

                      <div class="form-group col-lg-3 col-md-6">
                        <label for="">Colonia</label>
                        <input type="text" name="colonia" id="" class="form-control" placeholder="colonia" aria-describedby="helpId" />
                      </div>

                      <div class="form-group col-lg-6 col-md-12">
                        <label for="">Numero del local</label>
                        <input type="text" name="numlo" id="" class="form-control" placeholder="interno o externo" aria-describedby="helpId" />
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-lg-3 col-md-6">
                        <label for="">Sector</label>
                        <input type="text" name="sector" id="" class="form-control" placeholder="Sector" aria-describedby="helpId" />
                      </div>

                      <div class="form-group col-lg-3 col-md-6">
                        <label for="">Entre que calles</label>
                        <input type="text" name="entreCall" id="" class="form-control" placeholder="Entre que calles" aria-describedby="helpId" />
                      </div>

                      <div class="form-group col-lg-6">
                        <!-- <label for="">Oficina con Noº de extensión</label> -->
                        <label for="">Teléfono de la oficina</label>
                        <input type="text" name="OficinaCon" id="" class="form-control" placeholder="Oficina con número de extención" aria-describedby="helpId" />
                      </div>
                    </div>

                  </div>
                  <!-- fin direccion fisica -->
                  <!-- Direccion comercial -->
                  <!-- <div>
                              <p>Dirección comercial</p>
                              <div class="form-row">
                                <div class="form-group col-lg-3 col-md-6">
                                  <label for="">Calle</label>
                                  <input 
                                    type="text"
                                    name="calles"
                                    id=""
                                    class="form-control"
                                    placeholder="Calle"
                                    aria-describedby="helpId"
                                  />
                                </div>
                  
                                <div class="form-group col-lg-3 col-md-6">
                                  <label for="">Colonia</label>
                                  <input 
                                    type="text"
                                    name="colonia"
                                    id=""
                                    class="form-control"
                                    placeholder="colonia"
                                    aria-describedby="helpId"
                                  />
                                </div>
                  
                                <div class="form-group col-lg-6 col-md-12">
                                  <label for="">Numero del local</label>
                                  <input 
                                    type="text"
                                    name="numlo"
                                    id=""
                                    class="form-control"
                                    placeholder="interno o externo"
                                    aria-describedby="helpId"
                                  />
                                </div>
                              </div>
                  
                              <div class="form-row">
                                <div class="form-group col-lg-3 col-md-6">
                                  <label for="">Sector</label>
                                  <input 
                                    type="text"
                                    name="sector"
                                    id=""
                                    class="form-control"
                                    placeholder="Sector"
                                    aria-describedby="helpId"
                                  />
                                </div>
                  
                                <div class="form-group col-lg-3 col-md-6">
                                  <label for="">Entre que calles</label>
                                  <input 
                                    type="text"
                                    name="entreCall"
                                    id=""
                                    class="form-control"
                                    placeholder="Entre que calles"
                                    aria-describedby="helpId"
                                  />
                                </div>
                  
                                <div class="form-group col-lg-6">
                                  <label for="">Teléfono de la oficina</label>
                                  <input 
                                    type="text"
                                    name="OficinaCon"
                                    id=""
                                    class="form-control"
                                    placeholder="Oficina con número de extención"
                                    aria-describedby="helpId"
                                  />
                                </div>
                                
                              </div>
                              
                              <div class="form-row">
                              </div>
                            </div> -->
                  <!-- fin direccion comercial -->
                  <div>
                    <button id="btn-empresa" class="btn btn-vino">
                      continuar
                    </button>
                  </div>
                </form>
              </div>

            </div>
            <!-- Fin empresa -->

            <!-- DOCUMENTOS -->
            <div class="tab-pane fade" id="denunciante" role="tabpanel" aria-labelledby="denunciante-tab">
              <div class="my-2">
                <div class="alert alert-success d-none" id="correctoMsg3">
                  todo correcto
                </div>
                <div class="alert alert-danger d-none" id="errorMsg3">
                </div>
              </div>
              <div class="container mt-3 hidden" id="contenedor1">
                <form id="formulario_archivos" enctype="multipart/form-data">
                  <div class="form-group">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="">Plano o croquis de la construcción</label>
                        <div class="form-group">
                          <label for="">Cargar archivo</label>
                          <input type="file" name="firma" id="archivo1" accept=".pdf" required />
                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="ejemplo_archivo_1">Comprobante de domicilio del estado de
                          tabasco</label>
                        <br />
                        <input type="file" name="comprobante" id="archivo2" accept=".pdf" required />
                        <p class="help-block">No mayor a 3 meses</p>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="ejemplo_archivo_1">INE/IFE o Licencia de conducir</label>
                        <br />
                        <input type="file" name="ine" id="archivo3" accept=".pdf" required />
                        <p class="help-block">
                          Comprobante de amabas caras
                        </p>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="ejemplo_archivo_1">Copia del acta constitutiva o carta poder</label>
                        <br />
                        <input type="file" name="rfc" id="archivo4" accept=".pdf" required />
                        <p class="help-block">
                          Documento que valida la acta constitutiva o carta poder
                        </p>
                      </div>
                      <div>
                        <button id="btn-empresa" class="btn btn-vino">
                          continuar
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>

            </div>

            <div class="tab-pane fade" id="modalidad" role="tabpanel" aria-labelledby="modalidad-tab">
              <div class="my-2">
                <div>
                  <div class="alert alert-success d-none" id="correctoMsg4">
                    todo correcto
                  </div>
                  <div class="d-none" id="correctoBtn">
                    <a class="btn btn-vino" href="lineaCaptura.php">Continuar</a>
                  </div>
                </div>
                <div class="alert alert-danger d-none" id="errorMsg4">
                </div>
              </div>
              <div class="container mt-3 hidden" id="modalidades">
                <form id="formulario_modalidad">
                  <div class="form-group">
                    <select name="tramites" class="browser-default custom-select">
                      <option value="" selected>Seleccione una opcion</option>
                      <?php
                      // poner el valor a los options
                      include('conexion.php');
                      $con = Conexion();
                      $modalidad = pg_query($con, "select id_modalidad, nombre from modalida_tramite_e1 mte where id_modalidad in (select id_modalidad from op_tramite_dep_modalidad_e1 otdme where id_tramite = 1)");
                      while ($row = pg_fetch_row($modalidad)) {
                        echo "<option value='$row[0]'>" . $row[1] . "</option>";
                      }
                      ?>
                    </select>
                  </div>
                  <div>
                    <button id="btn-empresa" class="btn btn-vino">
                      continuar
                    </button>
                  </div>
                </form>
              </div>

            </div>

          </div>
        </div>
      </div>

    </div>

    </div>
  </main>



  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="./form.js"></script>
</body>

</html>