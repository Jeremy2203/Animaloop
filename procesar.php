<?php
    $error_mensaje = "";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nombre = isset($_POST['nombre']) ? trim($_POST['nombre'])  : '';  
        $correo = isset($_POST['email']) ? trim($_POST['email'])  : '';
        $contra = isset($_POST['password']) ? trim($_POST['password'])  : '';

        if(empty($nombre) || empty($correo) || empty($contra)){
            $error_mensaje = "complete todos los campos";
        }else{
            if(revisarcorreo($correo)){
                $error_mensaje = "correo existente";
            }else{
                $resultado = registrar($nombre, $correo, $contra);
            
                if($resultado){
                    header("Location: login.php");
                }else{
                    $error_mensaje = "no se pudo registrar xq no eres otaku";
                }
            }   
        }
    } 
?>

<?php

    require 'config/config.php';
    
    function revisarcorreo($correo){
        $sql = "SELECT id FROM usuarios WHERE correo = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $correo);
        $stmt->execute();
        $stmt->store_result();
        $existe = $stmt->num_rows > 0;
        $stmt->close();
        return $existe;
    }

    function registrar($nom, $cor, $con){
        $pass = password_hash($con, PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuarios (nombre, correo, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sss', $nom, $cor, $pass);
        $registrado = $stmt->execute();
        $stmt->close();
        return $registrado;
    }
?>