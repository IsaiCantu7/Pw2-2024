<?php
// Datos de conexión a la base de datos
$servername = "localhost"; // Cambia esto si tu base de datos no está en localhost
$username = "root";
$password = "";
$database = "programacion";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Establecer el conjunto de caracteres a UTF-8 (opcional)
$conn->set_charset("utf8");

// Otras configuraciones de conexión si es necesario

?>
