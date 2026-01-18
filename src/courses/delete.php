<?php
include '../database.php';

if ($_SERVER['REQUEST_METHOD']== 'POST' && isset ($_POST['id'])){
    
    $id =intval($_POST['id']);
    $sql = "DELETE FROM materias WHERE id =$id";

    if ($conn->query($sql)== TRUE)
    {
        HEADER("Location:list.php");
        exit();
   
    }else{
        echo "Error al eliminar:" . $conn->error;
    }
}else{
?>
    <p>"Acceso invalido"</p>
<?php

}

$conn->close();
?>