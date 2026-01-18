<?php

include '../database.php';
$nombre = $_POST['nombre'];
$sql = "INSERT INTO materias (nombre) VALUES ('$nombre')";

if($conn->query($sql)== TRUE){

    //obtener el id de la materia insertada
    $id_materia = $conn->insert_id;

    //por cada maestro seleccionado (teachers) insertar en (maestros_materias)
    
    $tamano = count($_POST['teachers']);
    for ($i = 0; $i<$tamano; $i=$i+1){
        $id_maestro = $_POST['teachers'][$i];
        $sql = "INSERT INTO maestros_materias (id_maestro,id_materia) VALUES ($id_maestro,$id_materia)";
        $conn->query($sql);

    }




    header("location: list.php");
    exit();
}else{
echo"error al guardar la materia". $conn->error();
    }

$conn->close();