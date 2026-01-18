<?php
include '../database.php';

$nombre = $_POST['nombre'];
$matricula = $_POST['matricula'];
$carrera = $_POST['carrera'];
$id = $_GET['id'];

if (!ctype_digit($matricula) || strlen($matricula) > 7) {
    echo "La matrícula debe tener solo números positivos y máximo 7 dígitos.";
    exit();
}

$verifica = $conn->query("SELECT * FROM alumnos WHERE matricula = '$matricula' AND id != $id");
if ($verifica->num_rows > 0) {
    echo "Ya existe otro alumno con esa matrícula.";
    exit();
}

$sql = "UPDATE alumnos SET nombre='$nombre', matricula='$matricula', carrera='$carrera' WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header("Location: list.php");
    exit();
} else {
    echo "Error al guardar los cambios: " . $conn->error;
}

$conn->close();
?>