<?php
include '../header.php';

$error = "";
$nombre = $_POST['nombre'] ?? "";
$matricula = $_POST['matricula'] ?? "";
$carrera = $_POST['carrera'] ?? "";
?>



<h2>Registrar Nuevo Alumno</h2>

<?php if (!empty($error)) { ?>
  <p style="color: red;"><strong>Error:</strong> <?= $error ?></p>
<?php } ?>

<form action="save.php" method="POST">
  <label>Nombre:</label><br>
  <input type="text" name="nombre" value="<?= htmlspecialchars($nombre) ?>" required><br><br>

  <label>Matrícula:</label><br>
  <input type="text" name="matricula" 
         value="<?= htmlspecialchars($matricula) ?>"><br><br>

  <label>Carrera:</label><br>
  <select name="carrera" required>
    <option value="">-- Selecciona tu carrera --</option>
    
    <?php
    $resultado = $conn->query("SELECT nombre,id FROM carreras ORDER BY nombre");
    while ($row = $resultado->fetch_assoc()) {
    ?>
    <option value="<?php echo $row['id']; ?>">
      <?php echo $row['nombre']; ?>
    </option>
    <?php
    }
    ?>
  </select><br><br>

  <button type="submit">Guardar</button>
</form>
<?php 
include '../footer.php';
?>