<?php
$webhost = $_SERVER['HTTP_HOST'];

if ($webhost === 'animaloop.000.pe') {
    // Configuración para animaloop.site
    $host = 'sql102.infinityfree.com';
    $port = '3306';
    $dbname = 'if0_37501153_anime_db';
    $username = 'if0_37501153';
    $password = 'Animaloop';
} else {
    // Configuración para otras URLs
    $host = 'junction.proxy.rlwy.net';
    $port = '17360';
    $dbname = 'railway';
    $username = 'root';
    $password = 'KkbXGfIVQlaTSMlyiPUoISIdusgDLsXG';
}

$conn = new mysqli($host, $username, $password, $dbname, $port);
$webhost = "";
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (!$conn->set_charset("utf8")) {
    die("Error al establecer la codificación UTF-8: " . $conn->error);
}
?>
