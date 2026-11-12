<?php
require_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}

$id = filter_var($_POST["id"] ?? null, FILTER_VALIDATE_INT);

if (!$id) {
    header("Location: index.php?mensaje=" . urlencode("ID no válido."));
    exit;
}

$stmt = $conexion->prepare("DELETE FROM productos WHERE id = ?");
$stmt->bind_param("i", $id);

$mensaje = $stmt->execute() ? "Producto eliminado correctamente." : "No se pudo eliminar el producto.";
$stmt->close();

header("Location: index.php?mensaje=" . urlencode($mensaje));
exit;
