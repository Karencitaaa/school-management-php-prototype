<?php 
include '../header.php';
?>
<h2>Lista de Maestros</h2>

<table border="1">
  <tr>
    <th>Nombre</th>
  </tr>

  <?php
  $page = 1;
  if (isset($_GET['page'])) {
    $page = $_GET['page'];
  }

  $first = ($page - 1) * 10;

  //obtener total de maestros
  $total_result = $conn->query("SELECT COUNT(*) as total FROM maestros");
  $total_row = $total_result->fetch_assoc();
  $total_maestros = $total_row['total'];
  $total_paginas = $total_maestros / 10;

  $result = $conn->query("SELECT * FROM maestros ORDER BY id ASC LIMIT $first,10");

  while ($row = $result->fetch_assoc()) { ?>
    <tr>
      <td><a href="detail.php?id=<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></a></td>
      <td><a href="detail.php?id=<?php echo $row['id']; ?>"><?php echo $row['id']; ?></a></td>
    </tr>
  <?php }
  ?>
</table>
<br><br>
<?php
// boton Regresar solo si hay pagina anterior
 if ($page > 1): ?>
  <a href="/teachers/list.php?page=<?php echo $page - 1; ?>">Regresar</a>
<?php endif; ?>
<?php
 // boton Avanzar solo si hay mas paginas
 if ($page < $total_paginas): ?>
  <a href="/teachers/list.php?page=<?php echo $page + 1; ?>">Avanzar</a>
<?php endif; ?>

<a href="/teachers/create.php">Agregar maestro</a>

<?php 
include '../footer.php';
?>
