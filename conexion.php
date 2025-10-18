<?php
$host = "db"; 
$user = "user"; 
$pass = "user123";
$db = "escuela";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
