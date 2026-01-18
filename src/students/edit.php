<?php
include '../header.php';

$id = $_GET['id'];
$error = "";

$result = $conn->query("SELECT * FROM alumnos WHERE id = $id");
if (!$row = $result->fetch_assoc()) {
  echo "Alumno no encontrado";
  echo '<br><a href="list.php"> Volver a la lista</a>';
  exit();
}

  $nombre = $row['nombre'];
  $matricula = $row['matricula'];
  $carrera = $row['carrera'];

?>


<h2>Modificar Alumno</h2>

<?php if (!empty($error)) { ?>
  <p style="color: red;"><strong>Error:</strong> <?= $error ?></p>
<?php } ?>

<form action="update.php?id=<?= $id ?>" method="POST">
  <label>Nombre:</label><br>
  <input type="text" name="nombre" value="<?= htmlspecialchars($nombre) ?>" required><br><br>

  <label>Matrícula:</label><br>
  <input type="text" name="matricula" maxlength="7" required
         oninput="this.value = this.value.replace(/[^0-9]/g, '')"
         value="<?= htmlspecialchars($matricula) ?>"><br><br>

  <label>Carrera:</label><br>
  <select name="carrera" required>
    <option value="">-- Selecciona tu carrera --</option>
    <?php
    $resultado = $conn->query("SELECT id, nombre FROM carreras ORDER BY nombre");
    while ($row = $resultado->fetch_assoc()) {
      $selected = ($row['nombre'] === $carrera) ? 'selected' : '';
    ?>
    <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
    <?php
    }
    ?>
  </select><br><br>

  <button type="submit">Guardar</button>
</form>

<a href="list.php"> Ver lista de alumnos</a>

<?php 
include '../footer.php';
?>