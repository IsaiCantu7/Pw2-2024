<?php
// Datos de conexión a la base de datos
$servername = "localhost"; 
$username = "root";
$password = "";
$database = "programacion";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$conn->set_charset("utf8");


?>
