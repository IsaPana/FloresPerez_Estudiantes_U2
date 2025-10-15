<?php
include "conexion.php";

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$carrera = $_POST['carrera'];

// Verificar si correo o teléfono ya existen
$verificar = "SELECT * FROM estudiantes WHERE correo = '$correo' OR telefono = '$telefono'";
$resultado = $conn->query($verificar);

if ($resultado->num_rows > 0) {
    // Correo o teléfono ya registrado
    header("Location: index.php?registro=duplicado");
    exit();
}

$sql = "INSERT INTO estudiantes (nombre, correo, telefono, carrera)
        VALUES ('$nombre', '$correo', '$telefono', '$carrera')";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php?registro=exito");
} else {
    header("Location: index.php?registro=error");
}
exit();
?>
