<?php
include "conexion.php";
$resultado = $conn->query("SELECT * FROM estudiantes ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Estudiantes</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f8;
            padding: 40px;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .volver {
            display: block;
            margin: 20px auto;
            text-align: center;
        }

        .volver a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }

        .volver a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <h2>Estudiantes Registrados</h2>

    <table>
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

    <div class="volver">
        <a href="index.php">← Volver al formulario</a>
    </div>

</body>
</html>
