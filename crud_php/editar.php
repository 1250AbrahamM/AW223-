<?php
require_once "conexion.php";

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
if (!$id) {
    header("Location: index.php?mensaje=" . urlencode("ID no válido."));
    exit;
}

$stmt = $conexion->prepare("SELECT * FROM productos WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$producto = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$producto) {
    header("Location: index.php?mensaje=" . urlencode("Producto no encontrado."));
    exit;
}

function e($valor) {
    return htmlspecialchars((string)$valor, ENT_QUOTES, "UTF-8");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar producto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="contenedor formulario-edicion">
        <section class="panel">
            <h1>Editar producto</h1>
            <form action="actualizar.php" method="POST" class="formulario">
                <input type="hidden" name="id" value="<?= (int)$producto["id"] ?>">

                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" maxlength="100"
                       value="<?= e($producto["nombre"]) ?>" required>

                <label for="descripcion">Descripción</label>
                <input type="text" id="descripcion" name="descripcion" maxlength="255"
                       value="<?= e($producto["descripcion"]) ?>" required>

                <div class="dos-columnas">
                    <div>
                        <label for="precio">Precio</label>
                        <input type="number" id="precio" name="precio" min="0" step="0.01"
                               value="<?= e($producto["precio"]) ?>" required>
                    </div>
                    <div>
                        <label for="cantidad">Cantidad</label>
                        <input type="number" id="cantidad" name="cantidad" min="0" step="1"
                               value="<?= e($producto["cantidad"]) ?>" required>
                    </div>
                </div>

                <button type="submit" class="boton primario">Actualizar producto</button>
                <a href="index.php" class="boton volver">Cancelar</a>
            </form>
        </section>
    </main>
</body>
</html>
