<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Ecommerce</title>
</head>
<body>
    <header>
        <h1>Bienvenido a nuestro Ecommerce</h1>

        <!-- Verificamos si el usuario está autenticado -->
        <?php if (session()->get('usuario_id')): ?>
            <p>¡Bienvenido, <?= session()->get('usuario_id') ?>!</p>
            <a href="<?= site_url('usuario/logout') ?>">Cerrar sesión</a>
        <?php else: ?>
            <!-- Si el usuario no está autenticado, mostramos las opciones de registro y login -->
            <a href="<?= site_url('usuario/registro') ?>">Registrarse</a> | 
            <a href="<?= site_url('usuario/login') ?>">Iniciar sesión</a>
        <?php endif; ?>
    </header>

    <h2>Listado de productos</h2>
    <!-- Aquí agregarías el listado de productos -->
    <ul>
        <?php foreach ($productos as $producto): ?>
            <li>
                <a href="<?= site_url('producto/detalle/'.$producto['id']) ?>"><?= esc($producto['nombre']) ?></a> - 
                $<?= esc($producto['precio']) ?>
            </li>
        <?php endforeach; ?>
    </ul>

</body>
</html>
