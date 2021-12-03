<?php
require_once './controller/controller.php';
$modelo = new Controller();
$opciones = $modelo->getData("SELECT id, nombre FROM public.modalidad_tramite_e1 WHERE id_tramite = 1");

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
    <div class="container">
        <form class="form" id="form_Modalidad" novalidate>
            <div class="row gap-3 justify-content-md-center">
                <div class="mb-3">
                    <select id="opciones" class="form-select" aria-label="Default select example">
                        <?php foreach ($opciones as $opcion) : ?>
                            <option value="<?= $opcion->id ?>"><?= $opcion->nombre ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </form>
    </div>
</body>
<!-- Footer scripts, and functions -->
<?php require_once './includes/footer.php'; ?>

</html>