<?php
include '../header.php';
$id = $_GET ['id'];
$result = $conn ->query("SELECT * FROM materias WHERE id =$id");
if($row = $result->fetch_assoc()){
    ?>
    <h2>Modifica la materia</h2>
<form action="update.php?id=<?php echo $row['id']; ?>" method="POST">
    <label>Nombre de la materia</label>
    <input type="text" name="nombre" value="<?= htmlspecialchars($row['nombre']);?>">
    <input type="submit"value="Guardar cambios">
</form>
<?php
}else{
?>
<p>Carrera no encontrada</p>
<?php

}?>
<a href="list.php">Volver a la lista</a>
<?php
include '../footer.php';
?>