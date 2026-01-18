 <?php 
    include '../header.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM carreras WHERE id = $id");
if ($row = $result->fetch_assoc()) {
?>
<h2>Detalle de la carrera</h2>
<p><strong>Nombre:</strong> <?php echo htmlspecialchars($row['nombre']); ?></p>
<a href="edit.php?id=<?php echo $row['id']; ?>"> Editar carrera</a>
<form action="delete.php" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta carrera?');" style="margin-top:10px;">
  <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
<br><br>
  <button type="submit" style="color:red;"> Eliminar carrera</button>
</form>
 
<?php
} else {
  ?>
   <p>Carrera no encontrada.<br></p> 
  <?php
}
?>

<a href="list.php">Volver a la lista</a>
<?php 
    include '../footer.php';
 ?>