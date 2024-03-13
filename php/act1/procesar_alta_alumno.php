<?php
// incluir el archivo de conexión a la base de datos
include 'db.php';

// Iniciar o reanudar la sesión
session_start();

// Verificar si el formulario ya ha sido enviado
if(isset($_SESSION['form_submitted']) && $_SESSION['form_submitted'] === true) {
    // Si el formulario ya ha sido enviado, redirigir al formulario de alta de alumno
    header("Location: formulario_alta_alumno.php");
    exit();
}

// Verificar si se ha enviado el formulario de alta de alumno
if(isset($_POST['alta_alumno'])) {
    // Marcar el formulario como enviado
    $_SESSION['form_submitted'] = true;

    // Obtener los datos del formulario
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

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    // Si el formulario no se envió correctamente, redirigir al formulario de alta de alumno
    header("Location: formulario_alta_alumno.php");
    exit();
}
?>
