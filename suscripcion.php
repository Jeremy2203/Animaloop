<?php require 'php/head.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Anime web">
    <?php echo $css ?>
    <?php echo $css2 ?>
    <title>AnimaLoop</title>
    <style>
        body {
            font-family: Arial, sans-serif !important;
            line-height: 1.6 !important;
        }
        h1 {
            text-align: center; /* Centra el título */
            font-size: 2em;
            font-weight: bold; /* Negrita */
            margin-bottom: 20px;
            color: #fec73c;
        }

        h2 {
            font-size: 1.5em;
            font-weight: bold; /* Negrita */
            margin-top: 20px;
            margin-bottom: 10px;
            color: #fec73c;
        }

        p {
            font-size: 1em;
            margin-bottom: 15px; /* Espaciado entre párrafos */
            text-align: justify; /* Justificar el texto */
        }

        strong {
            color: #fec73c; /* Resalta los datos importantes */
        }

        a {
            color: #4CAF50;
            text-decoration: underline;
        }

        a:hover {
            color: #388E3C;
        }
	</style> 
</head>

<body>
    <!-- Área de encabezado Inicio -->
    <?php include 'php/navbar2.php'; ?>
    <!-- Fin del área de encabezado -->
    <?php include 'PagoSimulacion/simulacion.php'; ?>
    <?php include 'php/cookies.php'; ?>
    <!-- Jquery JS -->
    <script src="assets/js/vendor/jquery-3.6.3.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <script src="assets/js/vendor/slick.min.js"></script>
    <script src="assets/js/vendor/jquery-appear.js"></script>
    <script src="assets/js/vendor/jquery-validator.js"></script>
    <script src="assets/js/vendor/aksVideoPlayer.js"></script>

    <!-- Guiones del sitio -->
    <script src="assets/js/app.js"></script>
</body>

</html>