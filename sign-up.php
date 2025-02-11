<?php require 'php/head.php'; ?>
<?php require 'procesar.php'; ?>
<!DOCTYPE html>
<html lang="es">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Anime web">
    <title>AnimaLoop</title>
    <?php echo $css ?>
    <?php echo $css2 ?>

</head>

<body>
    <!-- Área de encabezado Inicio -->
    <?php include 'php/navbar2.php'; ?>
    <!-- Fin del área de encabezado -->

    <!-- Inicio del contenedor principal -->
    <div id="main-wrapper" class="main-wrapper overflow-hidden">

        <div class="page-content">
            <!-- 404 Inicio del área -->
            <section class="signup text-center">
                <div class="container-fluid">
                    <div class="signup-block">
                        <br>
                        <h1 class="text-white mb-32">Registrate</h1>
                        <form action="sign-up.php" method="post">
                        <?php if (!empty($error_mensaje)): ?>
                            <p id="alerta-mensaje" class="error_msj" style="display: block;"><?php echo $error_mensaje; ?></p>
                        <?php endif; ?>
                            <br>
                            <div class="mb-32">
                                <input class="form-control mb-32" name="nombre" placeholder="Ingresa tu nombre" type="text" />
                            </div>
                            <div class="mb-32">
                                <input class="form-control mb-32" name="email" placeholder="Ingresa tu correo electrónico" type="email" />
                            </div>
                            <div class="mb-32">
                                <input class="form-control mb-32" name="password" placeholder="Introducir contraseña" type="password" />
                            </div>
                            <div class="mb-32">
                                <input class="form-control mb-32" name="c_password" placeholder="Confirmar Contraseña" type="password" />
                            </div>
                            <div class="text-center">
                                <button class="cus-btn primary mb-32">Inscribirse</button>
                            </div>
                        </form>
                        <div class="text-center">
                            <p class="sec color-gray mb-32">Al continuar, acepta los Términos de uso y la Política de privacidad de VIVID.</p>
                            <h6>¿Ya tienes una cuenta?<a class="text-primary" href="login.php">Acceso</a></h6>
                        </div>
                    </div>
                </div>
            </section>
            <!-- 404 Fin del área -->
        </div>
        <!-- Contenido principal Fin -->
    </div>

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
    <script>
        const alertamensaje = document.getElementById('alerta-mensaje');
        if (alertamensaje) {
            setTimeout(() => {
                alertamensaje.classList.add('fade-out');
                setTimeout(() => {
                    alertamensaje.style.display = 'none';
                }, 2000);
            }, 3000);
        }
    </script>
</body>


</html>