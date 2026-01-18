<?php include '../header.php'; ?>

<h2>Registrar Nueva Carrera</h2>

<form action="save.php" method="POST">
  <label>Nombre de la carrera:</label><br>
  <input type="text" name="nombre" required><br><br>
  <button type="submit">Guardar</button>
</form>
<br><br>
 <?php 
    include '../footer.php';
?>