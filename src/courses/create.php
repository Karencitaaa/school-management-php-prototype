<?php include '../header.php'; ?>

<h2> Registrar nueva materia</h2>
<form action="save.php" method="POST">
    <label>Nombre de la materia:</label>
    <input type="text" name="nombre">
    <br>
<label for="">Profesor:</label>
    <select name="teachers[]" multiple>
         <?php
    $resultado = $conn->query("SELECT nombre,id FROM maestros ORDER BY nombre");
    while ($row = $resultado->fetch_assoc()) {
    ?>
    <option value="<?php echo $row['id']; ?>">
      <?php echo $row['nombre']; ?>
    </option>
    <?php
    }
    ?>
    </select>
    <button type="submit">Guardar</button>
    
</form>

<?php include '../footer.php'; ?>