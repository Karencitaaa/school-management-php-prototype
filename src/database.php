<?php
$host = 'mysql';
$usuario = 'root';
$contrasena = 'password123';
$basededatos = 'School';

$conn = new mysqli($host, $usuario, $contrasena, $basededatos);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>