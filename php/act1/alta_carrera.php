<html>
<head>
    <title> Alta de carreras </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2> Alta de carreras</h2>
        <form action="crud.php" method="post">
            <div class="form-group">
                <label for="nombre_carrera">Nombre de Carrera:</label>
                <input type="text" class="form-control" name="nombre_carrera" required>
            </div>
            <button type="submit" class="btn btn-primary" name="alta_carrera">Guardar carrera</button>
        </form>
    </div>
</body>
</html>
