<?php
require_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}

$id = filter_var($_POST["id"] ?? null, FILTER_VALIDATE_INT);
$nombre = trim($_POST["nombre"] ?? "");
$descripcion = trim($_POST["descripcion"] ?? "");
$precio = filter_var($_POST["precio"] ?? null, FILTER_VALIDATE_FLOAT);
$cantidad = filter_var($_POST["cantidad"] ?? null, FILTER_VALIDATE_INT);

if (!$id || $nombre === "" || $descripcion === "" || $precio === false || $precio < 0 ||
    $cantidad === false || $cantidad < 0) {
    header("Location: index.php?mensaje=" . urlencode("Datos no válidos para actualizar."));
    exit;
}

$stmt = $conexion->prepare(
    "UPDATE productos SET nombre = ?, descripcion = ?, precio = ?, cantidad = ? WHERE id = ?"
);
$stmt->bind_param("ssdii", $nombre, $descripcion, $precio, $cantidad, $id);

$mensaje = $stmt->execute() ? "Producto actualizado correctamente." : "No se pudo actualizar el producto.";
$stmt->close();

header("Location: index.php?mensaje=" . urlencode($mensaje));
exit;
