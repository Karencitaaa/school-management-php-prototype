<?php
include '../header.php';
?>
<h2>Lista de materias</h2>
<table border='1'>
    <tr>
        <th>Nombre de la materia</th>
    </tr>
<?php
$page=1;
if (isset($_GET['page'])){
    $page=$_GET['page'];
}
$first=($page -1) * 10;

$total_result = $conn->query("SELECT COUNT(*) as total FROM materias");
$total_row = $total_result->fetch_assoc();
$total_materias = $total_row['total'];
$total_paginas = $total_materias / 10;

$result  = $conn->query("SELECT * FROM materias  ORDER BY nombre ASC LIMIT $first ,10");
while ($row = $result->fetch_assoc()){
?>
<tr>
    <td>
        <a href="detail.php?id=<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></a>
    </td>
</tr>
<?php
}?>
</table>

<?php if ($page > 1): ?>
    <a href="/courses/list.php?page=<?php echo $page-1; ?>">Regresar</a>
<?php endif; ?>

<?php if ($page < $total_paginas): ?>
    <a href="/courses/list.php?page=<?php echo $page+1; ?>">Avanzar</a>
<?php endif; ?>

<a href="/courses/create.php">Agregar materia</a>
<?php
include '../footer.php';
?>
