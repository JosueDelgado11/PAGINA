<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $producto['nombre'] ?> - Detalles</title>
</head>
<body>
    <h1><?= $producto['nombre'] ?></h1>
    <p>Precio: $<?= $producto['precio'] ?></p>
    <p>Stock: <?= $producto['stock'] ?></p>
    <p>Código: <?= $producto['codigo'] ?></p>
    <p><?= $producto['descripcion'] ?></p>
</body>
</html>
