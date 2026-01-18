<?php
include '../header.php';
$id = $_GET['id'];
$result = $conn->query("SELECT *FROM materias where id = $id");
if ($row = $result->fetch_assoc())
{
?>
<h2>Detalle de la materia</h2>
<p><strong>Nombre:</strong> <?php echo htmlspecialchars($row['nombre']); ?></p>
<a href="edit.php?id=<?php echo $row['id']; ?>"> Editar materia</a>
<form action="delete.php" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta materia?');">
  <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
<br><br>
  <button type="submit"> Eliminar materia</button>
</form>
 
<?php
}
    else{
?>
    <p>Materia no encontrada</p>
<?php

}
?>
    <a href='list.php'>Volver a la lista</a>
<?php 
    include'../footer.php';
?>



