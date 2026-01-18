<?php 
include '../header.php';
?>

<h2>Lista de carreras</h2>

<table border="1">
  <tr>
    <th>Nombre</th>
  </tr>

  <?php
  $result = $conn->query("SELECT * FROM carreras");
  while ($row = $result->fetch_assoc()) { ?>
    <tr>
      <td><a href="detail.php?id=<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></a></td>
    </tr>
  <?php }
  ?>
</table>
<a href="/careers/create.php">Agregar carrera</a>
<?php
include '../footer.php';
?>