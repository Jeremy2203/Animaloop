<?php
$error_mensaje = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = isset($_POST['email']) ? trim($_POST['email'])  : '';
    $contra = isset($_POST['password']) ? trim($_POST['password'])  : '';

    if (empty($correo) || empty($contra)) {
        $error_mensaje = "complete todos los campos";
    } else {
        $usuario = verificar($correo, $contra);
        $usermostrar = substr($usuario, 0, 8);
        if ($usuario) {
            session_start();
            $_SESSION['usuario'] = $usermostrar;
            header("Location: index.php");
            exit();
        } else {
            $error_mensaje = "datos incorrectos";
        }
    }
}
?>

<?php

function verificar($correo, $contra)
{
    require 'config/config.php';
    $sql = "SELECT nombre, password FROM usuarios WHERE correo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows == 1) {
        $stmt->bind_result($nombre, $password);
        $stmt->fetch();
        $stmt->close();
        if (password_verify($contra, $password)) {
            return $nombre;
        }
    } else {
        return false;
    }
}
?>