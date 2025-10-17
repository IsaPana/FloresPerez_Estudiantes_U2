<?php
include "conexion.php";
$resultado = $conn->query("SELECT * FROM estudiantes ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Estudiantes Registrados</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #e3f2fd, #ffffff);
            padding: 50px;
        }

        .table-container {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0px 4px 15px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #0d47a1;
            font-weight: 600;
            margin-bottom: 25px;
        }

        th {
            background-color: #007bff;
            color: white;
            text-align: center;
        }

        td {
            text-align: center;
            vertical-align: middle;
        }

        .volver {
            text-align: center;
            margin-top: 25px;
        }

        .volver a {
            color: #007bff;
            text-decoration: none;
            font-weight: 500;
        }

        .volver a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container table-container">
    <h2>Estudiantes Registrados</h2>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Carrera</th>
                    <th>Fecha de ingreso</th>
                    <th>Activo</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($fila = $resultado->fetch_assoc()): ?>
                    <tr>
                        <td><?= $fila['id'] ?></td>
                        <td><?= $fila['nombre'] ?></td>
                        <td><?= $fila['correo'] ?></td>
                        <td><?= $fila['telefono'] ?></td>
                        <td><?= $fila['carrera'] ?></td>
                        <td><?= $fila['fecha_ingreso'] ?></td>
                        <td><?= $fila['activo'] ? 'Sí' : 'No' ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <div class="volver">
        <a href="index.php">← Volver al formulario</a>
    </div>
</div>

</body>
</html>
