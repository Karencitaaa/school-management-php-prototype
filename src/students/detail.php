<?php
include '../header.php';

$id = $_GET['id'];
$result = $conn->query("SELECT alumnos.id, alumnos.matricula,alumnos.nombre, carreras.nombre AS nombre_carrera
 FROM alumnos JOIN carreras ON alumnos.carrera = carreras.id WHERE alumnos.id=$id");

if ($row = $result->fetch_assoc()) {
?>


<h2>Detalle del Alumno</h2>

<p><strong>Nombre:</strong> <?php echo $row['nombre']; ?></p>
<p><strong>Matrícula:</strong> <?php echo $row['matricula']; ?></p>
<p><strong>Carrera:</strong> <?php echo $row['nombre_carrera']; ?></p>
<br>
<a href="edit.php?id=<?php echo $row['id']; ?>">Editar alumno</a>
<form action="delete.php" method="POST" onsubmit="return confirm('Estás segura de que quieres eliminar a este alumno?');">
  <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
<br>
  <button type="submit" style="color:red;">Eliminar alumno</button>
</form>

<?php
} else {
?>
<p>Alumno no encontrado.</p>
<?php
}
?>
<a href="list.php">Regresar a la lista</a>
<?php 
include '../footer.php';
?>