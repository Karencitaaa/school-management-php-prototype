 <?php 
    include '../header.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM maestros WHERE id = $id");
$result_courses = $conn->query("SELECT materias.nombre FROM maestros_materias JOIN materias ON maestros_materias.id_materia = materias.id WHERE maestros_materias.id_maestro = $id");

if ($row = $result->fetch_assoc()) {
?>
<h2>Detalle del maestro</h2>
<p><strong>Nombre:</strong> <?php echo htmlspecialchars($row['nombre']); ?></p>
<hr><h3>Listado de materias:</h3>
<ul>
  <?php while ($row_courses = $result_courses->fetch_assoc()) { ?>
        <li><?php echo $row_courses['nombre'];?></li>
    
  <?php } ?>
  
</ul>

insertar mas de 100 maestros paginan los resultados 
<a href="edit.php?id=<?php echo $row['id']; ?>"> Editar maestro</a>
<form action="delete.php" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este maestro?');" style="margin-top:10px;">
  <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
<br><br>
  <button type="submit" style="color:red;"> Eliminar maestro</button>
</form>
 
<?php
} else {
 
  ?>
   <p>Maestro no encontrado</p>
   <br>

<?php
}

?>
  <a href="list.php">Volver a la lista</a>
<?php 
    include '../footer.php';
?>
