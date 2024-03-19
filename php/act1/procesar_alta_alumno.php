<?php
include 'db.php';

session_start();

if(isset($_SESSION['form_submitted']) && $_SESSION['form_submitted'] === true) {
    header("Location: formulario_alta_alumno.php");
    exit();
}

if(isset($_POST['alta_alumno'])) {
    $_SESSION['form_submitted'] = true;

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];

    $sql_insertar = "INSERT INTO alumnos (nombre, apellido, edad) VALUES ('$nombre', '$apellido', $edad)";

    if ($conn->query($sql_insertar) === TRUE) {
        echo "Alumno dado de alta correctamente.";
    } else {
        echo "Error al dar de alta al alumno: " . $conn->error;
    }

    $conn->close();
} else {
    header("Location: formulario_alta_alumno.php");
    exit();
}
?>
