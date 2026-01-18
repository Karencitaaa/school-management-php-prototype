 <?php 
    include '../header.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM maestros WHERE id = $id");

if ($row = $result->fetch_assoc()) {
?>

<h2>Modificar informacion del maestro</h2>

<form action="update.php?id=<?= $row['id']; ?>" method="POST">
  <label>Nombre del maestro:</label><br>
  <input type="text" name="nombre" required value="<?= htmlspecialchars($row['nombre']); ?>"><br><br>
  <input type="submit" value="Guardar cambios">
</form>

<br>
 
<?php
} else {
 ?>
  <p>Carrera no encontrada.</p>
 <br> 
 <?php 
}
?>

<a href="list.php"> Volver a la lista</a>
<?php 
    include '../footer.php';
?>