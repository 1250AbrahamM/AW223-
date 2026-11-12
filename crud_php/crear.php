<?php
require_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}

$nombre = trim($_POST["nombre"] ?? "");
$descripcion = trim($_POST["descripcion"] ?? "");
$precio = filter_var($_POST["precio"] ?? null, FILTER_VALIDATE_FLOAT);
$cantidad = filter_var($_POST["cantidad"] ?? null, FILTER_VALIDATE_INT);

if ($nombre === "" || $descripcion === "" || $precio === false || $precio < 0 ||
    $cantidad === false || $cantidad < 0) {
    header("Location: index.php?mensaje=" . urlencode("Verifica los datos ingresados."));
    exit;
}

$stmt = $conexion->prepare(
    "INSERT INTO productos (nombre, descripcion, precio, cantidad) VALUES (?, ?, ?, ?)"
);
$stmt->bind_param("ssdi", $nombre, $descripcion, $precio, $cantidad);

$mensaje = $stmt->execute() ? "Producto registrado correctamente." : "No se pudo registrar el producto.";
$stmt->close();

header("Location: index.php?mensaje=" . urlencode($mensaje));
exit;
