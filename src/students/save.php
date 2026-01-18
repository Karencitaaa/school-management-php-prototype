<?php
include '../database.php';

$nombre = $_POST['nombre'];
$matricula = $_POST['matricula'];
$carrera = $_POST['carrera'];

if (!ctype_digit($matricula) || strlen($matricula) > 7) {
    echo "La matrícula debe tener solo números positivos y máximo 7 dígitos.";
}

$verifica = $conn->query("SELECT * FROM alumnos WHERE matricula = '$matricula'");
if ($verifica->num_rows > 0) {
    echo "Ya existe un alumno con esa matrícula.";
   
}

$sql = "INSERT INTO alumnos (nombre, matricula, carrera)
        VALUES ('$nombre', '$matricula', '$carrera')";

if ($conn->query($sql) === TRUE) {
    header("Location: list.php");
   
} else {
    echo " Error al guardar: " . $conn->error;
}

$conn->close();
?>