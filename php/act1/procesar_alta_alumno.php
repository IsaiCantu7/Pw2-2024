<?php
include 'db.php';

session_start();

// Verificar si el formulario ya ha sido enviado
if(isset($_SESSION['form_submitted']) && $_SESSION['form_submitted'] === true) {
    header("Location: formulario_alta_alumno.php");
    exit();
}

if(isset($_POST['alta_alumno'])) {
    $_SESSION['form_submitted'] = true;

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];

    // Preparar la consulta SQL para insertar el alumno
    $sql_insertar = "INSERT INTO alumnos (nombre, apellido, edad) VALUES ('$nombre', '$apellido', $edad)";

    // Ejecutar la consulta SQL
    if ($conn->query($sql_insertar) === TRUE) {
        echo "Alumno dado de alta correctamente.";
    } else {
        echo "Error al dar de alta al alumno: " . $conn->error;
    }

    $conn->close();
} else {
    // Si el formulario no se envió correctamente, redirigir al formulario de alta de alumno
    header("Location: formulario_alta_alumno.php");
    exit();
}
?>
