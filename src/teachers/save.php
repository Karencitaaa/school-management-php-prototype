<?php
include '../database.php';

$nombre = $_POST['nombre'];

$sql = "INSERT INTO maestros (nombre) VALUES ('$nombre')";

if ($conn->query($sql) === TRUE) {
    header("Location: list.php");
    exit();
} else {
    echo "Error al guardar la carrera: " . $conn->error;
}

$conn->close();