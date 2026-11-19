<?php

function conectar(): mysqli
{
  require __DIR__ . '/../DB/conexion.php';
  return $conn;
}