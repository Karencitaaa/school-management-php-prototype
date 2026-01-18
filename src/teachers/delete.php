<?php
include '../database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);

    $sql = "DELETE FROM maestros WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: list.php");
        exit();
    } else {
        echo "Error al eliminar: " . $conn->error;
    }
} else {
    echo "Acceso inválido.";
}

$conn->close();
?>