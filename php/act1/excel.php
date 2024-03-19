<?php
// Conexión a la base de datos
include 'db.php';

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



// Consulta de alumnos
$sql_alumnos = "SELECT * FROM alumnos";
$result_alumnos = $conn->query($sql_alumnos);

$alumnos_data = [];
if ($result_alumnos->num_rows > 0) {
    while ($row = $result_alumnos->fetch_assoc()) {
        $alumnos_data[] = $row;
    }
}

// Consulta de carreras
$sql_carreras = "SELECT * FROM carrera";
$result_carreras = $conn->query($sql_carreras);

$carreras_data = [];
if ($result_carreras->num_rows > 0) {
    while ($row = $result_carreras->fetch_assoc()) {
        $carreras_data[] = $row;
    }
}

// Exportar a XLS
if (isset($_POST['export_alumnos'])) {
    exportToXLS('alumnos', $alumnos_data);
}

if (isset($_POST['export_carreras'])) {
    exportToXLS('carreras', $carreras_data);
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD Universidad</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>CRUD Universidad</h1>
        <h2>Alumnos</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Matrícula</th>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Email</th>
                    <th>Carrera</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($alumnos_data as $alumno) : ?>
                    <tr>
                        <td><?= $alumno['matricula'] ?></td>
                        <td><?= $alumno['nombre'] ?></td>
                        <td><?= $alumno['edad'] ?></td>
                        <td><?= $alumno['email'] ?></td>
                        <td><?= $alumno['id_carrera'] ?></td>
                        <td>
                            <form action="crud.php?eliminar_alumno=<?= $row['id'] ?>" method="POST">
                                <input type="hidden" name="id" value="<?= $alumno['id'] ?>">
                                <input type="submit" name="eliminar_alumno" value="Eliminar" class="btn btn-danger">
                            </form>
                            <a href="editar_alumno.php?id=<?= $alumno['id'] ?>" class="btn btn-warning">Editar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <form action="" method="POST">
            <input type="submit" name="export_alumnos" value="Exportar a XLS" class="btn btn-success">
        </form>

        <h2>Carreras</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($carreras_data as $carrera) : ?>
                    <tr>
                        <td><?= $carrera['nombre'] ?></td>
                        <td>
                            <form action="" method="POST">
                                <input type="hidden" name="id_carrera" value="<?= $carrera['id_carrera'] ?>">
                                <input type="submit" name="baja_carrera" value="Eliminar" class="btn btn-danger">
                            </form>
                            <a href="editar_carrera.php?id_carrera=<?= $carrera['id_carrera'] ?>" class="btn btn-warning">Editar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <form action="" method="POST">
            <input type="submit" name="export_carreras" value="Exportar a XLS" class="btn btn-success">
        </form>
    </div>
</body>
</html>
