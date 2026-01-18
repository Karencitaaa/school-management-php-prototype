<?php 
include '../header.php';
?>
<h2>Lista de Alumnos</h2>

<table border="1">
  <tr>
    <th>Nombre</th>
    <th>Matrícula</th>
    <th>Carrera</th>
  </tr>

  <?php
  $page = 1;
  if (isset($_GET['page'])) {
    $page = $_GET['page'];
  }

  $first = ($page - 1) * 10;

  $total_result = $conn->query("SELECT COUNT(*) as total FROM alumnos");
  $total_row = $total_result->fetch_assoc();
  $total_alumnos = $total_row['total'];
  $total_paginas = ceil($total_alumnos / 10);

  $result = $conn->query("SELECT alumnos.id, alumnos.nombre, alumnos.matricula, carreras.nombre AS nombre_carrera FROM alumnos INNER JOIN carreras ON alumnos.carrera = carreras.id ORDER BY alumnos.id ASC LIMIT $first, 10");

  while ($row = $result->fetch_assoc()) { ?>
    <tr>
      <td><a href="detail.php?id=<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></a></td>
      <td><?php echo $row['matricula']; ?></td>
      <td><?php echo $row['nombre_carrera']; ?></td>
    </tr>
  <?php } ?>
</table>

<br><br>

<?php if ($page > 1): ?>
  <a href="/students/list.php?page=<?php echo $page - 1; ?>">Regresar</a>
<?php endif; ?>

<?php if ($page < $total_paginas): ?>
  <a href="/students/list.php?page=<?php echo $page + 1; ?>">Avanzar</a>
<?php endif; ?>

<a href="/students/create.php">Agregar alumno</a>

<?php 
include '../footer.php';
?>
