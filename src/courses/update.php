<?php
include '../database.php';
 
$id = $_GET['id'];
$nombre = $_POST['nombre'];
$sql ="UPDATE materias SET nombre= '$nombre' WHERE id =$id";

if ($conn->query($sql) == TRUE){
    header("Location: list.php");
    exit();

}else{
    echo"Error al guardar la materia" . $conn->error;
}
$conn->close();