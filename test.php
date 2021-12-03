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
    <?php 
            require_once './controller/controller.php';
                $DB = new Controller(); 
            ?>
        <form class="form" id="form_Modalidad" novalidate>
            <div class="row gap-3 justify-content-md-center">
                <div class="mb-3">
                    <select id="opciones" class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>
        </form>
    </div>
    <div class="container" id="error">
    </div>
</body>
<!-- Footer scripts, and functions -->
<?php require_once './includes/footer.php'; ?>

</html>