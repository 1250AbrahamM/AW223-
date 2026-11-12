<?php
require_once "conexion.php";

$resultado = $conexion->query("SELECT * FROM productos ORDER BY id DESC");
$productos = $resultado ? $resultado->fetch_all(MYSQLI_ASSOC) : [];

function e($valor) {
    return htmlspecialchars((string)$valor, ENT_QUOTES, "UTF-8");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de productos</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
    <main class="contenedor">
        <header class="encabezado">
            <h1>CRUD de productos</h1>
            <p>Crear, consultar, actualizar y eliminar registros</p>
        </header>

        <?php if (isset($_GET["mensaje"])): ?>
            <div class="aviso"><?= e($_GET["mensaje"]) ?></div>
        <?php endif; ?>

        <section class="panel">
            <h2>Registrar producto</h2>
            <form action="crear.php" method="POST" class="formulario">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" maxlength="100" required>

                <label for="descripcion">Descripción</label>
                <input type="text" id="descripcion" name="descripcion" maxlength="255" required>

                <div class="dos-columnas">
                    <div>
                        <label for="precio">Precio</label>
                        <input type="number" id="precio" name="precio" min="0" step="0.01" required>
                    </div>
                    <div>
                        <label for="cantidad">Cantidad</label>
                        <input type="number" id="cantidad" name="cantidad" min="0" step="1" required>
                    </div>
                </div>
                <button type="submit" class="boton primario">Guardar producto</button>
            </form>
        </section>

        <section class="panel">
            <h2>Productos registrados</h2>
            <?php if (count($productos) === 0): ?>
                <p>No hay productos registrados.</p>
            <?php else: ?>
                <div class="tabla-contenedor">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th><th>Nombre</th><th>Descripción</th>
                                <th>Precio</th><th>Cantidad</th><th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($productos as $producto): ?>
                            <tr>
                                <td><?= e($producto["id"]) ?></td>
                                <td><?= e($producto["nombre"]) ?></td>
                                <td><?= e($producto["descripcion"]) ?></td>
                                <td>$<?= number_format((float)$producto["precio"], 2) ?></td>
                                <td><?= e($producto["cantidad"]) ?></td>
                                <td class="acciones">
                                    <a class="boton editar" href="editar.php?id=<?= (int)$producto["id"] ?>">Editar</a>
                                    <form action="eliminar.php" method="POST" class="form-eliminar"
                                          onsubmit="return confirmarEliminacion();">
                                        <input type="hidden" name="id" value="<?= (int)$producto["id"] ?>">
                                        <button type="submit" class="boton eliminar">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </section>
    </main>
</body>
</html>
