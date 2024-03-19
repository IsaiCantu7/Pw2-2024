<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $costo = $_POST["costo"];


    include 'db.php';

    $sql = "INSERT INTO modulo_servicios (nombre, costo) VALUES ('$nombre', '$costo')";

    if ($conn->query($sql) === TRUE) {
        echo "El servicio se ha registrado correctamente.";
    } else {
        echo "Error al registrar el servicio: " . $conn->error;
    }
}
?>
