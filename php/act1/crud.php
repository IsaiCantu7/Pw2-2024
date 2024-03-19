<?php 
    // integrar archivo de conexion
    include 'db.php';

    // Alta de alumnos
    if(isset($_POST['alta_alumno'])) {
        $matricula = $_POST['matricula'];
        $nombre = $_POST ['nombre'];
        $edad = $_POST['edad'] ;
        $email = $_POST['email'];
        $id_carrera = $_POST['id_carrera'];

        // guardar valores a la tabla de alumnos
        $sql = "INSERT INTO alumnos (matricula, nombre, edad, email, id_carrera) VALUES ('$matricula', '$nombre', '$edad', '$email', '$id_carrera')";
        $result =  $conn->query($sql);
        header('Location: listado.php');
        exit(); 
    }

    // Baja de alumnos
    if(isset($_GET['eliminar_alumno'])){
        $id_alumno = $_GET['eliminar_alumno'];
        $sql = "DELETE FROM alumnos WHERE id=$id_alumno";
        $result = $conn->query($sql);
        header("Location: listado.php");
        exit(); 
    }
    
    // Cambio de alumnos
    if(isset($_POST['cambio_alumno'])){
        $id = $_POST['id'];
        $matricula = $_POST['matricula'];
        $nombre = $_POST['nombre'];
        $edad = $_POST['edad'];
        $email = $_POST['email'];
        $id_carrera = $_POST['id_carrera'];

        // Query de actualizacion en la tabla de alumnos 
        $sql = "UPDATE alumnos SET matricula= '$matricula', nombre= '$nombre', edad= '$edad', email= '$email', id_carrera= '$id_carrera' WHERE id=$id";
        $result = $conn->query($sql);
        header("Location: listado.php");
        exit(); // Terminar la ejecución del script después de redirigir
    }
    
    // Alta de carreras
    if(isset($_POST['alta_carrera'])) {
        $nombre_carrera = $_POST['nombre_carrera'];
        
        // Guardar valores en la tabla de carreras
        $sql = "INSERT INTO carreras (nombre_carrera) VALUES ('$nombre_carrera')";
        $result =  $conn->query($sql);
        header('Location: listado_carreras.php');
        exit(); // Terminar la ejecución del script después de redirigir
    }

    // Baja de carreras
    if(isset($_POST['baja_carrera'])){
        $id_carrera = $_POST['id_carrera'];
        $sql = "DELETE FROM carreras WHERE id_carrera=$id_carrera";
        $result = $conn->query($sql);
        header("Location: listado_carreras.php");
        exit(); // Terminar la ejecución del script después de redirigir
    }

    // Cambio de carreras
    if(isset($_POST['cambio_carrera'])){
        $id_carrera = $_POST['id_carrera'];
        $nombre_carrera = $_POST['nombre_carrera'];

        // Query de actualizacion en la tabla de carreras
        $sql = "UPDATE carreras SET nombre_carrera='$nombre_carrera' WHERE id_carrera=$id_carrera";
        $result = $conn->query($sql);
        header("Location: listado_carreras.php");
        exit(); // Terminar la ejecución del script después de redirigir
    }

    // Alta de materias
    if(isset($_POST['alta_materia'])) {
        $nombre_materia = $_POST['nombre_materia'];
        
        // Guardar valores en la tabla de materias
        $sql = "INSERT INTO materias (nombre) VALUES ('$nombre_materia')";
        $result =  $conn->query($sql);
        header('Location: listado_materias.php');
        exit(); // Terminar la ejecución del script después de redirigir
    }

    // Baja de materias
    if(isset($_POST['baja_materia'])) {
        $id_materia = $_POST['id_materia'];
        
        // Query de eliminacion en la tabla de materias
        $sql = "DELETE FROM materias WHERE id=$id_materia";
        $result = $conn->query($sql);
        header("Location: listado_materias.php");
        exit(); // Terminar la ejecución del script después de redirigir
    }

    // Cambio de materias
    if(isset($_POST['cambio_materia'])) {
        $id_materia = $_POST['id_materia'];
        $nombre_materia = $_POST['nombre_materia'];

        // Query de actualizacion en la tabla de materias
        $sql = "UPDATE materias SET nombre='$nombre_materia' WHERE id=$id_materia";
        $result = $conn->query($sql);
        header("Location: listado_materias.php");
        exit(); // Terminar la ejecución del script después de redirigir
    }

    // Función para exportar a XLS
    function exportToXLS($filename, $data) {
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="' . $filename . '.xls"');

        echo '<table border="1">';
        foreach ($data as $row) {
            echo '<tr>';
            foreach ($row as $column) {
                echo '<td>' . $column . '</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    }

    // Consultas de alumnos, carreras y materias...

    // Exportar a XLS
    if (isset($_POST['export_alumnos'])) {
        exportToXLS('alumnos', $alumnos_data);
    }

    if (isset($_POST['export_carreras'])) {
        exportToXLS('carreras', $carreras_data);
    }

    if (isset($_POST['export_materias'])) {
        exportToXLS('materias', $materias_data);
    }

    $conn->close();
?>
