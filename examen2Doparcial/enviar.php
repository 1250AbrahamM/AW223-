<?php

require_once __DIR__ . '/cons.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header("Location: ../index.php");
  exit;
}

$concepto  = trim($_POST['concepto']  ?? '');
$monto  = trim($_POST['monto'] ?? '');
$categoria = trim($_POST['categoria']   ?? '');


$error = validarMsg($concepto, $monto, $categoria);
if ($error !== '') {
  header("Location: ../index.php?estado=$error#Contacto");
  exit;
}

$conn = conectar();
$stmt = $conn->prepare(
  "INSERT INTO gastos (concepto, monto, categoria) VALUES (?, ?, ?)"
);
$stmt->bind_param("sss", $concepto, $monto, $categoria);
$ok = $stmt->execute();
$stmt->close();
$conn->close();

header("Location: ../index.php?estado=" . ($ok ? "success" : "error") . "#Contacto");
exit;