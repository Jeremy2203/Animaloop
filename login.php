<?php require 'php/head.php'; ?>
<?php require 'iniciar_correo.php'; ?>
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
    <div id="main-wrapper" class="main-wrapper overflow-hidden">

        <div class="page-content">
            <!-- 404 Inicio del área -->
            <section class="login text-center">
                <div class="content">
                    <div class="login-block">
                        <div class="login-content">
                            <h1 class="text-white mb-32">Inicia sesión</h1>
                            <!-- <a class="google hide-link mb-24" href="#"><img alt="" src="assets/media/icons/google.php" />Continuar con Google</a>
                            <a class="facebook hide-link mb-24" href="#"><img alt="" src="assets/media/icons/facebook-2.php" />Continuar con Facebook</a> -->
                            <button class="mail hide-link mb-32" id="continue-email"><img alt="" src="assets/media/icons/mail.php" />Continuar con correo</button>
                            <div class="login-sec hide-form" style="display: none;">
                                <form action="login.php" method="post">
                                    <?php if (!empty($error_mensaje)): ?>
                                        <p id="alerta-mensaje" class="error_msj" style="display: block;"><?php echo $error_mensaje; ?></p>
                                    <?php endif; ?>
                                    <br>
                                    <div class="mb-32">
                                        <input class="form-control mb-32" name="email" placeholder="Ingresa tu correo electrónico" type="email" />
                                    </div>
                                    <div class="mb-32">
                                        <input class="form-control mb-32" name="password" placeholder="Introducir contraseña" type="password" />
                                    </div>
                                    <div class="text-center mb-32">
                                        <button class="cus-btn primary mb-32">Acceso</button>
                                    </div>
                                </form>
                                <h6 class="text-primary mb-16" id="backtologin">Volver</h6>
                            </div>
                            <div class="text-center">
                                <h6>¿Crear una cuenta?<a class="text-primary" href="sign-up.php">Inscribirse</a></h6>
                            </div>
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
    <script>
        document.getElementById('continue-email').addEventListener('click', function() {
            // Muestra el formulario de inicio de sesión y oculta el botón "Continuar con correo"
            document.querySelector('.login-sec').style.display = 'block';
            document.getElementById('continue-email').style.display = 'none';
        });

        // Para ocultar el formulario y volver a mostrar el botón, agrega este código
        document.getElementById('backtologin').addEventListener('click', function() {
            document.querySelector('.login-sec').style.display = 'none';
            document.getElementById('continue-email').style.display = 'block';
        });
    </script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Mensaje de error inyectado desde PHP
        const errorMensaje = "<?php echo isset($error_mensaje) ? addslashes($error_mensaje) : ''; ?>";
        
        if (errorMensaje) {
            // Muestra el formulario y oculta el botón de correo
            document.querySelector('.login-sec').style.display = 'block';
            document.getElementById('continue-email').style.display = 'none';
        }
    });
</script>



</body>


</html>