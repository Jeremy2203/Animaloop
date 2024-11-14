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

    <!-- Inicio del contenedor principal -->
    <div id="main-wrapper" class="main-wrapper overflow-hidden">
    <div class="container-po">
    <div class="content-po">
        <!-- Información de contacto -->
        <h1>Política de Privacidad</h1>

        <p>En <strong>Anime loop</strong>, valoramos y respetamos su privacidad. A continuación, explicamos cómo recopilamos, utilizamos y protegemos la información personal que usted nos proporciona a través de este sitio web.</p>

        <h2>1. Recopilación de Información</h2>
        <p>Recopilamos información personal de diferentes formas, incluyendo, pero no limitándose a, formularios de contacto, registros de usuarios y cookies.</p>

        <h2>2. Uso de la Información</h2>
        <p>Utilizamos la información personal recopilada para proporcionarle nuestros servicios, mejorar nuestro sitio web y comunicarnos con usted según sea necesario.</p>

        <h2>3. Protección de la Información</h2>
        <p>Implementamos medidas de seguridad adecuadas para proteger la información personal contra accesos no autorizados, alteraciones, divulgaciones o destrucciones.</p>

        <h2>4. Compartición de Información</h2>
        <p>No compartiremos su información personal con terceros, excepto cuando sea necesario para cumplir con la ley, proteger nuestros derechos, o con su consentimiento explícito.</p>

        <h2>5. Cookies</h2>
        <p>Utilizamos cookies y tecnologías similares para mejorar su experiencia en nuestro sitio web y para recopilar información sobre cómo interactúa con nosotros.</p>

        <h2>6. Cambios a la Política de Privacidad</h2>
        <p>Nos reservamos el derecho de actualizar esta Política de Privacidad en cualquier momento. Le recomendamos revisar periódicamente esta página para estar informado sobre cualquier cambio.</p>

        <h2>7. Contacto</h2>
        <p>Si tiene preguntas sobre nuestra Política de Privacidad, por favor contáctenos a través de <strong>opticafalconbusiness@gmail.com</strong> o por teléfono al <strong>999-999-999</strong>.</p>
    </div>
</div>
    
    </div>

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