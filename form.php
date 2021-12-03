<?php
// !Show PHP errors
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Head metas, css, and title -->
    <?php require_once './includes/head.php'; ?>
</head>

<body>
    <!-- Header banner -->
    <?php require_once './includes/header.php'; ?>

    <!-- Body code -->
    <div class="container">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link disabled active" id="nav_form_persona_tab" data-bs-toggle="tab" data-bs-target="#nav_form_persona" type="button" role="tab" aria-controls="nav_form_persona" aria-selected="true">Información Personal</button>
                <button class="nav-link disabled" id="nav_form_empresa_tab" data-bs-toggle="tab" data-bs-target="#nav_form_empresa" type="button" role="tab" aria-controls="nav_form_empresa" aria-selected="false">Datos empresariales</button>
                <button class="nav-link disabled" id="nav_form_documentos_tab" data-bs-toggle="tab" data-bs-target="#nav_form_documentos" type="button" role="tab" aria-controls="nav_form_documentos" aria-selected="false">Recepción de archivos</button>
                <button class="nav-link disabled" id="nav_form_modalidad_tab" data-bs-toggle="tab" data-bs-target="#nav_form_modalidad" type="button" role="tab" aria-controls="nav_form_modalidad" aria-selected="false">Modalidad</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav_form_persona" role="tabpanel" aria-labelledby="nav_form_persona_tab">
                <div class="container">
                    <!-- Form Persona -->
                    <form class="form" id="form_Persona" novalidate>
                        <div class="row gap-3 justify-content-md-center">
                            <div class="col-md-2 mb-2">
                                <label for="form_persona_fecha">Fecha de solicitud</label>
                                <input type="date" name="form_Persona_Fecha" id="form_Persona_Fecha" class="form-control is-valid" required>
                                <div class="invalid-feedback">
                                    Favor de seleccionar una fecha válida.
                                </div>
                                <div class="valid-feedback">
                                    Luce bien.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="form_Persona_Asunto">Asunto</label>
                                <input type="text" class="form-control" id="form_Persona_Asunto" name="form_Persona_Asunto" placeholder="Descripción" required>
                                <div class="invalid-feedback">
                                    Favor de ingresar un asunto.
                                </div>
                                <div class="valid-feedback">
                                    Luce bien.
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="form_Persona_Nombre_S">Nombre del solicitante</label>
                                <input type="text" class="form-control" id="form_Persona_Nombre_S" name="form_Persona_Nombre_S" placeholder="Nombre/s" required>
                                <div class="invalid-feedback">
                                    Porfavor ingrese su nombre.
                                </div>
                                <div class="valid-feedback">
                                    Luce bien.
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="form_Persona_Apellido_P">Apellido Paterno</label>
                                <input type="text" class="form-control" id="form_Persona_Apellido_P" name="form_Persona_Apellido_P" required>
                                <div class="invalid-feedback">
                                    Porfavor ingrese su apellido paterno.
                                </div>
                                <div class="valid-feedback">
                                    Luce bien.
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="form_Persona_Apellido_M">Apellido Materno</label>
                                <input type="text" class="form-control" id="form_Persona_Apellido_M" name="form_Persona_Apellido_M" required>
                                <div class="invalid-feedback">
                                    Porfavor ingrese su apellido materno.
                                </div>
                                <div class="valid-feedback">
                                    Luce bien.
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="form_Persona_Rfc">RFC</label>
                                <input type="text" class="form-control" id="form_Persona_Rfc" name="form_Persona_Rfc" required>
                                <div class="invalid-feedback">
                                    Porfavor ingrese un RFC válido.
                                </div>
                                <div class="valid-feedback">
                                    RFC válido.
                                </div>
                            </div>
                        </div>
                        <div class="row gap-3 justify-content-md-center">
                            <div class="col-md-4 mb-3">
                                <label for="form_Persona_Celular">Celular</label>
                                <input type="tel" class="form-control" id="form_Persona_Celular" name="form_Persona_Celular" placeholder="993-224-5543" maxlength="12" required>
                                <div class="invalid-feedback">
                                    Porfavor ingrese un número celular válido.
                                </div>
                                <div class="valid-feedback">
                                    Luce bien.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="form_Persona_Correo">Correo</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                                    </div>
                                    <input type="email" class="form-control" id="form_Persona_Correo" name="form_Persona_Correo" required>
                                    <div class="invalid-feedback">
                                        Porfavor ingrese un correo válido.
                                    </div>
                                    <div class="valid-feedback">
                                        Luce bien.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Siguiente</button>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="nav_form_empresa" role="tabpanel" aria-labelledby="nav_form_empresa_tab">
                <div class="container">
                    <!-- Form Empresa -->
                    <form class="form" id="form_Empresa" novalidate>
                        <div class="row gap-3 justify-content-md-center">
                            <div class="col-md-4 mb-3">
                                <label for="form_Empresa_Nombre">Nombre de la empresa</label>
                                <input type="text" class="form-control" id="form_Empresa_Nombre" name="form_Empresa_Nombre" required>
                                <div class="invalid-feedback">
                                    Ingrese un nombre.
                                </div>
                                <div class="valid-feedback">
                                    Luce bien.
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="form_Empresa_Giro">Giro de la empresa</label>
                                <input type="text" class="form-control" id="form_Empresa_Giro" name="form_Empresa_Giro" required>
                                <div class="invalid-feedback">
                                    Ingrese un giro.
                                </div>
                                <div class="valid-feedback">
                                    Luce bien.
                                </div>
                            </div>
                        </div>
                        <!-- Dirección física -->
                        <div class="row gap-3 justify-content-md-center">
                            <div class="container justify-content-md-center">
                                <h6 class="display-6">Dirección Físcal</h6>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="form_Empresa_Calle">Calle</label>
                                <input type="text" class="form-control" id="form_Empresa_Calle" name="form_Empresa_Calle" required>
                                <div class="invalid-feedback">
                                    Ingrese una calle.
                                </div>
                                <div class="valid-feedback">
                                    Luce bien.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="form_Empresa_Colonia">Colonia</label>
                                <input type="text" class="form-control" id="form_Empresa_Colonia" name="form_Empresa_Colonia" placeholder="993-224-5543" maxlength="12" required>
                                <div class="invalid-feedback">
                                    Ingrese una colonia.
                                </div>
                                <div class="valid-feedback">
                                    Luce bien.
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="form_Empresa_N_Local">Número del local</label>
                                <input type="text" class="form-control" id="form_Empresa_N_Local" name="form_Empresa_N_Local" required>
                                <div class="invalid-feedback">
                                    Ingrese el número de local.
                                </div>
                                <div class="valid-feedback">
                                    Luce bien.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="form_Empresa_Sector">Sector</label>
                                <input type="text" class="form-control" id="form_Empresa_Sector" name="form_Empresa_Sector" required>
                                <div class="invalid-feedback">
                                    Ingresa un sector.
                                </div>
                                <div class="valid-feedback">
                                    Luce bien.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="form_Empresa_Entre_Calles">Entre calles</label>
                                <input type="text" class="form-control" id="form_Empresa_Entre_Calles" name="form_Empresa_Entre_Calles" required>
                                <div class="invalid-feedback">
                                    Ingresa este dato.
                                </div>
                                <div class="valid-feedback">
                                    Luce bien.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="form_Empresa_Tel_Oficina">Teléfono de la oficina</label>
                                <input type="tel" class="form-control" id="form_Empresa_Tel_Oficina" name="form_Empresa_Tel_Oficina" maxlength="4" required>
                                <div class="invalid-feedback">
                                    Ingresa este dato.
                                </div>
                                <div class="valid-feedback">
                                    Luce bien.
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Siguiente</button>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="nav_form_documentos" role="tabpanel" aria-labelledby="nav_form_documentos_tab">
                <div class="container">
                    <!-- Form Documentos -->
                    <form class="form" id="form_Documentos" novalidate enctype="multipart/form-data">
                        <div class="row gap-3 justify-content-md-center">
                            <div class="mb-3">
                                <label for="form_Documentos_Comprobante_Domicilio" class="form-label">Comprobante de domicilio <strong>*Estado de
                                        Tabasco*</strong></label>
                                <input class="form-control form-control-sm" accept=".pdf" name="form_Documentos_Comprobante_Domicilio" id="form_Documentos_Comprobante_Domicilio" type="file">
                                <div class="invalid-feedback" id="invalid_feedback_Comprobante_Domicilio">
                                    Ingrese un archivo.
                                </div>
                                <div class="valid-feedback">
                                    Luce bien.
                                </div>
                            </div>
                        </div>
                        <div class="row gap-3 justify-content-md-center">
                            <div class="mb-3">
                                <label for="form_Documentos_Identidad" class="form-label">INE / IFE o Licencia de conducir</label>
                                <input class="form-control form-control-sm" accept=".pdf" name="form_Documentos_Identidad" id="form_Documentos_Identidad" type="file">
                                <div class="invalid-feedback">
                                    Ingrese un archivo.
                                </div>
                                <div class="valid-feedback">
                                    Luce bien.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="form_Documentos_Comprobante_Identidad" class="form-label">Comprobante <strong>*Ambas Caras*</strong> </label>
                                <input class="form-control form-control-sm" accept=".pdf" name="form_Documentos_Comprobante_Identidad" id="form_Documentos_Comprobante_Identidad" type="file">
                                <div class="invalid-feedback">
                                    Ingrese un archivo.
                                </div>
                                <div class="valid-feedback">
                                    Luce bien.
                                </div>
                            </div>
                        </div>
                        <div class="row gap-3 justify-content-md-center">
                            <div class="mb-3">
                                <label for="form_Documentos_Acta_Carta" class="form-label">Copia del acta constitutiva o carta poder</label>
                                <input class="form-control form-control-sm" accept=".pdf" name="form_Documentos_Acta_Carta" id="form_Documentos_Acta_Carta" type="file">
                                <div class="invalid-feedback">
                                    Ingrese un archivo.
                                </div>
                                <div class="valid-feedback">
                                    Luce bien.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="form_Documentos_Comprobante_Acta_Carta" class="form-label">Documento que válida el acta constitutiva o carta poder</label>
                                <input class="form-control form-control-sm" accept=".pdf" name="form_Documentos_Comprobante_Acta_Carta" id="form_Documentos_Comprobante_Acta_Carta" type="file">
                                <div class="invalid-feedback">
                                    Ingrese un archivo.
                                </div>
                                <div class="valid-feedback">
                                    Luce bien.
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Siguiente</button>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="nav_form_modalidad" role="tabpanel" aria-labelledby="nav_form_modalidad_tab">
                <div class="container">
                    <form class="form" id="form_Modalidad" novalidate>
                        <div class="row gap-3 justify-content-md-center">
                            <div class="mb-3">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer scripts, and functions -->
    <?php require_once './includes/footer.php'; ?>

</body>

</html>