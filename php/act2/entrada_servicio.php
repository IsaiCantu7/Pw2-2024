<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fecha_ingreso = $_POST["fecha_ingreso"];
    $servicio = $_POST["servicio"];
    $total_pagar = $_POST["total_pagar"];

    // Validar que el monto total a pagar no sea negativo
    if ($total_pagar < 0) {
        echo "El monto total a pagar no puede ser negativo.";
    } else {

        include 'db.php';

        $sql = "INSERT INTO servicios (fecha_ingreso, servicio, total_pagar) VALUES ('$fecha_ingreso', '$servicio', '$total_pagar')";

        if ($conn->query($sql) === TRUE) {
            echo "El servicio se ha registrado correctamente.";
        } else {
            echo "Error al registrar el servicio: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrada de Servicio</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Entrada de Servicio</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="fecha_ingreso">Fecha de Ingreso:</label>
                <input type="date" class="form-control" name="fecha_ingreso" id="fecha_ingreso" required>
            </div>
            <div class="form-group">
                <label for="servicio">Descripción del Servicio:</label>
                <textarea class="form-control" name="servicio" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="total_pagar">Monto Total a Pagar:</label>
                <input type="number" step="0.01" class="form-control" name="total_pagar" id="total_pagar" required>
                <small id="monto_error" class="text-danger"></small>
            </div>
            <button type="submit" class="btn btn-primary">Registrar Servicio</button>
        </form>
    </div>

    <script>
        // Validar que el monto total a pagar no sea negativo
        document.getElementById('total_pagar').addEventListener('input', function() {
            var monto = parseFloat(this.value);
            if (monto <= 0 || isNaN(monto)) {
                document.getElementById('monto_error').textContent = "El monto debe ser mayor que cero.";
                this.setCustomValidity('El monto debe ser mayor que cero.');
            } else {
                document.getElementById('monto_error').textContent = "";
                this.setCustomValidity('');
            }
        });
    </script>
</body>
</html>
